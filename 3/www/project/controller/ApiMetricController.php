<?php

namespace Project\Controller;

use Core\Controller;
use Core\Model;

class ApiMetricController extends Controller
{
    function save()
    {
        $_POST = json_decode(file_get_contents('php://input'), true);

        $metric = (new Model)->query("INSERT INTO metrics (city, ip, os) VALUES ('$_POST[city]', '$_POST[ip]', '$_POST[os]');");

        return $metric;
    }
}
