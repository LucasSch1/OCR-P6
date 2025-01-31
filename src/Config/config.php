<?php
namespace Config;

define('DB_HOST', '0.0.0.0'); // Modifier l'adresse ip
define('DB_NAME', 'dbname'); // Modifier le nom de la base de données
define('DB_USER', 'user'); // Modifier le nom d'utilisateur
define('DB_PASS', 'dbpass'); // Modifier le mot de passe
define('BASE_URL', '/OCR-P6/public/');
define('TEMPLATE_VIEW_PATH', dirname(__DIR__) . '/views/templates/'); // Le chemin vers les templates de vues.
define('MAIN_VIEW_PATH', TEMPLATE_VIEW_PATH . 'main.php'); // Le chemin vers le template principal.