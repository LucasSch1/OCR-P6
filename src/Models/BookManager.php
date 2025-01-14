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

}