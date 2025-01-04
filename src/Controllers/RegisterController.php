<?php

namespace Controllers;

use Views\View;

class RegisterController
{
    public function showRegistration()
    {
        $view = new View("Inscription");
        $view->render("registerForm");
    }
}