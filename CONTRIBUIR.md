# Como contribuir?

## Prerrequisitos

- [XAMPP](https://www.apachefriends.org/pt_br/download.html)
- [Composer](https://getcomposer.org/download/)
- [Node](https://nodejs.org/pt/download/package-manager)

Ou, rode os [comandos](https://laravel.com/docs/11.x#installing-php) indicados pela documentação do Laravel de acordo com o seu sistema operacional

## Como testar o website localmente?

1. Faça o clone do projeto

2. Abra o terminal e entre na pasta do projeto clonado

```bash
cd WikiForge
```

3. Rode o comando abaixo para gerar o arquivo ```.env``` correto

```bash
npm install && npm run build
```

4. Rode o comando abaixo para criar as tabelas no seu banco de dados local

```bash
php artisan migrate
```

5. Rode o comando abaixo para rodar o website por meio do localhost

```bash
composer run dev
```
