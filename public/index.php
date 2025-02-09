<?php
// Chargement des fichiers nécessaires
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../vendor/autoload.php';
// Inclure la configuration
require_once __DIR__ . '/../src/config/config.php';

use Controllers\AdminController;
use Controllers\BookController;
use Controllers\HomeController;
use Controllers\MessageController;
use Services\Utils;
use Views\View;


// On récupère l'action demandée par l'utilisateur.
// Si aucune action n'est demandée, on affiche la page d'accueil.
$action = Utils::request('action', 'home');
// Try catch global pour gérer les erreurs
try {
    // Pour chaque action, on appelle le bon contrôleur et la bonne méthode.
    switch ($action) {
        // Pages accessibles à tous.
        case 'home':
            $homeController = new HomeController();
            $homeController->showHome();
            break;


        case 'showLibraryBook':
            $bookController = new BookController();
            $bookController->showLibraryBook();
            break;

        case 'showDetailBook':
            $bookController = new BookController();
            $bookController->showDetailBook();
            break;


        case 'showPublicProfile':
            $adminController = new AdminController();
            $adminController->showPublicProfile();
            break;


        case 'searchBook':
            $bookController = new BookController();
            $bookController->searchBook();
            break;

        case 'showSearchResults':
            $bookController = new BookController();
            $bookController->showSearchResults();
            break;





        //Pages accessibles pour les personnes connectées

        case 'updateUser':
            $adminController = new AdminController();
            $adminController->updateUser();
            break;

        case 'updateUserPicture':
            $adminController = new AdminController();
            $adminController->updateUserPicture();
            break;

        case 'privateAccountUser':
            $adminController = new AdminController();
            $adminController->showPrivateAccount();
            break;


        case 'showUpdateBook':
            $bookController = new BookController();
            $bookController->showUpdateBook();
            break;

        case 'updateBook':
            $bookController = new BookController();
            $bookController->updateBook();
            break;

        case 'updateBookPicture':
            $bookController = new BookController();
            $bookController->updateBookPicture();
            break;


        case 'deleteBookById':
            $bookController = new BookController();
            $bookController->deleteBookById();
            break;


        case 'showMessagerie':
            $messageController = new MessageController();
            $messageController->showMessagerie();
            break;

        case 'showMessageByUserId':
            $messageController = new MessageController();
            $messageController->showMessageByUserId();
            break;

        case 'sendMessage':
            $messageController = new MessageController();
            $messageController->sendMessage();
            break;











        // connexion et inscription

        case 'connectionForm':
            $adminController = new AdminController();
            $adminController->showLogin();
            break;

        case 'registerForm':
            $adminController = new AdminController();
            $adminController->showRegistration();
            break;

        case 'createUser':
            $adminController = new AdminController();
            $adminController->createUser();
            break;

        case 'connectUser':
            $adminController = new AdminController();
            $adminController->connectUser();
            break;

        case 'disconnectUser':
            $adminController = new AdminController();
            $adminController->disconnectUser();
            break;

        default:
            throw new Exception("Action non reconnue : $action");
    }
} catch (Exception $e) {
    // En cas d'erreur, on affiche la page d'erreur.
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}
