<?php

/**
 * Entité représentant un message
 * Avec les champs id, id_recevoir, id_envoyer,content, datetime
 */
namespace Lucas\OcrP6\Models;

class Message
{

    private $id;

    private $id_receiver;
    private $id_sender;
    private $content;

    private $datetime;



    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getIdReceiver(){
        return $this->id_receiver;
    }
    public function setIdReceiver($id_receiver){
        $this->id_receiver = $id_receiver;
    }
    public function getIdSender(){
        return $this->id_sender;
    }
    public function setIdSender($id_sender){
        $this->id_sender = $id_sender;
    }
    public function getContent(){
        return $this->content;
    }
    public function setContent($content){
        $this->content = $content;
    }

    public function getDatetime(){
        return $this->datetime;
    }

    public function setDatetime($datetime){
        $this->datetime = $datetime;
    }
}