# CODE CHALLENGE


## Introduction

This project is a form of accepting a challange from Odeo Tech to make a REST API to send an email.


## Requirements

 * Composer (https://getcomposer.org)
 * PHP (https://www.php.net)
 * Docker (https://docs.docker.com)


## Installation
  * Run composer install:
    ```composer
    composer install
    ```
 * Run docker-compose using this command:
    ```docker
    docker-compose up -d
    ```
 * Run migration:
    ```php
    php bin/console migrate
    ```

 * Create new user:
    ```php
    php bin/console create:user <your_email> <your_name> <your_password>
    ```

 * Serving Application:
     ```php
    php -S localhost:8000 -t .
    ```

## Api's

This is a list of api's:
 * **Login**
      ```php
    http://localhost:8000/auth/login/ (POST)
    ```
    request body:
      ```json
      {
          "email": "admin@gmail.com",
          "password": "secret123"
      }
    ```
    response:
      ```json
      {
          "token": "r4nd0m111",
      }
    ```
    using token to set header type Authorization.
  
  <br />

  * **Send Mail**
    ```php
    http://localhost:8000/mail/send/ (POST)
    ```
    request header:
      ```json
    {
        "Authorization": "application/json",
        "Accept": "application/json",
        "Authorization": "r4nd0m111"
    }
    ```
    request body:
      ```json
      {
          "title": "Hi There",
          "body": "Welcome to the jungle Baby !!!- Axl Rose"
      }
    ```

    response:  
      ```json
      {
          "message": "success send mail to: andre@gmail.com"
      }
    ```
