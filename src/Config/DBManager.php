<?php
namespace Lucas\OcrP6\Config;
use PDO;
use PDOException;

require_once 'config.php'; // Inclure la configuration

class DBManager {
    private static $connection = null;
    private static $instance;

    public static function getConnection() {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO(
                    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
                    DB_USER,
                    DB_PASS
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }
        return self::$connection;
    }

    /**
     * Méthode qui permet de récupérer l'instance de la classe DBManager.
     * @return DBManager
     */
    public static function getInstance() : DBManager
    {
        if (!self::$instance) {
            self::$instance = new DBManager();
        }
        return self::$instance;
    }
}
