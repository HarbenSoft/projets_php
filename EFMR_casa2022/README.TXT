EVALUATION REGIONAL CASA 2012/2022
MODULE: M107 SITES WEB DYNAMIQUES
NIVEAU : TS 1 ANNEE 
DUREE : 2H30 TH/PR

ON SE PROPOSE, DANS CE QUI SUIT, de gérer la location immobilière, à travers un site web dynamique en php.
soit le modèle relationnel suivant : 

client (*id_client, cin, nom, prenom, email, password)
typebImmo(*id_type, libelle)
immobilier(*id_immobilier, titre, adresse, prixlocation, #id_type, disponible(oui/non))
location(*id_location, #id_immobilier, #id_client, date_debut_location, date_fin_location)

1/ Créer une page listerC.php qui permet de lister tous les clients dans une table. (6pts)
2/ Ajouter pour chaque ligne de la table un lien hypertexte pour supprimer un client après confirmation. (6pts)
3/ Ajouter un lien hypertexte sur la page listerC.php qui permet d'ajouter un nouveau client (ajouter_client.php).
  tous les champs sont requis. (6pts)
4/ Créer une page listeLocation.php, qui d'afficher tous les location entre deux dates données. (6pts)
5/ créer une page de connexion client connexion.php permettant à un client de se connecter par email et password,
après connexion l'utilisateur sera redirigé vers une page locationsEncours.php
    a. Conception et authentification. (6pts)
    b. les informations nom et prénom sont affichées en haut de lapage locationsEncours.php.(4 pts)
6/Dans la page locationsEncours.php, afficher toutes les locations en cours du client connecté. (6pts)