# Look Book

Look Book est une application de ventes de livres entre
particulier.

Chaque utilisateur peut proposer de vendres un ou plusieurs livres
et reçois les meilleurs offres.

Cette application contient **l'espace d'administration** ainsi qu'une
**api restfull** pouvant délivrer l'intégralité du contenu à diverses applications.

Vous retrouverez sur le MVP les labels suivants:

-   **[ADMIN]**: Concerne la partie d'administration
-   **[FRONT]**: Concerne la partie Public de l'application
-   **[ALL]**: Concerne à la fois le front ainsi que l'admin

## Note sur l'organisation et rappel des commandes symfony

Voici un bref rappel des commandes symfony les plus utilisé ainsi
que qu'une aide pour le développement de fonctionalités en Symfony

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

## Le MVP (Most Valuable Product)

Dans cette section vous retrouverez l'intégralité des taches à réaliser
afin de développer ce projet.

Vous pouvez vous aider des documents suivants afin de vous organiser:

-   [Le brainstorming](doc/brainstorming.png)
-   [Le diagramme des entités](doc/entities.png)

### Les taches à suivre :

1. [La mise en place](doc/mvp/setup.md)
2. [Les utilisateurs](doc/mvp/users.md)
3. [Les auteurs & les maisons d'editions](doc/mvp/author-publisher.md)
4. [Les livres](doc/mvp/books.md)
5. [L'achat](doc/mvp/orders.md)
