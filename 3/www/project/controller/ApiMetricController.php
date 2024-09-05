<?php

namespace Project\Controller;

use Core\Controller;
use Core\Model;
use Core\ResponseError;

class ApiMetricController extends Controller
{
    function save()
    {
        (new Model)->query("INSERT INTO metrics (city, ip) VALUES ('$_POST[city]', '$_POST[ip]');");
    }
}
