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


        if (empty($username) || empty($password) || empty($email)) {
            throw new Exception("Tous les champs sont obligatoires. 1");
        }

        $userManager = new UserManager();
        $userManager->createUser($email, $password, $username);


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

        if ($user && $password === $user->getPassword()) {
            // Connexion réussie : démarrer la session
            session_start();

            // Stocker les informations dans la session
            $_SESSION['user'] = [
                'id' => $user->getId(),
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'date_created' => $user->getDateCreated(),
                'picture' => $user->getPicture()
            ];


            $userId = $_SESSION['user']['id'];
            $books = $userManager->getBookByUserId($userId);


            // Rediriger l'utilisateur vers la page d'accueil
            Utils::redirect("home");
            exit();
        } else {
            // Gestion des erreurs d'authentification
            throw new \Exception("Email ou mot de passe incorrect.");
        }
    }

    public function disconnectUser(): void
    {
        // Démarre la session si ce n'est pas déjà fait
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Supprime toutes les variables de session
        $_SESSION = [];

        // Détruis la session
        session_destroy();

        // Redirige vers la page d'accueil
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


        if (empty($usernameUpdate) || empty($emailUpdate) || empty($passwordUpdate)) {
            throw new Exception("Tous les champs doivent être remplis.");
        }
        $userManager = new UserManager();
        $userManager->updateUser($emailUpdate, $passwordUpdate, $usernameUpdate,$userId);


        $_SESSION['user']['email'] = $emailUpdate;
        $_SESSION['user']['password'] = $passwordUpdate;
        $_SESSION['user']['username'] = $usernameUpdate;

        Utils::redirect("privateAccountUser");
        exit();


    }


}