# Descrição

Projeto para gerenciamento de carros desenvolvido com Laravel 8 e Vue JS 2 , banco de dados SQLITE.

## Tecnologias

- [Laravel](https://laravel.com/)
- [Vue JS](https://vuejs.org/)
- [SQLite](https://www.sqlite.org/)
- [Boostrap](https://getbootstrap.com/)

## Bibliotecas

- [axios]
- [laravel-mix]

API 

Para rodar a API execute os comandos abaixo: 

```
# navegar para a pasta da api
$ cd laravel-api

#instalar as dependências
$ composer install

#criar base de dados 
$ touch ./database/database.sqlite

#criar base de dados de testes
$ touch ./database/database.test.sqlite

#executar as migrations e criar as tabelas no banco de dados
$ php artisan migrate

#executar o servidor
$ php artisan serve 

#URL: http://127.0.0.1:8000
```


APP WEB

Para rodar a APP WEB execute os comandos abaixo: 

```
# navegar para a pasta do app web
$ cd laravel-app

#instalar as dependências
$ npm install

#executar o servidor
$ npm run dev

#URL: http://localhost:8080
```


## Testes

Para rodar os testes, utilize o comando abaixo:

```
$ vendor/bin/phpunit
```


## Licença

Desenvolvido por [AdrianoLima](https://github.com/adrianolima645/)
