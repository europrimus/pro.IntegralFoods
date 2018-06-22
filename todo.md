# todo

-----------------------------
## Administration
### Validation inscription
### Commandes
valider payement du client  
pouvoir modifié l'état de la commande  

-------------------------------
## Clients
## Pre-inscription
## Connexion
tester mot de passe oublié  
### première connexion
Ajouter adresse facturation (actuellement copie de l'adresse de contact lors de la validation du compte)  
Ajouter adresse livraison  
### liste des produits
modifier contenu panier dynamiquement  
### Passer une commande
### enregistrement commande
### liste des commandes
voir l'état des commandes  
### détails d'une commande
## Mon Compte
### Mes informations
### Mes adresses
pouvoir supprimer et ajouter des adresses de livraisons  
pouvoir modifier l'adresse de contact et de facturation  

-----------------------------
## Générale
### gestion des erreurs
### fichier de configuration
créer un fichier de configuration pour les info sur le vendeur:
 - nom entrprise
 - num siret
 - adresse mail
 - ...  
certaine pourait être reprise de la base de donnée (compte admin), mais pour l'instant, elles sont écritent en dur dans les diférents fichiers (`CommandesController.php` et dans les fonctions envoyant les mails)
