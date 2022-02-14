# Partie 1 - L'instalation

Dans cette partie vous mettrez en place l'installation générale du projet
ainsi que les différents plugins ou librairies utile pour le dévelopemment

## 1. [ALL] Création du projet

À l'aide de la commande : `symfony new --webappp <nomDuProject>`, générez
le projet symfony.

## 2. [ALL] Nettoyage du projet

Supprimer les fichiers suivant de la racine du projet:

-   Le répertoire `assets`
-   Le fichier `package.json`
-   Les fichiers `docker-compose*`
-   Dans `templates/base.html.twig` supprimer toutes les références à `encore`

## 3. [ALL] Installation des "bundles" ou librairie nescessaire au projet

1. Installer le plugin [alice](https://github.com/theofidry/AliceBundle#alicebundle):
   `composer require hautelook/alice-bundle`
2. (Optionelle) Installer le bundle [doctrine extension](https://symfony.com/doc/current/StofDoctrineExtensionsBundle/index.html) pour plus de fonctionallité dans vos entités:
   `composer require stof/doctrine-extensions-bundle`

## 4. [ALL] Configurer votre base de données

N'oubliez pas de configurer votre base de données dans le fichier
`.env` à la racine de votre projet.

Vous pouvez aussi utiliser les commandes suivantes afin de manipuler
votre base de données.

-   `symfony console do:da:cr` : Créer la base de données
-   `symfony console do:sc:up --force` : Met à jour les tables de la base de données
-   `symfony console do:da:dr --force` : Supprime l'intégralité de la base de données
-   `symfony console ha:fi:lo` : Charge les fixtures dans la base de données

## [ADMIN] 5. La page d'accueil de l'administration

Ajouter une page d'accueil disponible à la route suivante : `/admin`. Cette
page d'accueil présentera rapidement les différentes séction de l'administration:

-   Gestion des utilisateurs
-   Gestion des adresses
-   Gestion des auteurs
-   Gestion des maisons d'edition
-   Gestion des catégories
-   Gestion des livres
-   Gestion des commandes
