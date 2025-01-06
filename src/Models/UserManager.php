<?php

namespace Lucas\OcrP6\Models;

use Lucas\OcrP6\Config\DBManager;
use Services\Utils;

class UserManager
{
    public function createUser($email, $password, $username)  {

        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

        $db = DBManager::getConnection();
        $stmt = $db->prepare("INSERT INTO user (email, password, username) VALUES (?, ?, ?)");
        $stmt->execute([$email, $passwordhash, $username]);
    }
}