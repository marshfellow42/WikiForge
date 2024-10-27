#!/bin/bash

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

echo "Criando um banco de dados SQL"
touch database/database.sqlite

echo "Criando tabelas no banco de dados local"
php artisan migrate

echo "Processo concluído."
read -p "Pressione [Enter] para continuar..."
