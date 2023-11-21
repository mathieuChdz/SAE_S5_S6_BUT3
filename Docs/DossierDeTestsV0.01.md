# **Calcul nombres premiers Version : 1.0 | Document : Dossier de tests | Date 21/11/2023**

  

Responsable de la rédaction : Belaidi Elyas

  

# **Dossier de tests**

  

## **Partie 1 : Le contexte**

  

1. Introduction

  

Ce document suit la trace des tests effectués sur le site de calcul due au projet SAE, et présente l’environnement dans lequel ils ont étés effectués. Le but de ces tests est de déterminer si le module de calcul remplie les conditions nécessaires pour donner la liste des nombres premiers de 1 à N. 

  

2. Description de la procédure de test

  

La procédure effectuée répond au système de test unitaire. Ces tests seront segmentés le plus possible afin de déterminer rapidement dans quelle parcelle de code se trouve une erreur. Durant ces tests, il sera effectué une vérification des résultats de calculs simples.

  

Afin d’obtenir des résultats concrets, sur chaque méthode de calcul, il sera effectué des tests, chacun comprenant une seule variable. Cette variable variera afin d’avoir des résultats fiables.

  

3. Description des informations à enregistrer pour les tests

  

Le résultat pour chaque variable sera calculé avec un calculateur en ligne, puis comparé avec les résultats obtenus avec le module de calcul. Il faut que les résultats obtenus avec le module correspondent avec les valeurs obtenues au préalable pour que le test soit concluant.

## **Partie 2 : Les tests**

  

1. Campagne de test

  
  

Produit testé : Module de calcul de loi normale Date de début : 22/11/2022

  

Date de finalisation : 24/11/2022

  

Tests à appliquer : Calculs dans une loi normale Responsable de la campagne de test : Belaidi Elyas

  

2. Resultats attendus

  
  

|Outils utilisé : [https://www.dcode.fr/prime-numbers-search](https://www.codabrainy.com/loi-normale)|Version : 1.0||

| - | :- | :- | 

||||

|Classe|N|Résultat attendu (R)|

|P1|N = -1|R = INVALID|

|P2|N = 0|R = INVALID|

|P3|N = 1|R = []|

|P4|N = 2|R = [2]|

|P5|N = 35|R = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31]|

|P6|N = 472|R = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103, 107, 109, 113, 127, 131, 137, 139, 149, 151, 157, 163, 167, 173, 179, 181, 191, 193, 197, 199, 211, 223, 227, 229, 233, 239, 241, 251, 257, 263, 269, 271, 277, 281, 283, 293, 307, 311, 313, 317, 331, 337, 347, 349, 353, 359, 367, 373, 379, 383, 389, 397, 401, 409, 419, 421, 431, 433, 439, 443, 449, 457, 461, 463, 467]|

3. Resultats des tests

  
  

|Identification du test : Calcul de l'effectif des nombres premiers compris entre 1 et n |Version : 2.0||

| - | :- | :- | 

||||

|Classe|N|Résultat obtenu (R)|

|P1|N = -1|R = None|

|P2|N = 0|R = None|

|P3|N = 1|R = []|

|P4|N = 2|R = [2]|

|P5|N = 35|R = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31]|

|P6|N = 472|R = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103, 107, 109, 113, 127, 131, 137, 139, 149, 151, 157, 163, 167, 173, 179, 181, 191, 193, 197, 199, 211, 223, 227, 229, 233, 239, 241, 251, 257, 263, 269, 271, 277, 281, 283, 293, 307, 311, 313, 317, 331, 337, 347, 349, 353, 359, 367, 373, 379, 383, 389, 397, 401, 409, 419, 421, 431, 433, 439, 443, 449, 457, 461, 463, 467]|

# Conclusion :

  

Les résultats obtenus par les tests de notre module de calcul de l'effectif des nombres premiers compris entre 1 et n sont similaires aux résultats obtenus par un simulateur en ligne fiable. On peut donc en conclure que les tests sont concluants, et que notre module de calcul est fiable.
