import numpy as np
from mpi4py import MPI
import sys
import time

def monte_carlo_pi(nbr_echantillons):
    points = np.random.rand(nbr_echantillons, 2)  # Génère des points dans le carré [0, 1] x [0, 1]
    x = points[:, 0]
    y = points[:, 1]
    
    # Vérifie si les points sont à l'intérieur du quart de cercle
    inside_quarter_circle = np.sum((x**2 + y**2) <= 1)

    return inside_quarter_circle


def tester_monte_carlo_pi(local_samples):
    local_results = []
    local_result = monte_carlo_pi(nbr_echantillons=len(local_samples))
    local_results.append(local_result)
    return local_results


def main():
    comm = MPI.COMM_WORLD
    my_rank = comm.Get_rank()
    cluster_size = comm.Get_size()

    nbr_echantillons = int(sys.argv[1]) if len(sys.argv) > 1 else 300000
    #nbr_echantillons = 3000000

    nbr_echant_mpi = nbr_echantillons//cluster_size

    # Distribuer différentes parties de la tâche à chaque nœud
    my_samples = np.array_split(range(nbr_echant_mpi), cluster_size)[my_rank]

    start = time.time()
    # Chaque nœud exécute son propre calcul
    local_results = tester_monte_carlo_pi(my_samples)

    # Rassembler les résultats sur le nœud maître
    results = np.array(comm.gather(local_results, root=0))

    # Si je suis le nœud maître, calculer l'estimation de Pi
    if my_rank == 0:
        end = round(time.time() - start, 2)
        print("Simulation de Monte Carlo pour estimer Pi terminée.")
        print("Nœuds :", cluster_size)
        print("Temps écoulé :", end, "secondes")

        # Calculer le total des points dans le quart de cercle en sommant tous les résultats
        total_points_inside_quarter_circle = np.sum(results.flatten())

        estimated_pi = 4 * cluster_size * (total_points_inside_quarter_circle / nbr_echantillons)
        print("Estimation de Pi :", estimated_pi)

if __name__ == "__main__":
    main()

