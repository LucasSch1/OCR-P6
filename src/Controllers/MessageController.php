<?php

namespace Controllers;

use Exception;
use Lucas\OcrP6\Config\DBManager;
use Lucas\OcrP6\Models\MessageManager;
use Lucas\OcrP6\Models\UserManager;
use Services\Utils;
use Views\View;

class MessageController
{
    public function showMessagerie(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['id'])) {
            throw new Exception("Utilisateur non connecté.");
        }
        $userId = $_SESSION['user']['id'];


        $userManager = new UserManager();
        $listUsers=$userManager->getUsersFromMessages($userId);


        $view = new View("Messagerie");
        $view->render('messageriePage',['listUsers' => $listUsers]);
    }



    public function showMessageByUserId(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
            $_SESSION['selected_user_id'] = $_POST['user_id'];
        }

        $currentUserId = $_SESSION['user']['id'] ?? null;

        $selectedUserId = $_SESSION['selected_user_id'] ?? null;


        $userId = $_SESSION['user']['id'];


        $userManager = new UserManager();
        $listUsers=$userManager->getUsersFromMessages($userId);

        $messageManager = new MessageManager();
        $messages = $messageManager->getConversation($selectedUserId, $currentUserId);


        $userManager = new UserManager();
        $selectedUserId = $userManager->getUserById($selectedUserId);

        $view = new View("Messagerie");
        $view->render('messageriePage', [
            'listUsers' => $listUsers,
            'selectedUser' => $selectedUserId,
            'messages' => $messages,
        ]);

    }

    public function sendMessage(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $db = DBManager::getConnection();

            $senderId = $_SESSION['user']['id'];
            $receiverId = $_POST['receiver_id'];
            $content = $_POST['content'];
            $datetime = date('Y-m-d H:i:s');

            $query = "INSERT INTO message (id_sender, id_receiver, content, datetime) VALUES (:sender, :receiver, :content, :datetime)";
            $stmt = $db->prepare($query);

            $stmt->execute([
                'sender' => $senderId,
                'receiver' => $receiverId,
                'content' => $content,
                'datetime' => $datetime
            ]);


            Utils::redirect("showMessageByUserId");
            exit();
        }

    }
}