<?php

namespace Project\Controller;

use Core\Controller;
use Core\Model;
use Core\ResponseError;

class ApiMetricController extends Controller
{
    function save()
    {
        $_POST = json_decode(file_get_contents('php://input'), true);
        (new Model)->query("INSERT INTO metrics (city, ip, os) VALUES ('$_POST[city]', '$_POST[ip]', '$_POST[os]');");
    }
}
