<?php

namespace Controllers;


require_once __DIR__ . '/../Config/config.php';

class HomeController
{
    public function showHome()
    {
        require_once TEMPLATE_VIEW_PATH . 'home.php';
    }
}