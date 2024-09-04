<?php

namespace Database\seeders;

use Core\Model;

class UsersTable
{
  public function __construct()
  {
    (new Model)->query("INSERT INTO users (email, password) VALUES ('admin@admin.ru', 'admin');");
  }
}
