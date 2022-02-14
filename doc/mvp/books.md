# Partie 4 - Les livres

Cette partie est la partie centrale de l'application puisqu'il s'agit
de mettre en place la gestion et l'utilisattion des livres
dans l'application.

## [ADMIN] CRUD des livres

An tant qu'admin lorsque je me rend sur la page d'accueil de l'admin (`/admin`)
Et que je clique sur `Gestion des livres`
Alors je dois voir l'intégralité des livres sous forme de liste
Je peux dès lors ajouter, supprimer et éditer un livre
Je doit aussi pouvoir consulter et modifier:

-   L'utilisateur qui a mis le livre en vente
-   Son auteur
-   sa catégorie
-   Sa maison d'édition

## [FONT] Ajout d'un livre à vendre

En tant qu'utilisateur connécté
Lorsque je me rend sur la page `/vendre-livre`
Je dois pouvoir ajouter dans un formulaire le livre que j'aimerais vendre
Lorsque je valide une page `/livre/{id}` doit être disponible
Et tout les autres utilisateurs peuvent consulter mon livre
Si je suis la personne qui vend le livre je dois pouvoir avoir
le possibilité de modifier ses informations

## [FRONT] Gestion de mes livre

En tant qu'utilisateur connécté
Lorsque je me rend sur la page `/mes-livres`
Alors je dois pouvoir consulter la liste de tout mes livres (vendu ou non)
Je dois aussi pouvoir les consulter, les modifier et les supprimer

## [FRONT] Page d'accueil

En tant qu'utilisateur non connécté
Lorsque je me rend sur la page `/`
Alors je dois pouvoir consulter la liste des 25 derniers
livres mis en ventes.
Je dois aussi pouvoir consulter la page d'un livre
Je dois aussi pouvoir consulter le profile du vendeur

## [FRONT] Rechercher des livres

En tant qu'utilisateur non connécté
Lorsque je me rend sur la page `/chercher-un-livre`
Je dois pouvoir rechercher des livres avec les critéres suivants :

-   Par titre
-   Par auteur
-   Par catégorie
-   Par prix minimum / maximum
-   Par maisons d'édition
