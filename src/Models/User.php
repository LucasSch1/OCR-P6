<?php
/**
 * Entité User : un user est défini par son id, un username et un password et son email.
 */
namespace Lucas\OcrP6\Models;

class User extends AbstractEntity
{
    private string $username;
    private string $email;
    private $password;
    private $picture;

    public function setUsername($username) : void{
        $this->username = $username;
    }

    public function getUsername() : string {
        return $this->username;
    }

    public function setEmail($email) : void {
        $this->email = $email;
    }

    public function getEmail() : string {
        return $this->email;
    }

    public function setPassword($password) : void {
        $this->password = $password;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPicture($picture) : void {
        $this->picture = $picture;
    }

    public function getPicture() : string {
        return $this->picture;
    }

    public function setId(int $id) : void{
        $this->id = $id;
    }


}