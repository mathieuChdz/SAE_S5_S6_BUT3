
import numpy as np
from mpi4py import MPI
import sys
import time
import math

def monte_carlo_probabilite_normale(moyenne, ecart_type, t1=None, t2=None, nbr_echantillons=300000):
    if t1 is not None and t2 is not None and t1 >= t2:
        return None

    echantillons = np.random.normal(loc=moyenne, scale=ecart_type, size=nbr_echantillons)

    if t1 is not None and t2 is not None:
        probabilite_estimee = np.sum((t1 < echantillons) & (echantillons < t2)) / nbr_echantillons
    elif t1 is not None:
        probabilite_estimee = np.sum(echantillons > t1) / nbr_echantillons
    elif t2 is not None:
        probabilite_estimee = np.sum(echantillons < t2) / nbr_echantillons
    else:
        return None

    return probabilite_estimee

def tester_monte_carlo(local_samples, mean, ecart_type, t, t2):
    local_results = []
    local_result = monte_carlo_probabilite_normale(moyenne=mean, ecart_type=ecart_type, t1=t, t2=t2, nbr_echantillons=len(local_samples))
    local_results.append(local_result)
    return local_results

def main():
    comm = MPI.COMM_WORLD
    my_rank = comm.Get_rank()
    cluster_size = comm.Get_size()

    m = int(sys.argv[1]) if len(sys.argv) > 1 else 0
    e_t = int(sys.argv[2]) if len(sys.argv) > 1 else 1
    t1 = int(sys.argv[3]) if len(sys.argv) > 1 and sys.argv[3] != "None" else None
    t2 = int(sys.argv[4]) if len(sys.argv) > 1 and sys.argv[4] != "None" else None

    nbr_echantillons = 10000000

    nbr_echant_mpi = nbr_echantillons//cluster_size

    # Distribuer différentes parties de la tâche à chaque nœud
    my_samples = np.array_split(range(nbr_echant_mpi), cluster_size)[my_rank]

    start=time.time()
    # Chaque nœud exécute son propre calcul
    local_results = tester_monte_carlo(my_samples, m, e_t, t1, t2)
    print(local_results)
    # Rassembler les résultats sur le nœud maître
    results = np.array(comm.gather(local_results, root=0))

    # Si je suis le nœud maître, afficher les résultats consolidés
    if my_rank == 0:
        end = round(time.time() - start, 2)
        print("Simulations de Monte Carlo terminées.")
        print("Nœuds :", cluster_size)
        print("Temps écoulé :", end, "secondes")

        print(results.flatten())
        resultat_final = np.sum(results.flatten()) / len(results.flatten())
        print(resultat_final)


if __name__ == "__main__":
    main()
