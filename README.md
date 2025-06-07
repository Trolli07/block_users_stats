# Users Statistics Block for Moodle

## Overview
The Users Statistics Block is a Moodle plugin that displays key statistics about users and course activities on the user's dashboard page.

This block provides administrators and managers with a quick overview of platform usage.

## Features
- Displays the total number of users in the system
- Shows count of active users
- Presents total number of course enrollments
- Tracks course view statistics

## Requirements
- Moodle 4.5 or higher

## Installation
1. Download the plugin
2. Extract the contents to `/blocks/users_stats` in your Moodle installation
3. Visit the admin notifications page to complete the installation

## Usage
Once installed, the block can be added to the dashboard ("My" page) by users with appropriate permissions. The block will automatically fetch and display the latest statistics.

## Permissions
The block requires the capability `block/users_stats:myaddinstance` to be displayed.

## Technical Details

This plugin is primarily designed following Moodle best practices and includes:

- Use of **Mustache templates** and **renderers** to clearly separate presentation from logic.
- Integration of a **web service (WS)** to fetch statistics asynchronously and securely.
- Implementation of **caching** mechanisms to improve performance and reduce database load.
- Plugin **settings** to configure behavior such as cache refresh interval.
- Proper **permissions** checks to control access to block features.
- Error handling and user notifications integrated with Moodle's core systems.

## License
This plugin is licensed under the GNU GPL v3 or later. See the LICENSE file for details.

---

# Bloc de Statistiques Utilisateurs pour Moodle

## Aperçu
Le Bloc de Statistiques Utilisateurs est un plugin Moodle qui affiche des statistiques clés concernant les utilisateurs et les activités des cours sur le tableau de bord de l'utilisateur.

Ce bloc fournit aux administrateurs et aux gestionnaires une vue d'ensemble rapide de l'utilisation de la plateforme.

## Fonctionnalités
- Affiche le nombre total d'utilisateurs dans le système
- Montre le nombre d'utilisateurs actifs
- Présente le nombre total d'inscriptions aux cours
- Suit les statistiques de consultation des cours

## Prérequis
- Moodle 4.5 ou supérieur

## Installation
1. Téléchargez le plugin
2. Extrayez le contenu dans `/blocks/users_stats` de votre installation Moodle
3. Visitez la page des notifications d'administration pour terminer l'installation

## Utilisation
Une fois installé, le bloc peut être ajouté au tableau de bord (page "Tableau de bord") par les utilisateurs disposant des permissions appropriées. Le bloc récupérera et affichera automatiquement les dernières statistiques.

## Permissions
Le bloc nécessite la capacité `block/users_stats:myaddinstance` pour être affiché.

## Détails techniques

Ce plugin est principalement conçu selon les bonnes pratiques Moodle et inclut :

- Utilisation de **templates Mustache** et de **renderers** pour séparer clairement la présentation de la logique.
- Intégration d’un **webservice (WS)** pour récupérer les statistiques de manière asynchrone et sécurisée.
- Mise en place d’un système de **cache** pour améliorer les performances et réduire la charge sur la base de données.
- **Paramètres** du plugin permettant de configurer le comportement, comme l’intervalle de rafraîchissement du cache.
- Vérifications des **permissions** pour contrôler l’accès aux fonctionnalités du bloc.
- Gestion des erreurs et notifications utilisateur intégrées au système de notifications natif de Moodle.

## Licence
Ce plugin est sous licence GNU GPL v3 ou ultérieure. Voir le fichier LICENSE pour plus de détails.
