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

    public function updateBook(){
        $id = Utils::request("idBookUpdate");
        $titleUpdate = Utils::request("titlebookUpdate");
        $authorUpdate = Utils::request("authorUpdate");
        $commentaryUpdate = Utils::request("commentaryUpdate");
        $disponibilityUpdate = Utils::request("choice-disponibility");

        $bookManager = new BookManager();
        $book = $bookManager->updateBookById($id , $titleUpdate, $authorUpdate, $commentaryUpdate, $disponibilityUpdate);

        Utils::redirect("privateAccountUser");
        exit();
    }

    public function updateBookPicture(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['book-picture'])) {
            if (!isset($_POST['bookId'])) {
                throw new Exception("Une erreur est survenue");
            }

            $bookId = Utils::request("bookId");
            $file = $_FILES['book-picture'];

            $uploadDir = '../public/assets/book-images/';

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $fileBaseName = 'cover-image-' . $bookId;
            array_map('unlink', glob($uploadDir . '/' . $fileBaseName . '.*'));

            $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);

            $fileName = $fileBaseName . '.' . $fileExtension;

            $uploadPath = $uploadDir . '/' . $fileName;

            if (!move_uploaded_file($file['tmp_name'], $uploadPath)) {
                throw new Exception("Impossible de déplacer le fichier téléchargé.");
            }

            $bookManager = new BookManager();
            $bookManager->updateBookPicture($bookId, 'public/assets/book-images/' . $fileName);

//            $_REQUEST['id'] = '/public/assets/book-images/' . $fileName;


            Utils::redirect("privateAccountUser");
            exit();
        }

        throw new Exception("Aucun fichier téléchargé.");
    }

}