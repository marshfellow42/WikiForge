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

echo "Criando tabelas no banco de dados local"
php artisan migrate

echo "Otimizando o framework Filament"
php artisan filament:optimize-clear

echo "Processo concluído."
read -p "Pressione [Enter] para continuar..."
