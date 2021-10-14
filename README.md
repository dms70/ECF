# ECF

# indispensable  

telechargement lampp (PHP 7.2.5 & Base de données mysql)

telechargement de Composer

telechargement de npm

telechragement de Symfony CLI



# installation de symfony cli

wget https://get.symfony.com/cli/installer -O - | bash 
# installation des composants

composer install --no-dev --optimize-autoloader

# verification 

symfony check:requirements

# copie des fichiers 

$ git config --global user.name "username"
$ git config --global user.email "email adress"
git clone https://github.com/dms70/ECF.git

# Mise a jour du fichier env.local avec les variables

# .env.local

DATABASE_URL="mysql://symfony_user:root:3306/mediatheque"
ad your own user,password, smtpserver, password from your smtp server 
MAILER_DSN=smtp://user:password@smtpserver:port 


# remplissage de la base de donnees 

php bin/console doctrine:fixtures:load

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



