from mpi4py import MPI
import time
import sys

def is_premier(n):
    """
    fonction qui renvoie True si le nombre n passé en paramètres est premier
    et False sinon
    """
    if n <= 0 : 
        return False
    if n==1 :
        return False
    if n==2 or n==3 : 
        return True
    div = 2
    while(div <= n // 2) :
        if (n % div) == 0 : 
            return False
        div += 1
    return True

def nb_premiers(start,n,cluster_size):
    """
    fonction qui renvoie la liste des nombres premiers de 1 à n
    entrée : entier n
    sortie : tableau d'entiers
    """
    premiers = []
    if n<=0 :
        return []
    for candidate_number in range(start,n,cluster_size*2) :
        if is_premier(candidate_number) :
            premiers.append(candidate_number)
    return premiers


# Attach to the cluster and find out who I am and how big it is
comm = MPI.COMM_WORLD
my_rank = comm.Get_rank()
cluster_size = comm.Get_size()
# Number to start on, based on the node’s rank
start_number = (my_rank * 2) + 1
# When to stop. Play around with this value!
end_number = int(sys.argv[1])
# Make a note of the start time
start = time.time()
# List of discovered primes for this node
primes = nb_premiers(start_number,end_number,cluster_size)
# Once complete, send results to the governing node
results = comm.gather(primes, root=0)
# If I am the governing node, show the results
if my_rank == 0:
    # How long did it take?
    end = round(time.time() - start, 2)
    # print("Find all primes up to: " + str(end_number))
    # print("Nodes: " + str(cluster_size))
    # print("Time elasped: " + str(end) + " seconds")
    # Each process returned an array, so lets merge them
    merged_primes = [item for sublist in results for item in sublist]
    if end_number >= 2:
        merged_primes.append(2)
    merged_primes.sort()
    # print("Primes discovered: " + str(len(merged_primes)))
    # Uncomment the next line to see all the prime numbers
    print(merged_primes)
