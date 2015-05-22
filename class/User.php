<?php

class User {
    private $id = 0;
    private $title;
    private $firstname;
    private $surname;
    private $email;
    private $password;
    private $status = 1;

    public function arrayToObject($data) {
        
        $this->setTitle($data['title']);
        $this->setFirstname($data['firstname']);
        $this->setSurname($data['surname']);
        $this->setEmail($data['email']);
        $this->setPassword($data['password']);
        
    }
    
    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getSurname() {
        return $this->surname;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getStatus() {
        return $this->status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setSurname($surname) {
        $this->surname = $surname;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = hash('sha256', $password);
    }

    function setStatus($status) {
        $this->status = $status;
    }


}


