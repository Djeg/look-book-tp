# Partie 6 - L'achat

Dans cette partie vous retrouverez tout ce qui concerne l'achat
d'un ou plusieurs livres de l'application.

## [FRONT] Le panier

En tant qu'utilisateur connécté uniquement,
Lorsque je vois un livre quelle qu'il soit
Alors je dois pouvoir cliquer sur un bouton "Ajouter au panier"
Mon panier doit se mettre à jours et contenir le livre

En tant qu'utilisateur connécté,
Lorsque je me rend sur la page `/mon-panier`
Alors je dois pouvoir consulter tout les livres de mon panier,
Je dois aussi pouvoir supprimer un livre du panier

## [FRONT] La commande

En tant qu'utilisateur connécté uniquement,
Lorsque je me rend sur la page de mon panier,
Et que je clique sur "Acheter"
Alors je dois accéder à une page "/acheter"
Je dois pouvoir renseigner mon adresse de facturation,
Je dois pouvoir renseigner mon adresse de livraison,
Je dois pouvoir renseigner mes informations de carte bleu
Lorsque je clique sur "Payer"
Alors ma commande doit être terminé:
Le/Les livres doivent être retiré de la vente,
Mon panier doit être vidé

En tant qu'utilisateur connécté uniquement,
Lorsque je me rend sur la page "/mes-commandes",
Alors je dois pouvoir consulter toutes mes commandes
passé

## [ADMIN] Gérer les commandes

En tant qu'administrateur connécté uniquement,
Lorsque je me rend sur la page "/admin"
Et que je clique sur "Gestion des commandes"
Alors je dois pouvoir consulter toutes les commandes
de tout les utilisateurs du site.
