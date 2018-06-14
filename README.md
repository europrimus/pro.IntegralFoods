# pro.IntegralFoods
Site de vente en ligne pour grossiste et distributeur.
Projet de fin de formation webforce3 Dijon2 réalisé par Didier, Julien et Henry.

## Dépendance
Laravel 5.6  
PHP 7.2  
composer  

## Installation
télécharger le contenu du dépôt
dans le répertoire, lancer la commande

    composer install

Créer la base de donnée, puis éditer le fichier .env pour modifier les informations de la base de données

>APP_DEBUG=false   <= false pour la production  
>APP_URL=http://localhost  
>  
>DB_CONNECTION=mysql   <= Type de base  
>DB_HOST=127.0.0.1  
>DB_PORT=3306  
>DB_DATABASE=proIntegralFoods    <= Nom de la bse de donnée  
>DB_USERNAME=      <= utilisateur  
>DB_PASSWORD=      <= mot de passe 


Créer les tables avec la commande suivante

    php artisan migrate:refresh

Éventuellement des données fictives pour les testes.

    php artisan db:seed

Créer un lien entre le Storage de laravel et le dossier public

    php artisan storage:link

lancer le serveur

    php artisan serve

Dans votre navigateur, ouvrir [http://127.0.0.1:8000](http://127.0.0.1:8000) pour voir le site

## Fonctionnement

### Panier
Ajouter un article au panier. Renvois un **json** {"message":"contenu du message"}
>/panier/ajouter/{idArticle}x{quantite}


## Ressources
[model avec table intermédiaire](https://openclassrooms.com/forum/sujet/les-relations-sur-laravel?page=1#message-92310433)
