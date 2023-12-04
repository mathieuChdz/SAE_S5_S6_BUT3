import numpy as np
import matplotlib.pyplot as plt

def monte_carlo_probabilite_normale(moyenne, ecart_type, t1=None, t2=None, nbr_echantillons=300000):
    # Vérifier si t1 > t2
    if t1 is not None and t2 is not None and t1 >= t2:
        print("Erreur: t1 doit être strictement inférieur à t2.")
        return

    # Générer des échantillons aléatoires à partir de la distribution normale
    echantillons = np.random.normal(loc=moyenne, scale=ecart_type, size=nbr_echantillons)

    # Calculer la probabilité P(t1 < X), P(X < t2), ou P(t1 < X < t2) avec la méthode de Monte Carlo
    if t1 is not None and t2 is not None:
        probabilite_estimee = np.sum((t1 < echantillons) & (echantillons < t2)) / nbr_echantillons
        label = f'P({t1} < X < {t2})'
    elif t1 is not None:
        probabilite_estimee = np.sum(echantillons > t1) / nbr_echantillons
        label = f'P(X > {t1})'
    elif t2 is not None:
        probabilite_estimee = np.sum(echantillons < t2) / nbr_echantillons
        label = f'P(X < {t2})'
    else:
        print("Erreur: Fournissez au moins un des seuils t1 ou t2.")
        return

    # Afficher le résultat estimé
    print(f'Probabilité estimée {label}: {probabilite_estimee:.4f}')


######################################################


def tester_monte_carlo():
    # Cas 1-4: P(t1 < X)
    monte_carlo_probabilite_normale(moyenne=0, ecart_type=1, t1=0)
    monte_carlo_probabilite_normale(moyenne=2, ecart_type=5, t1=0.5)
    monte_carlo_probabilite_normale(moyenne=-1, ecart_type=10, t1=-2.0)
    monte_carlo_probabilite_normale(moyenne=3, ecart_type=15, t1=3.5)

    # Cas 5-8: P(X < t2)
    monte_carlo_probabilite_normale(moyenne=0, ecart_type=1, t2=1.5)
    monte_carlo_probabilite_normale(moyenne=2, ecart_type=5, t2=3.0)
    monte_carlo_probabilite_normale(moyenne=-1, ecart_type=10, t2=0)
    monte_carlo_probabilite_normale(moyenne=3, ecart_type=15, t2=2.5)

    # Cas 9-12: P(t1 < X < t2)
    monte_carlo_probabilite_normale(moyenne=0, ecart_type=1, t1=1.0, t2=2.0)
    monte_carlo_probabilite_normale(moyenne=2, ecart_type=5, t1=0.5, t2=3.5)
    monte_carlo_probabilite_normale(moyenne=-1, ecart_type=10, t1=2, t2=2)
    monte_carlo_probabilite_normale(moyenne=3, ecart_type=15)

# Tester tous les cas
# Les resultat ne sont jamais les mêmes, c'est dû à la fonction random
tester_monte_carlo()


#####################################################


def monte_carlo_probabilite_normale_graphe(moyenne, ecart_type, t1=None, t2=None, nbr_echantillons=300000):
    # Générer des échantillons aléatoires à partir de la distribution normale
    echantillons = np.random.normal(loc=moyenne, scale=ecart_type, size=nbr_echantillons)

    # Calculer la probabilité P(t1 < X), P(X < t2), ou P(t1 < X < t2) avec la méthode de Monte Carlo
    if t1 is not None and t2 is not None:
        probabilite_estimee = np.sum((t1 < echantillons) & (echantillons < t2)) / nbr_echantillons
        label = f'P({t1} < X < {t2})'
    elif t1 is not None:
        probabilite_estimee = np.sum(echantillons > t1) / nbr_echantillons
        label = f'P(X > {t1})'
    elif t2 is not None:
        probabilite_estimee = np.sum(echantillons < t2) / nbr_echantillons
        label = f'P(X < {t2})'
    else:
        raise ValueError("Au moins un des seuils t1 ou t2 doit être fourni.")

    # Affichage de la courbe de densité de probabilité normale
    x_values = np.linspace(moyenne - 4 * ecart_type, moyenne + 4 * ecart_type, 1000)
    pdf_values = (1 / (ecart_type * np.sqrt(2 * np.pi))) * np.exp(-0.5 * ((x_values - moyenne) / ecart_type) ** 2)
    plt.plot(x_values, pdf_values, color='red', linewidth=2, label='Densité de probabilité normale')

    # Mise en forme du graphique
    if t1 is not None and t2 is not None:
        plt.fill_between(x_values, pdf_values, where=((x_values > t1) & (x_values < t2)), color='blue', alpha=0.3, label=label)
    elif t1 is not None:
        plt.fill_between(x_values, pdf_values, where=(x_values > t1), color='blue', alpha=0.3, label=label)
    elif t2 is not None:
        plt.fill_between(x_values, pdf_values, where=(x_values < t2), color='blue', alpha=0.3, label=label)

    plt.title('Estimation de la probabilité avec la méthode de Monte Carlo')
    plt.xlabel('Valeurs')
    plt.ylabel('Densité de probabilité')
    plt.legend()
    plt.show()

    # Afficher le résultat estimé
    print(f'Probabilité estimée {label}: {probabilite_estimee:.4f}')

# Exemple d'utilisation avec P(t1 < X)
monte_carlo_probabilite_normale_graphe(moyenne=0, ecart_type=1, t1=1.2)

# Exemple d'utilisation avec P(X < t2)
monte_carlo_probabilite_normale_graphe(moyenne=0, ecart_type=1, t2=1.5)

# Exemple d'utilisation avec P(t1 < X < t2)
monte_carlo_probabilite_normale_graphe(moyenne=0, ecart_type=1, t1=-1.0, t2=1.5)

