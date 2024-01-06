import sys
from math import *
def norm(m,s,x):
    """Calcul une probabilité suivant une loi normale, en fonction de la moyenne et l'écart type.
    Entree :
        m (int) -> la moyenne de la loi normale
        s (int) -> l'ecart type 
        x (int) -> une variable aléatoire  qui suit une loi normale
    Sortie :
        Résultat du calcul de loi normale pour les parametres renseignés."""

    #La formule est séparée en deux parties par le produit    
    el1=(1/(s*sqrt(2*pi)))     # Le quotient
    ex=exp(-1/2*((x-m)/s)**2)  # L'exponentielle
    return (el1*ex)

def rectangleM(n,a,b,m,s):
    """Calcul une probabilité suivant une loi normale, en fonction de la moyenne et l'écart type, 
       grâce à la méthode des rectangles médiants
    Entree :
        n (int) -> nombre de rectangles générés
        a (int) -> borne inférieure de l'intégrale
        b (int) -> borne supérieur de l'intégrale
        m (int) -> la moyenne de la loi normale
        s (int) -> l'ecart type 
    Sortie :
        Résultat du calcul de probabilité pour les parametres renseignés."""
    if s<=0:
        return "valeur interdite"
    somme=0
    for i in range (n):                                            # Calcul de la probabilité
        somme+=norm(m,s,(((a+i*((b-a)/n))+(a+(i+1)*((b-a)/n)))/2)) # pour le point en cours 
    return((b-a)/n*somme)

b = int(sys.argv[1])
m = int(sys.argv[2])
s = int(sys.argv[3])

print(round(rectangleM(100000,-1000, b, m, s),5))

