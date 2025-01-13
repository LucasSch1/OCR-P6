<?php

namespace Controllers;

use Exception;
use Lucas\OcrP6\Models\UserManager;
use Services\Utils;
use Views\View;

class AdminController
{
    public function showLogin()
    {
        $view = new View("Connexion");
        $view->render("connectionForm");
    }

    public function showRegistration()
    {
        $view = new View("Inscription");
        $view->render("registerForm");
    }

    public function showPrivateAccount()
    {
        $view = new View("Mon Compte");
        $view->render("privateAccount");
    }


    public function createUser(){

        $username = Utils::request("username");;
        $email = Utils::request("email");;
        $password = Utils::request("password");

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);


        if (empty($username) || empty($password) || empty($email)) {
            throw new Exception("Tous les champs sont obligatoires. 1");
        }

        $userManager = new UserManager();
        $userManager->createUser($email, $passwordHash, $username);


        Utils::redirect("home");
    }

    public function connectUser() {
        $email = Utils::request("email");
        $password = Utils::request("password");

        if (empty($email) || empty($password)) {
            throw new \Exception("Tous les champs sont obligatoires.");
        }

        $userManager = new UserManager();
        $user = $userManager->getUserByEmail($email);

        if ($user && password_verify($password, $user->getPassword())) {
            session_start();


            $_SESSION['user'] = [
                'id' => $user->getId(),
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'date_created' => $user->getDateCreated(),
                'picture' => $user->getPicture()
            ];


            $userId = $_SESSION['user']['id'];
            $books = $userManager->getBookByUserId($userId);



            Utils::redirect("home");
            exit();
        } else {

            throw new \Exception("Email ou mot de passe incorrect.");
        }
    }

    public function disconnectUser(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = [];

        session_destroy();

        Utils::redirect("home");
        exit();
    }

    public function updateUser(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $userId = $_SESSION['user']['id'];
        $usernameUpdate = Utils::request("usernameUpdate");
        $emailUpdate = Utils::request("emailUpdate");
        $passwordUpdate = Utils::request("passwordUpdate");

        $passwordHash = password_hash($passwordUpdate, PASSWORD_DEFAULT);


        if (empty($usernameUpdate) || empty($emailUpdate) || empty($passwordUpdate)) {
            throw new Exception("Tous les champs doivent être remplis.");
        }
        $userManager = new UserManager();
        $userManager->updateUser($emailUpdate, $passwordHash, $usernameUpdate,$userId);


        $_SESSION['user']['email'] = $emailUpdate;
        $_SESSION['user']['username'] = $usernameUpdate;

        Utils::redirect("privateAccountUser");
        exit();


    }

    public function updateUserPicture(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile-picture'])) {
            // Vérifie si l'utilisateur est connecté
            if (!isset($_SESSION['user']['id'])) {
                throw new Exception("Vous devez être connecté pour effectuer cette action.");
            }

            $userId = $_SESSION['user']['id'];
            $file = $_FILES['profile-picture'];

            // Vérifie si le fichier est valide
            if ($file['error'] !== UPLOAD_ERR_OK) {
                throw new Exception("Erreur lors du téléchargement de l'image.");
            }

            // Détermine le dossier de destination dans public/assets/profile-images
            $uploadDir = __DIR__ . '../public/assets/profile-images/' . $userId;

            // Crée le dossier si nécessaire
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            // Génère un nom de fichier unique
            $fileName = uniqid() . '-' . basename($file['name']);
            $uploadPath = $uploadDir . '/' . $fileName;

            // Déplace le fichier téléchargé
            if (!move_uploaded_file($file['tmp_name'], $uploadPath)) {
                throw new Exception("Impossible de déplacer le fichier téléchargé.");
            }

            $userManager = new UserManager();
            $userManager->updateUserPicture($userId, 'assets/profile-images/' . $userId . '/' . $fileName);

            // Met à jour la session utilisateur
            $_SESSION['user']['picture'] = 'assets/profile-images/' . $userId . '/' . $fileName;

            // Redirige vers la page de profil
            Utils::redirect("privateAccountUser");
            exit();
        }

        throw new Exception("Aucun fichier téléchargé.");
    }


}