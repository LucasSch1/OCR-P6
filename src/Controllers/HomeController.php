<?php

namespace Controllers;


use Views\View;

require_once __DIR__ . '/../Config/config.php';

class HomeController
{
    public function showHome()
    {
        $view = new View("Accueil");
        $view->render("home");
    }
}