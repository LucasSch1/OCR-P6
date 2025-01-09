<?php

namespace Lucas\OcrP6\Models;

use DateTime;
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


    public function getBookByUserId(int $userId): array{
        $db = DBManager::getConnection();

        try {
            $sql = "SELECT * FROM book WHERE id_user = :user_id";
            $stmt = $db->prepare($sql);
            $stmt->execute(['user_id' => $userId]);
            $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $books ?:[];
        }
        catch (\PDOException $e) {
            error_log("Erreur lors de la récupération des livres de l'utilisateur : " . $e->getMessage());
            return [];
        }

    }

    public function countBooksByUserId(int $userId): int{
        $db = DBManager::getConnection();
        try {
            $sql = "SELECT COUNT(*) AS total_books FROM book WHERE id_user = :user_id";
            $stmt = $db->prepare($sql);
            $stmt->execute(['user_id' => $userId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return (int) $result['total_books'];
        }
        catch (\PDOException $e) {
            error_log("Erreur lors de la récupération des livres de l'utilisateur : " . $e->getMessage());
            return 0;
        }


    }

    public function getMembershipDuration(string $registrationDate): string {
        // Convertir la date d'inscription en objet DateTime
        try {
            $registrationDateTime = new DateTime($registrationDate);
        } catch (\DateMalformedStringException $e) {

        }
        $currentDateTime = new DateTime(); // Date actuelle

        // Calculer la différence
        $interval = $registrationDateTime->diff($currentDateTime);

        // Construire une chaîne de durée
        if ($interval->y > 0) {
            return "Membre depuis " . $interval->y . " an" . ($interval->y > 1 ? "s" : "");
        } elseif ($interval->m > 0) {
            return "Membre depuis " . $interval->m . " mois";
        } elseif ($interval->d > 0) {
            return "Membre depuis " . $interval->d . " jour" . ($interval->d > 1 ? "s" : "");
        } else {
            return "Membre depuis aujourd'hui";
        }
    }


    public function getUserRegistrationDate(int $userId): ?string {
        $db = DBManager::getConnection(); // Connexion à la base de données
        $stmt = $db->prepare("SELECT DATE(date_creation) AS registration_date FROM user WHERE id = :id");
        $stmt->execute(['id' => $userId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['registration_date'] ?? null; // Retourne la date ou null si introuvable
    }

    public function updateUser($emailUpdate, $passwordUpdate, $usernameUpdate ,$userId){
        $db = DBManager::getConnection();
        $stmt = $db->prepare("UPDATE user SET email = :email , password = :password, username = :username WHERE id = :id");
        $stmt->execute(['email' => $emailUpdate, 'password' => $passwordUpdate, 'username' => $usernameUpdate , 'id' => $userId]);
    }
}