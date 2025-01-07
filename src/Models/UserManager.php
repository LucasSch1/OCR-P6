<?php

namespace Lucas\OcrP6\Models;

use Lucas\OcrP6\Config\DBManager;
use PDO;
use Services\Utils;

class UserManager
{
    public function createUser($email, $password, $username)  {


        $db = DBManager::getConnection();
        $stmt = $db->prepare("INSERT INTO user (email, password, username) VALUES (?, ?, ?)");
        $stmt->execute([$email, $password, $username]);
    }


    public function getUserByEmail(string $email): ?User
    {
        $db = DBManager::getConnection();

        try {
            $sql = "SELECT * FROM user WHERE email = :email";
            $stmt = $db->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                return new User($user); // Assurez-vous que le constructeur de User fonctionne avec un tableau
            }
        } catch (\PDOException $e) {
            error_log("Erreur lors de la récupération de l'utilisateur : " . $e->getMessage());
        }

        return null;
    }
}