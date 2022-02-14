# Partie 1 - L'instalation

Dans cette partie vous mettrez en place l'installation générale du projet
ainsi que les différents plugins ou librairies utile pour le dévelopemment

## 1. Création du projet

À l'aide de la commande : `symfony new --webappp <nomDuProject>`, générez
le projet symfony.

## 2. Nettoyage du projet

Supprimer les fichiers suivant de la racine du projet:

-   Le répertoire `assets`
-   Le fichier `package.json`
-   Les fichiers `docker-compose*`
-   Dans `templates/base.html.twig` supprimer toutes les références à `encore`

## 3. Installation des "bundles" ou librairie nescessaire au projet

1. Installer le plugin [alice](https://github.com/theofidry/AliceBundle#alicebundle):
   `composer require hautelook/alice-bundle`
2. Installer le plugin [json request](https://github.com/symfony-bundles/json-request-bundle#symfony-jsonrequest-bundle) afin de pouvoir faire une api rest-full:
   `composer require symfony-bundles/json-request-bundle`
3. (Optionelle) Installer le bundle [doctrine extension](https://symfony.com/doc/current/StofDoctrineExtensionsBundle/index.html) pour plus de fonctionallité dans vos entités:
   `composer require stof/doctrine-extensions-bundle`
4. (Optionelle) Installer le bundle [api doc](https://symfony.com/bundles/NelmioApiDocBundle/current/index.html) afin de fournir une documentation en ligne de l'api:
   `composer require nelmio/api-doc-bundle`
5. (Optionelle) Installer le bundle [jwt](https://github.com/lexik/LexikJWTAuthenticationBundle/blob/2.x/Resources/doc/index.md#installation) afin de pouvoir rajouter de la sécurité sur notre API Restfull:
   `composer require lexik/jwt-authentication-bundle`

## 4. Configurer votre base de données

N'oubliez pas de configurer votre base de données dans le fichier
`.env` à la racine de votre projet.

Vous pouvez aussi utiliser les commandes suivantes afin de manipuler
votre base de données:

-   `symfony console do:da:cr` : Créer la base de données
-   `symfony console do:sc:up --force` : Met à jour les tables de la base de données
-   `symfony console do:da:dr --force` : Supprime l'intégralité de la base de données
-   `symfony console ha:fi:lo` : Charge les fixtures dans la base de données

### Note sur l'organisation

Essayer, lorsque vous devez developper une fonctionnalité de suivre l'ordre
suivant :

1. Le DTO (Entity + Fixtures)
2. Le/Les Formulaires
3. Le/Les repository (les méthode `find`)
4. Le/Les Controlleurs
5. La vue (twig, si nescessaire !)

## 5. La page d'accueil de l'administration

Ajouter une page d'accueil disponible à la route suivante : `/admin`. Cette
page d'accueil présentera rapidement les différentes séction de l'administration:

-   Gestion des utilisateurs
-   Gestion des autheurs
-   Gestion des maisons d'edition
-   Gestion des livres
-   Gestion des commandes
