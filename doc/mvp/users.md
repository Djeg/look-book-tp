# Partie 2 - Les utilisateurs

Dans cette partie nous metterons en place toutes les fonctionnalité
relié aux utilisateurs.

Nous retrouverons une partie **Administration** ([ADMIN]) et un partie
API ([API]).

## [ADMIN] Mise en place de la connexion de admin

Lorsque je me rend sur la page `/admin/login` je devrais pouvoir
rentrer mes identifiants. Si ces derniers sont correct alors je dois
être connécté sur l'administration (`/admin`).

Tout ce qui commence par `/admin` (à l'expection de `/admin/login`) doit
être uniquement disponible pour les administrateur

## [ADMIN] CRUD des utilisateur

An tant qu'admin lorsque je me rend sur la page d'accueil de l'admin (`/admin`)
Et que je clique sur `Gestion des utilisateurs`
Alors je dois voir l'intégralité des utilisateurs sous forme de liste
Je peux dès lors ajouter, supprimer et éditer un utilisateur
