# Partie 2 - Les utilisateurs

Dans cette partie nous metterons en place toutes les fonctionnalité
relié aux utilisateurs.

Nous retrouverons une partie **Administration** ([ADMIN]) et un partie
API ([API]).

## [ADMIN] Mise en place de la connexion

Lorsque je me rend sur la page `/connexion` je devrais pouvoir
rentrer mes identifiants. Si ces derniers sont correct alors je dois
être connécté sur l'application (`/`).

Tout ce qui commence par `/admin` doit
être uniquement disponible pour les administrateur

## [ADMIN] CRUD des utilisateur

An tant qu'admin lorsque je me rend sur la page d'accueil de l'admin (`/admin`)
Et que je clique sur `Gestion des utilisateurs`
Alors je dois voir l'intégralité des utilisateurs sous forme de liste
Je peux dès lors ajouter, supprimer et éditer un utilisateur

## [ADMIN] CRUD des adresses

An tant qu'admin lorsque je me rend sur la page d'accueil de l'admin (`/admin`)
Et que je clique sur `Gestion des adresses`
Alors je dois voir l'intégralité des adresses sous forme de liste
Je peux dès lors ajouter, supprimer et éditer une adresse

Je devrais pouvoir aussi directement depuis la page d'édition d'un utilisateur
lui attachez une ou plusieurs adresses et choisir son adresse de
facturation et son adresse de livraison.

## [FRONT] Formulaire d'inscription

Lorsque je me rend sur la page `/inscription` je devrais pouvoir
rentrer mes informations (pas besoin de spécifier d'addresse) afin de m'inscrire sur look book.

Une fois mes informations validé, l'utilisateur peut se connécter
et le mot de passe doit être crypter en base de données !

## [FRONT] Mon profile

Losque je me rend sur `/mon-profile` et que je suis connécté
je dois pouvoir consulter mes informations et les modifier.

Je dois pouvoir aussi ajouter une adresse, la modifier et choisir
mon adresse de livraison et de facturation.

## [FRONT] Consulter un profile

Losque je me rend sur `/profile/{id}` et que je ne suis pas connécte
je dois pouvoir consulter les informations publique d'un utilisateur.

Je dois aussi voir les livres que cette utilisateurs vend
