# API BileMo

***

## Introduction

This project is part of OpenClassrooms' PHP/Symfony training program. You will find a code designed with API Platform.

This project is the realization of an API for the BileMo company, which doesn't want to sell its products directly online, but to offer its catalog to all platforms that want it through an API.

The main objective is to be able to :
- consult the list of BileMo products;
- consult the details of a BileMo product;
- consult the list of registered users linked to a customer on the website;
- consult the details of a registered user linked to a customer;
- add a new user linked to a customer;
- delete a user added by a customer.

## Require

This project requires PHP 8.1, MySQL or MariaDB, Composer 2.5, Symfony 6.2, JWT Authentication, Faker, ApiPlatform 3.1 and Doctrine.

## For start

To start, you need to clone the main branch.

For the project to work well on your machine you need to do :

-   `composer install` to generate a composer.json file

## Database

To configure the database, edit the `.env.local` file with your database connection data.

```php
DATABASE_URL="mysql://!ChangeMe!@localhost:3306/!ChangeMe!?serverVersion=mariadb-10.4.27&charset=utf8"
```

To create the database you need to run this command :

```php
symfony console doctrine:database:create
```

Then perform the migrations located in the `./migrations/` folder at the root of the project. This will allow you to get
the same database as me. To perform the migrations use this command :

```php
symfony console doctrine:migrations:migrate
```

## Fixtures

After creating your database, you can also inject a dataset by performing the following command :

```php
symfony console doctrine:fixtures:load
```

## Key JWT

Create a ``JWT`` folder in the ``configure`` folder

``` 
mkdir -p config/jwt
```

To create the private key, issue this command :

``` 
openssl genpkey -out config/jwt/private.pem -aes256 -algorithm rsa -pkeyopt rsa_keygen_bits:4096
```

And enter the passphrase you want "bilemo", for example

Repeat the operation but with this command to create the public key :

``` 
openssl pkey -in config/jwt/private.pem -out config/jwt/public.pem -pubout
```

Add the following to your ``.env.local`` file, following the instructions for your database :

``` 
###> lexik/jwt-authentication-bundle ###
JWT_SECRET_KEY=%kernel.project_dir%/config/jwt/private.pem
JWT_PUBLIC_KEY=%kernel.project_dir%/config/jwt/public.pem
JWT_PASSPHRASE=!ChangeMe!
###< lexik/jwt-authentication-bundle ###
```

To visualize the project in local, thanks to localhost it will be necessary to carry out this command :

``` 
symfony server:start 
```

## Documentation

You can access the API documentation at the following local address :

```
https://127.0.0.1:8000/api/docs
```

# The BileMo API is ready to be used !

***

Concerning the images of the users, they were recovered on internet to serve as example [RandomUser](https://randomuser.me/).