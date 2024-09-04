<?php

namespace Core;

use mysqli;

class Model
{
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public function query($sql)
    {
        return $this->mysqli->query($sql);
    }
}
