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


# verification 

symfony check:requirements

# copie des fichiers 

git clone https://github.com/dms70/ECF.git

# installation des composants

composer install 

# Mise a jour du fichier env.local avec les variables
remplacer le champ user , le champ password et le port
DATABASE_URL="mysql://user:password@127.0.0.1:port/mediatheque"

remplacer le champ user , le champ password, smtpserver et son port
MAILER_DSN=smtp://user:password@smtpserver:port 


# remplissage de la base de donnees 

php bin/console doctrine:fixtures:load

# Modfication du champ image dans book pour enlever le path et garder le nom du fichier

php getfilename.php

# mise en production : 
Modifier les variables dans le fichier env: 
APP_ENV=prod
APP_DEBUG=0

# reinit du cache
php bin/console cache:clear

# creation de la base de données

php bin/console doctrine:database:create

# creation des entites dans la base mysql

php bin/console doctrine:schema:update --force

# faire un hash de votre mot de passe
php bin/console  security:hash-password
# creation d'un user admin (solution 1)
modifier le script createuser.sql
remplacer superadmin@myorganisation avec votre adresse email
remplacer Mypassword avec le votre (faire un hash recuperer avec la commande security:hash-password)
lancer le script createuser.sql avec la commandde mysql -u user -p password < createuser.sql

# creation d'un user admin (solution 2)
Editer le fichier Appfixtures.php, modifier le champ admin@davidmarcais.fr avec votre email
et modifier le champ mot de passe associé.

# start server symfony

php -S localhost:8000 -t public

# first connection with admin
change password with interface




