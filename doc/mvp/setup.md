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
2. Installer le plugin [json request](https://github.com/symfony-bundles/json-request-bundle#symfony-jsonrequest-bundle) afin de pouvoir faire une api rest-full:
   `composer require symfony-bundles/json-request-bundle`
3. (Optionelle) Installer le bundle [doctrine extension](https://symfony.com/doc/current/StofDoctrineExtensionsBundle/index.html) pour plus de fonctionallité dans vos entités:
   `composer require stof/doctrine-extensions-bundle`
4. (Optionelle) Installer le bundle [api doc](https://symfony.com/bundles/NelmioApiDocBundle/current/index.html) afin de fournir une documentation en ligne de l'api:
   `composer require nelmio/api-doc-bundle`
5. (Optionelle) Installer le bundle [jwt](https://packagist.org/packages/firebase/php-jwt) afin de pouvoir rajouter de la sécurité sur notre API Restfull:
   `composer require firebase/php-jwt`

## 4. [ALL] Configurer votre base de données

N'oubliez pas de configurer votre base de données dans le fichier
`.env` à la racine de votre projet.

Vous pouvez aussi utiliser les commandes suivantes afin de manipuler
votre base de données:

-   `symfony console do:da:cr` : Créer la base de données
-   `symfony console do:sc:up --force` : Met à jour les tables de la base de données
-   `symfony console do:da:dr --force` : Supprime l'intégralité de la base de données
-   `symfony console ha:fi:lo` : Charge les fixtures dans la base de données

### Rappel des commandes symfony

Vous pouvez à tout moment obtenir la liste complète des commande symfony
en entrant dans un terminal : `symfony console`. Vous pouvez aussi
avoir le détail d'une commande en entrant : `symfony console help <nomDeCommande>`.

Voici ici la liste des commandes les plus utilisées :

| Commande                           | Description                                                                                                                      |
| ---------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- |
| `symfony console make:entity`      | Génére une entité                                                                                                                |
| `symfony console make:user`        | Génére une entité User et connécte l'entité au système de sécurité de symfony                                                    |
| `symfony console make:form`        | Génére un formulaire                                                                                                             |
| `symfony console make:auth`        | Génére l'intégralité du système authentification                                                                                 |
| `symfony console make:crud`        | Génére un crud pour une entité                                                                                                   |
| `symfony console do:da:cr`         | Créer la base de données                                                                                                         |
| `symfony console do:sc:up --force` | Met à jour les tables de la base de données                                                                                      |
| `symfony console do:da:dr --force` | Supprime l'intégralité de la base de données                                                                                     |
| `symfony console ha:fi:lo`         | Charge les fixtures dans la base de données                                                                                      |
| `symfony console secu:hash`        | Permet de crypter un mot de passe diréctement depuis le terminal (utilisé lors de la création de fixtures pour les utilisateurs) |

### Note sur l'organisation

Essayer, lorsque vous devez developper une fonctionnalité de suivre l'ordre
suivant :

1. Le DTO (Entity + Fixtures)
2. Le/Les Formulaires
3. Le/Les repository (les méthode `find`)
4. Le/Les Controlleurs
5. La vue (twig, si nescessaire !)

## [ADMIN] 5. La page d'accueil de l'administration

Ajouter une page d'accueil disponible à la route suivante : `/admin`. Cette
page d'accueil présentera rapidement les différentes séction de l'administration:

-   Gestion des utilisateurs
-   Gestion des autheurs
-   Gestion des maisons d'edition
-   Gestion des livres
-   Gestion des commandes
