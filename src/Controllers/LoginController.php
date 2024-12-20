<?php

namespace Controllers;

use Views\View;

class LoginController
{
    public function showLogin()
    {
        $view = new View("Connexion");
        $view->render("connectionForm");
    }
}