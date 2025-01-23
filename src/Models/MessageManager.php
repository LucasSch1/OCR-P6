<?php

namespace Lucas\OcrP6\Models;

use Lucas\OcrP6\Config\DBManager;
use PDO;

class MessageManager
{

    public function getConversation($currentUserId, $otherUserId) {
        $db = DBManager::getConnection();

        $query = "
        SELECT 
            id_sender,
            id_receiver,
            content,                             
            datetime                             
        FROM message
        WHERE 
            (id_sender = :currentUserId AND id_receiver = :otherUserId) 
            OR 
            (id_sender = :otherUserId AND id_receiver = :currentUserId)
        ORDER BY datetime ASC
    ";

        $stmt = $db->prepare($query);
        $stmt->execute([
            'currentUserId' => $currentUserId,
            'otherUserId' => $otherUserId
        ]);

        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($message) {
            return [
                'sender_id' => $message['id_sender'],
                'receiver_id' => $message['id_receiver'],
                'content' => $message['content'],
                'date' => date('d.m', strtotime($message['datetime'])),
                'time' => date('H:i', strtotime($message['datetime']))
            ];
        }, $messages);
    }


    function getUnreadMessagesCount($userId) {
        $db = DBManager::getConnection();
        $sql = "SELECT COUNT(*) AS unread_count 
            FROM message 
            WHERE id_receiver = :user_id AND is_read = 0";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $unreadCount=$result['unread_count'] ?? 0;

        return $unreadCount;

    }

}