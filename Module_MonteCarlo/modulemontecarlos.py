# -*- coding: utf-8 -*-

import random

def monte_carlo_integration(nbr_echant, fonction, intervalle):
    a, b = intervalle
    integral_estimate = 0

    for _ in range(nbr_echant):
        x = random.uniform(a, b)
        y = fonction(x)

        integral_estimate += y

    intervalle_longueur = b - a
    integral_estimate /= nbr_echant
    integral_estimate *= intervalle_longueur

    return integral_estimate

def test():
    # Définir différentes fonctions à tester
    def fonction_a(x):
        return x**2

    def fonction_b(x):
        return x**3 + 2*x + 1

    def fonction_c(x):
        return x**0.5

    # Définir différents intervalles à tester
    intervalle_a = (0, 1)
    intervalle_b = (-1, 1)
    intervalle_c = (1, 10)

    # Nombre d'échantillons pour l'estimation de l'intégrale
    nbr_echant = 3000000

    # Tester chaque fonction sur chaque intervalle
    fonctions_et_intervalles = [(fonction_a, intervalle_a), (fonction_b, intervalle_b), (fonction_c, intervalle_c)]

    for fonction, intervalle in fonctions_et_intervalles:
        resultat_estimation_integration = monte_carlo_integration(nbr_echant, fonction, intervalle)
        nom_fonction = fonction.__name__
        print(f"Estimation de l'intégrale de la fonction {nom_fonction} sur l'intervalle {intervalle} avec {nbr_echant} échantillons: {resultat_estimation_integration}")

# Appeler la fonction de test
test()

###################

import numpy as np
import matplotlib.pyplot as plt

def monte_carlo_probabilite_normale(moyenne, ecart_type, t, nbr_echantillons=100000):
    # Générer des échantillons aléatoires à partir de la distribution normale
    echantillons = np.random.normal(loc=moyenne, scale=ecart_type, size=nbr_echantillons)

    # Calculer la probabilité P(X < t) avec la méthode de Monte Carlo
    probabilite_estimee = np.sum(echantillons < t) / nbr_echantillons

    # Affichage de la courbe de densité de probabilité normale
    x_values = np.linspace(moyenne - 4 * ecart_type, moyenne + 4 * ecart_type, 1000)
    pdf_values = (1 / (ecart_type * np.sqrt(2 * np.pi))) * np.exp(-0.5 * ((x_values - moyenne) / ecart_type) ** 2)
    plt.plot(x_values, pdf_values, color='red', linewidth=2, label='Densité de probabilité normale')

    # Mise en forme du graphique
    plt.fill_between(x_values, pdf_values, where=(x_values < t), color='blue', alpha=0.3, label=f'P(X < {t})')
    plt.title('Estimation de la probabilité P(X < t) avec la méthode de Monte Carlo')
    plt.xlabel('Valeurs')
    plt.ylabel('Densité de probabilité')
    plt.legend()
    plt.show()
    # Afficher le résultat estimé
    print(f'Probabilité estimée P(X < {t}): {probabilite_estimee:.4f}')

monte_carlo_probabilite_normale(moyenne=0, ecart_type=1, t=1.2)

##################

def monte_carlo_probabilite_normale_sans_graphe(moyenne, ecart_type, t, nbr_echantillons=300000):
    # Générer des échantillons aléatoires à partir de la distribution normale
    echantillons = np.random.normal(loc=moyenne, scale=ecart_type, size=nbr_echantillons)

    # Calculer la probabilité P(X < t) avec la méthode de Monte Carlo
    probabilite_estimee = np.sum(echantillons < t) / nbr_echantillons

    print(f'Probabilité estimée P(X < {t}): {probabilite_estimee:.4f}')

def test_monte_carlo():
  monte_carlo_probabilite_normale_sans_graphe(moyenne=0, ecart_type=1, t=0)
  monte_carlo_probabilite_normale_sans_graphe(moyenne=0, ecart_type=1, t=1.2)
  monte_carlo_probabilite_normale_sans_graphe(moyenne=2, ecart_type=4, t=3.5)
  monte_carlo_probabilite_normale_sans_graphe(moyenne=-1, ecart_type=0.5, t=-1.4)
  monte_carlo_probabilite_normale_sans_graphe(moyenne=6, ecart_type=20, t=33)
  monte_carlo_probabilite_normale_sans_graphe(moyenne=0, ecart_type=50, t=75)

test_monte_carlo()

######## Exemple d'utilisation plus complexe #########

"""### Recouvrement de courbes et méthode contrainte-résistance

Exemple :
Un ingénieur conçoit des câbles électriques pour une application. La contrainte est la charge électrique maximale qu'un câble doit supporter, et la résistance est la capacité du câble à supporter cette charge.

Supposons que la contrainte électrique (S) suit une distribution normale avec une moyenne de 10 Ampères et un écart-type de 2 Ampères. La résistance du câble (R) suit également une distribution normale avec une moyenne de 12 Ampères et un écart-type de 1 Ampère.

L'ingénieur souhaite savoir quelle est la probabilité que la résistance du câble soit supérieure à la contrainte électrique (P(R>S)) pour garantir que le câble ne tombe pas en panne dans 99% des cas.

Voici comment cela pourrait être implémenté en utilisant la méthode de Monte-Carlo avec la probabilité complémentaire :

"""

import numpy as np
import matplotlib.pyplot as plt
from scipy.stats import norm

def contrainte_resistance_monte_carlo(S, R):
    cas_reussis = np.sum(R > S)
    probabilite_complementaire = cas_reussis / len(S)
    return probabilite_complementaire

# Nombre de simulations Monte-Carlo
nbr_simulations = 100000

# Générer des tirages aléatoires pour les variables aléatoires S et R
S = np.random.normal(loc=10, scale=2, size=nbr_simulations)  # Contrainte électrique S (distribution normale)
R = np.random.normal(loc=15, scale=1, size=nbr_simulations)  # Résistance du câble R (distribution normale)

# Appliquer la méthode de Monte-Carlo pour déterminer la probabilité complémentaire P(R > S)
probabilite_complementaire = contrainte_resistance_monte_carlo(S, R)

# Affichage des courbes de probabilités normales
x_values = np.linspace(0, 20, 1000)
plt.plot(x_values, norm.pdf(x_values, loc=10, scale=2), label="Contrainte électrique S")
plt.plot(x_values, norm.pdf(x_values, loc=15, scale=1), label="Résistance du câble R")

# Remplir la zone sous l'intersection des deux courbes avec une couleur spécifique
plt.fill_between(x_values, norm.pdf(x_values, loc=10, scale=2), norm.pdf(x_values, loc=15, scale=1), color='gray', alpha=0.5, label='Zone Intersection')

# Mise en forme du graphique
plt.xlabel("Charge électrique (Ampères)")
plt.ylabel("Densité de probabilité")
plt.title("Contrainte-Résistance pour la conception de câbles électriques")
plt.legend()
plt.show()

# Affichage du résultat
print(f"Probabilité complémentaire P(R > S) : {probabilite_complementaire}")

"""D'après les résultats de la simulation Monte-Carlo, la probabilité complémentaire que la résistance (R) du câble soit supérieure à la contrainte électrique (S) est estimée à environ 98,72%. En d'autres termes, dans la plupart des cas simulés, la résistance du câble est suffisamment élevée pour supporter la contrainte électrique.

Cette information est utile pour l'ingénieur, car une probabilité complémentaire élevée suggère une conception robuste du câble, ce qui signifie qu'il est probable que la résistance du câble soit plus grande que la contrainte électrique. Cela contribue à la fiabilité du câble dans des situations réelles où la charge électrique peut varier.

En général, plus la probabilité complémentaire P(R>S) est élevée, plus la marge de sécurité est grande, ce qui est souvent souhaitable dans la conception de systèmes critiques.
"""





