<?php
/**
 * Entité Book : un book est défini par son id , l'id du propriétaire , son titre, sa description, sa disponibilité et sa couverture
 */

namespace Lucas\OcrP6\Models;

class Book extends AbstractEntity
{

    private $title;

    private $author;

    private $description;

    private $disponibility;

    private $cover;

    public function setTitle($title){
        $this->title = $title;
    }
    public function getTitle(){
        return $this->title;
    }
    public function setAuthor($author){
        $this->author = $author;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function setDescription($description){
        $this->description = $description;

    }
    public function getDescription(){
        return $this->description;
    }
    public function setDisponibility($disponibility){
        $this->disponibility = $disponibility;
    }
    public function getDisponibility(){
        return $this->disponibility;
    }
    public function setCover($cover){
        $this->cover = $cover;
    }
    public function getCover(){
        return $this->cover;
    }



}