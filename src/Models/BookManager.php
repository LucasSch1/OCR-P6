<?php

namespace Lucas\OcrP6\Models;

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

}