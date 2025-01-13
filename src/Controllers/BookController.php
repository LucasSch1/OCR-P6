<?php

namespace Controllers;

use Exception;
use Lucas\OcrP6\Models\Book;
use Lucas\OcrP6\Models\BookManager;
use Services\Utils;
use Views\View;

class BookController
{
    public function showUpdateBook(){

        $id = Utils::request("id", -1);

        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);

        if (!$book) {
            throw new Exception("Le livre demandé n'existe pas.");
        }

        $view = new View('Modifier les informations');
        $view->render("updatePageBook", ['book' => $book]);
    }

}