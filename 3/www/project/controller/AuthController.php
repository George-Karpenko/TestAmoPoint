<?php

namespace Project\Controller;

use Core\Controller;
use Core\Model;

class AuthController extends Controller
{
    protected $layout = 'auth';

    function login()
    {
        $this->title = 'Авторизация';
        return $this->render('login', []);
    }

    function auth()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (!empty($_POST['password']) && !empty($_POST['email'])) {

            $user = (new Model)->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
            if (!empty($user)) {
                $_SESSION['auth'] = true;

                redirect('/');
            }
        }
        return $this->render('login', ['email' => $email, 'password' => $password, 'error' => 'Пользователь не найден']);
    }
}
