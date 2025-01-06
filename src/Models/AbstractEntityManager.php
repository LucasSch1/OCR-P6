<?php

namespace Lucas\OcrP6\Models;

use Lucas\OcrP6\Config\DBManager;

/**
 * Classe abstraite qui représente un manager. Elle récupère automatiquement le gestionnaire de base de données.
 */
abstract class AbstractEntityManager {

    protected $db;

    /**
     * Constructeur de la classe.
     * Il récupère automatiquement l'instance de DBManager.
     */
    public function __construct()
    {
        $this->db = DBManager::getInstance();
    }
}