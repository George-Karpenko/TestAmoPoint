<?php

namespace Database\Migrations;

use Core\Model;

class UsersTable
{
  public function __construct()
  {
    (new Model)->query("CREATE TABLE `users` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `email` VARCHAR(30) NOT NULL , 
    `password` VARCHAR(20) NOT NULL , 
    PRIMARY KEY (`id`))");
  }
}
