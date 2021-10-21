# ECF DAVID MARCAIS 2021 

# REALISATION D'UNE APPLICATION DE GESTION D'UNE MEDIATHEQUE
# PROJET DANS POUR LA CERTIFICATION DU TITRE RNCP WEB DEVELOPPEUR FULL STACK

# DOCUMENTATIONS DISPONIBLE

README.md  
document technique mediatheque ECF.pdf   
chartre graphique_wireframme.pdf   
Bienvenue sur le site de la mediatheque.pdf (manuel utilisation)    

# SCRIPTS DISPONIBLE
getfilename.php  
relance3semaines.php  
reservation3days.php  
crud_insert.sql  
crud_delete.sql  

# TESTS UNITAIRE
crud_insert.sql  
reservation3days.php   
crud_delete.sql  


# SPECIFICATION TECHNIQUE DU PROJET

Composer version 2.1.8 

FRONT 

HTML5
CSS3
BOOTSTRAP
LANDKIT
JAVASCRIPT

BACK

SYMFONY : 5.3.9  
Version de PHP : 8.0.10   
Version du serveur : 10.4.21-MariaDB    
Version du client de base de données : libmysql - mysqlnd 8.0.10   


# indispensable  

telechargement lampp ou xampp (PHP 8 & Base de données mysql)  

telechargement de Composer  

telechargement de npm  

telechargement de Symfony CLI  


# installation de symfony cli

wget https://get.symfony.com/cli/installer -O - | bash 

# installation des composants

composer install 

# verification 

symfony check:requirements

# copie des fichiers 

git clone https://github.com/dms70/ECF.git

# Mise a jour du fichier env.local avec les variables
# .env.local

DATABASE_URL="mysql://symfony_user:root:3306/mediatheque"
ad your own user,password, smtpserver, password from your smtp server 
MAILER_DSN=smtp://user:password@smtpserver:port 


# remplissage de la base de donnees 

php bin/console doctrine:fixtures:load

# Modfication du chap image dans book pour enlever le path et garder le nom du fichier

php getfilename.php

# mise en production

# ajout des variables en mode production dans le env.local
APP_ENV=prod
APP_DEBUG=0

# reinit du cache
php bin/console cache:clear

# creation de la base de données

php bin/console doctrine:database:create

# creation des entites dans la base mysql

php bin/console doctrine:schema:update --force

# start server symfony

php -S localhost:8000 -t public

# first connection with admin
change password with interface




