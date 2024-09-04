<?php

namespace Database\Migrations;

use Core\Model;


class MetricsTable
{
  public function __construct()
  {
    (new Model)->query("CREATE TABLE `metrics` (`id` INT NOT NULL AUTO_INCREMENT , `ip` VARCHAR(30) NOT NULL , `city` VARCHAR(100) NOT NULL , `os` VARCHAR(30) NOT NULL , `datetime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
  }
}
