<?php

namespace Lucas\OcrP6\Models;

use Exception;
use Lucas\OcrP6\Config\DBManager;
use PDO;

class BookManager
{

    public function getBookById($id): array
    {
        $db = DBManager::getConnection();

        try {
            $sql = "SELECT * FROM book WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute(['id' => $id]);
            $book = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $book ?:[];
        }
        catch (\PDOException $e) {
            error_log("Erreur lors de la récupération du livre de l'utilisateur : " . $e->getMessage());
            return [];
        }
    }

    public function getBookByIdDetail($id): ?Book
    {
        $db = DBManager::getConnection();

        try {
            $sql = "SELECT book.*, user.username AS USERNAME_VENDOR, user.picture AS USERNAME_PICTURE FROM book INNER JOIN user ON book.ID_USER = user.id WHERE book.ID = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute(['id' => $id]);
            $bookData = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($bookData) {
                // Créez une instance de Book et hydratez-la
                $book = new Book();
                $book->setIdOwner($bookData['ID_USER']);
                $book->setTitle($bookData['TITLE']);
                $book->setAuthor($bookData['AUTHOR']);
                $book->setDescription($bookData['DESCRIPTION']);
                $book->setDisponibility($bookData['DISPONIBILITY']);
                $book->setCover($bookData['COVER']);
                $book->setUsername_owner($bookData['USERNAME_VENDOR']);
                $book->setUsername_picture($bookData['USERNAME_PICTURE']);
                return $book;
            }

            return null;

        }
        catch (\PDOException $e) {
            error_log("Erreur lors de la récupération du livre : " . $e->getMessage());
            return [];
        }
    }

    public function updateBookById($id , $titleUpdate, $authorUpdate, $commentaryUpdate, $disponibilityUpdate){
        $db = DBManager::getConnection();

        try {
            $stmt = $db->prepare("UPDATE book SET title = :title , author = :author, description = :description , disponibility = :disponibility WHERE id = :id");
            $stmt->execute(['title' => $titleUpdate, 'author' => $authorUpdate, 'description' => $commentaryUpdate , 'disponibility' => $disponibilityUpdate , 'id' => $id]);
        }
        catch (\PDOException $e) {
            error_log("Une erreur lors de la mise a jour du livre est survenue : " . $e->getMessage());
        }

    }

    public function updateBookPicture($bookId, $picturePath): void
    {
        // Connexion à la base de données
        $db = DBManager::getConnection();

        // Préparation de la requête SQL
        $query = "UPDATE book SET cover = :cover WHERE id = :id";
        $stmt = $db->prepare($query);

        // Exécution de la requête avec les paramètres
        $stmt->bindParam(':cover', $picturePath, PDO::PARAM_STR);
        $stmt->bindParam(':id', $bookId, PDO::PARAM_INT);

        if (!$stmt->execute()) {
            throw new Exception("Impossible de mettre à jour l'image de couverture du livre dans la base de données.");
        }
    }

    public function deleteBookById($id){
        $db = DBManager::getConnection();

        try {
            $stmt = $db->prepare("DELETE FROM book WHERE id = :id");
            $stmt->execute(['id' => $id]);
        }
        catch (\PDOException $e) {
            error_log("Une erreur lors de la suppression du livre est survenue : " . $e->getMessage());
        }

    }

    public function getAllBooks(){
        $db = DBManager::getConnection();

        try {
            $sql = "SELECT book.*, user.username AS USERNAME_VENDOR FROM book INNER JOIN user ON book.ID_USER = user.id;";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $books ?:[];
        }
        catch (\PDOException $e) {
            error_log("Erreur lors de la récupération du livre de l'utilisateur : " . $e->getMessage());
            return [];
        }

    }

    public function getLastFourBooks(){
        $db = DBManager::getConnection();

        try {
            $sql = "SELECT book.*, user.username AS USERNAME_VENDOR FROM book INNER JOIN user ON book.ID_USER = user.id ORDER BY book.id DESC LIMIT 4;";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $lastbooks = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $lastbooks ?:[];
        }
        catch (\PDOException $e) {
            error_log("Erreur lors de la récupération du livre de l'utilisateur : " . $e->getMessage());
            return [];
        }

    }

    public function searchBook($query)
    {
        $db = DBManager::getConnection();


        try {
            $sql = "SELECT * FROM book WHERE book.title LIKE :query;";
            $stmt = $db->prepare($sql);
            $stmt->execute(['query' => "%$query%"]);
            $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $books ?:[];

        }
        catch (\PDOException $e) {
            error_log("Erreur lors de la récupération du livre : " . $e->getMessage());
            return [];
        }
    }



}