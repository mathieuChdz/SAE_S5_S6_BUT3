
# Recueil des besoins

V 1.00

Guenfici Rayane | Chedozeau Mathieu | Renouf Ugo | Belaidi Elyas | Bullock Patrick



**1/ Introduction............................................................................................................1**

**2/ Objectif et portée................................................................................................... 1**

**3/ Terminologie - Glossaire.......................................................................................2**

**4/ Les cas d'utilisation...............................................................................................2**

**5/ Technologies employées...................................................................................... 2**

**6/ Autres exigences................................................................................................... 2**


## 1/ Introduction

Ce document est le recueil des besoins relatif au développement d'une application web permettant de réaliser des calculs parallèles | ML. Divisé en sept parties, dont cette introduction, ce document a pour objectif de recueillir les besoins du client à partir du cahier des charges client. Nous y inscrivons les objectifs et leur portée ainsi que le glossaire. Nous proposerons ensuite une analyse des cas d’utilisation. Enfin nous présenterons les technologies employées, les autres exigences ainsi que les recours humains, questions juridiques, politiques et organisationnelles.


## 2/ Objectif et portée

● **Objectif du Projet :**

    ○ Mettre en place des programmes pour le calcul distribué ou parallèle sur le cluster ainsi que pour l’apprentissage automatique.
    ○ Développer une interface web permettant aux utilisateurs de lancer desprogrammes.
    ○ Afficher les résultats sur l'application web (courbes, matrices, diagrammes).
    ○ Produire un court compte rendu sur les résultats.

**● Intervenants :**

    ○ Les intervenants sur l’application sont les visiteurs. Ce sont des personnes pouvant être n’importe voulant utiliser l’application.
    ○ L’administrateur pourra voir le nombre d’utilisations par module via un dashboard

**● Portée :** 

    ○ Dans l’immédiat, la portée est limitée à l’IUT de Vélizy, car les visiteurs ne pourront provenir que de l’intérieur du réseau de l’IUT. À termes, le projet pourrait devenir public et sa portée illimitée.

## 3/ Terminologie - Glossaire

**SAÉ :** Situation d'apprentissage et d'évaluation.

**RPI :** Contraction de Raspberry Pi, est un nano-ordinateur monocarte à processeur

de la taille d'une carte de crédit.

## 4/ Les cas d'utilisation

##### Cas d’utilisation 1 : Simulation de calculs parallèles   
    Nom : Simulation de calculs parallèles
    Contexte d’utilisation : un visiteur veut lancer une simulation
    Portée : site web
    Niveau : utilisateur
    Acteur principal : l’utilisateur
    Intervenants et intérêts: l’intervenant est l'utilisateur et son intérêt est de pouvoir lancer une simulation
    Précondition: l’utilisateur est allé sur la page permettant de lancer des simulations de calculs parallèles
    Garantie minimale: l’utilisateur à accès à une présentation de la simulation
    Garantie en cas de succès: L’utilisateur lance la simulation voulue.
    Déclencheur: l’utilisateur clique sur le bouton “lancer"
    Scénario nominal:
    - L'utilisateur est sur la page d’accueil
    - L’utilisateur se dirige vers la page permettant de lancer des simulations de calculs parallèles
    - l’utilisateur clique sur le bouton “lancer" de la simulation voulue
    Extension:
    Liste des variantes:
    Informations connexes:

##### Cas d’utilisation 2 : Visionner les statistiques des différentes simulations
    Nom : Visionner les statistiques des différentes simulations
    Contexte d’utilisation : le gestionnaire veut visionner les statistiques d’utilisation des modules
    Portée : site web
    Niveau : utilisateur
    Acteur principal : le gestionnaire
    Intervenants et intérêts: l’intervenant est le gestionnaire et son intérêt est de pouvoir visionner les statistiques d’utilisation des modules
    Précondition: le gestionnaire est allé sur la page permettant de visionner les statistiques d’utilisation des modules
    Garantie minimale: message d’erreur
    Garantie en cas de succès: le gestionnaire à accès aux statistiques
    Déclencheur: l’utilisateur clique sur le bouton “lancer"
    Scénario nominal:
    - Le gestionnaire est sur la page d’accueil
    - Le gestionnaire se dirige vers la page permettant visualiser les statistiques
    - Le gestionnaire visualise les statistiques
    Extension:
    Liste des variantes:
    Informations connexes:

## 5/ Technologies employées

● Les différents prérequis peuvent se diviser en deux catégories :

    ○ Au niveau des ressources matérielles, on retrouve l'utilisation d’un “*kit* *cluster hat*” (4 Pi zero + un Kit Cluster Hat).
    ○ Pour ce qui est des ressources logicielles, plusieurs logiciels sont à prévoir. Premièrement, nous utiliserons GitLab pour le suivi ainsi que le versionnage du projet. Ensuite, pour la construction des maquettes, du logo et de la charte graphique, nous utiliserons Figma ainsi que la suite Adobe. Enfin, pour ce qui est du développement, nous utiliserons la suite de logiciels JetBrains.

● Les différents rapports seront réalisés en Markdown.

## 6/ Autres exigences

● Processus de développement :

    ○ Les participants au projet sont l’équipe de développement et le Client qui sont respectivement notre groupe de SAE et M. Hoguin.
    ○ Les valeurs que l'on va privilégier sont la souplesse et l’autonomie qui seront nécessaires pour le développement de l’application afin de pouvoir être apte à affronter toute éventualité qui pourrait retarder nos rendus.

● Règles métier :

    ○ Chaque utilisateur peut accéder ou interagir aux simulations du site web librement depuis la page d’accueil.


## 7/ Recours humain, questions juridiques, politiques, organisationnelles

● Quel est le recours humain au fonctionnement du système?

    Le gestionnaire sera là afin de s’occuper du fonctionnement de l’application.

● Quelles sont les exigences politiques et juridiques?

    Aucune exigence n’est envisagée sur le site. Il s’agit seulement d’une application qui effectue des calculs parallèles | ML, aucune donnée n’est récoltée.

● Quelles sont les exigences technologiques pour ce système ?

    Ce système fournira des simulations diverses utiles aux utilisateurs via leur navigateur web.

● Quels sont les besoins en formation?

    Aucun.

● Quelles sont les hypothèses et les dépendances affectant l’environnement humain?

    Aucune.


