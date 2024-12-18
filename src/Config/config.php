<?php
namespace Config;

define('DB_HOST', 'localhost');
define('DB_NAME', 'ocr-p6');
define('DB_USER', 'root');
define('DB_PASS', '');
define('BASE_URL', '/OCR-P6/OCR-P6/public/');
define('TEMPLATE_VIEW_PATH', dirname(__DIR__) . '/views/templates/'); // Le chemin vers les templates de vues.
define('MAIN_VIEW_PATH', TEMPLATE_VIEW_PATH . 'main.php'); // Le chemin vers le template principal.