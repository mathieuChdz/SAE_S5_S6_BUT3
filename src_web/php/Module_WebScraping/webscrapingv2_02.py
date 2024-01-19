import sys
import requests
from bs4 import BeautifulSoup
import joblib

model_english = joblib.load('en.joblib')
model_francais = joblib.load('fr.joblib')

"""On va d'abord extraire les titres des articles d'un site d'information français, nous avons choisi le site [Le Monde](https://www.lemonde.fr/)"""

url = 'https://www.lemonde.fr/'

headers = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
}
response = requests.get(url, headers=headers)


def afficher_titres():
    if response.status_code == 200:
        # Utiliser Beautiful Soup pour extraire le contenu HTML de la page
        soup = BeautifulSoup(response.content, 'html.parser')

        # Exemple : Extraire tous les titres d'articles
        titres = soup.find_all('p', class_='article__title')

        for i in range(len(titres)):
            titres[i] = titres[i].text.strip()
        return titres
    else:
        print(f"La requête a échoué avec le code d'état {response.status_code}")
        return None


"""On va maintenant extraire les titres des articles d'un site d'information international, nous avons choisi le site américain [The Washington Post](https://www.washingtonpost.com/)"""

url2 = 'https://www.washingtonpost.com/'

response2 = requests.get(url2, headers=headers)


def afficher_title():
    if response2.status_code == 200:
        # Utiliser Beautiful Soup pour extraire le contenu HTML de la page
        soup = BeautifulSoup(response2.content, 'html.parser')

        # Exemple : Extraire tous les titres d'articles
        titles = soup.find_all('h2', class_='wpds-c-iiQaMf wpds-c-iiQaMf-ihElTZa-css')
        titles = titles + soup.find_all('h2', class_='wpds-c-iiQaMf wpds-c-iiQaMf-ibYgSwf-css')
        for i in range(len(titles)):
            titles[i] = titles[i].text.strip()
        return titles
    else:
        print(f"La requête a échoué avec le code d'état {response.status_code}")
        return None


"""Desormais, on va effectuer un analyse de sentiment sur les réponses qu'on a obtenu ci dessus.
L'objectif est de déterminer un ratio de titre d'article positifs/négatifs (en pourcentage)

Ici, on a choisi un modèle de type SVC. Dans tous les cas, il nous fallait un modèle capable de catégoriser les data et parmi ceux testés, c'est SVC qui a fourni le meilleur résultat. On utilise un pipeline pour coupler le modèle SVC avec un TfidfVectorizer permettant de traiter les données textuelles.
"""


# Utilisez le modèle pour prédire les labels
def afficher_stats_en():
    new_predictions = model_english.predict(afficher_title())

    nb_0 = 0
    nb_1 = 0
    for phrase, prediction in zip(afficher_title(), new_predictions):
        if prediction == '1' or prediction == '2':
            nb_0 += 1
        else:
            nb_1 += 1
    positive_neutral = round(nb_1 / (nb_0 + nb_1) * 100, 2)
    negative = round(nb_0 / (nb_0 + nb_1) * 100, 2)
    return positive_neutral, negative


def afficher_stats_fr():
    nouvelles_predictions = model_francais.predict(afficher_titres())

    nb_0 = 0
    nb_1 = 0
    nb_neutre = 0
    for phrase, prediction in zip(afficher_titres(), nouvelles_predictions):
        if prediction == '2':
            nb_0 += 1
        if prediction == '1':
            nb_neutre += 1
        else:
            nb_1 += 1
    positif = round(nb_1 / (nb_0 + nb_1 + nb_neutre) * 100, 2)
    negatif = round(nb_0 / (nb_0 + nb_1 + nb_neutre) * 100, 2)
    neutre = round(nb_neutre / (nb_0 + nb_1 + nb_neutre) * 100, 2)
    return positif, neutre, negatif


'''
print(afficher_stats_en())
print(afficher_stats_fr())
'''

if __name__ == "__main__":
    
    arg_function = sys.argv[1:]

    if arg_function[0] == "1":
        res = afficher_titres()

    elif arg_function[0] == "2":
        res = afficher_stats_fr()

    elif arg_function[0] == "3":
        res = afficher_title()

    elif arg_function[0] == "4":
        res = afficher_stats_en()


    print(res)