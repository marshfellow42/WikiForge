#!/bin/bash

echo "Executando composer self-update"
composer self-update

echo "Executando composer clear-cache"
composer clear-cache

echo "Executando composer update"
composer update

echo "Executando composer install"
composer install

echo "Executando npm install"
npm install

echo "Executando npm run build"
npm run build

echo "Copiando .env.example para .env"
cp .env.example .env

echo "Gerando API Key"
php artisan key:generate

echo "Criar o banco de dados SQL"
touch database/database.sqlite

echo "Criando tabelas no banco de dados local"
php artisan migrate

echo "Criando o admin no banco de dados local"
php artisan db:seed

echo "Limpando o cache do Laravel"
php artisan config:clear
php artisan cache:clear
php artisan view:clear

echo "Linkando o storage com o public"
php artisan storage:link

echo "Processo concluído."
read -p "Pressione [Enter] para continuar..."
