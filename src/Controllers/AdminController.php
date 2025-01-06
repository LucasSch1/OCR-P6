<?php

namespace Controllers;

use Exception;
use Lucas\OcrP6\Models\UserManager;
use Services\Utils;
use Views\View;

class AdminController
{
    public function showLogin()
    {
        $view = new View("Connexion");
        $view->render("connectionForm");
    }

    public function showRegistration()
    {
        $view = new View("Inscription");
        $view->render("registerForm");
    }

    public function createUser1(){

        $username = Utils::request("username");;
        $email = Utils::request("email");;
        $password = Utils::request("password");


        if (empty($username) || empty($password) || empty($email)) {
            throw new Exception("Tous les champs sont obligatoires. 1");
        }

        $userManager = new UserManager();
        $userManager->createUser($email, $password, $username);


        Utils::redirect("home");
    }

}