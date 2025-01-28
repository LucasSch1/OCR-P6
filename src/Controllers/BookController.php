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

    public function showLibraryBook()
    {
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();

        $view = new View('Nos livres à l\'échange');
        $view->render("libraryBook" ,['books' => $books, 'query' => '']);
    }

    public function showDetailBook(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $id = Utils::request("idBook");
        $bookManager = new BookManager();
        $book = $bookManager->getBookByIdDetail($id);

        if(isset($_SESSION['user'])){
            $connectedUserId = $_SESSION['user']['id'];
        }else{
            $connectedUserId = null;
        }

        $view = new View('Single livre');
        $view->render("detailBook", ['book' => $book,'connectedUserId' => $connectedUserId]);
    }

    public function updateBook(){
        $id = Utils::request("idBookUpdate");
        $titleUpdate = Utils::request("titlebookUpdate");
        $authorUpdate = Utils::request("authorUpdate");
        $commentaryUpdate = Utils::request("commentaryUpdate");
        $disponibilityUpdate = Utils::request("choice-disponibility");

        $bookManager = new BookManager();
        $bookManager->updateBookById($id , $titleUpdate, $authorUpdate, $commentaryUpdate, $disponibilityUpdate);

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
    public function deleteBookById(){
        $id = Utils::request("id");
        $bookManager = new BookManager();
        $bookManager->deleteBookById($id);


        Utils::redirect("privateAccountUser");
        exit();
    }


    private function normalize(mixed $query): string
    {
        if (!is_string($query) || empty($query)) {
            return '';
        }
        $normalized = strtolower($query);

        $normalized = str_replace(['&', '@', '#', '-', '_'], ' ', $normalized);

        $normalized = iconv('UTF-8', 'ASCII//TRANSLIT', $normalized);

        $normalized = preg_replace('/\s+/', ' ', $normalized);

        return trim($normalized);
    }

    public function searchBook(){
        $query = isset($_GET['query']) ? $this->normalize($_GET['query']) : '';

        if (empty($query)) {
            Utils::redirect("showLibraryBook");
            exit();
        }

        $bookManager = new BookManager();
        $books=$bookManager->searchBook($query);

        $view = new View('Nos livres à l\'échange ');
        $view->render('libraryBook', ['books' => $books, 'query' => $query]);
    }





}