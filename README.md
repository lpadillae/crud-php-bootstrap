PHP CRUD + Bootstrap!
===================

> Basic PHP CRUD with Boostrap

**Create database**

    CREATE DATABASE php_crud CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

**Create table**
    
    CREATE TABLE  `products` (
    `id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `name` VARCHAR( 100 ) NOT NULL ,
    `description` VARCHAR( 200 ) NOT NULL ,
    `price` DOUBLE NOT NULL
    );

**Change credentials in lib/db-settings.php**

**Boot up local server**

    php -S localhost:8000