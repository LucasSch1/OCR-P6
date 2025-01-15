<?php

namespace Controllers;


use Lucas\OcrP6\Models\BookManager;
use Views\View;

require_once __DIR__ . '/../Config/config.php';

class HomeController
{
    public function showHome()
    {
        $bookManager = new BookManager();
        $lastbooks = $bookManager->getLastFourBooks();

        $view = new View("Accueil");
        $view->render("home",['lastbooks' => $lastbooks]);
    }
}