<?php

class User {
    private $firstName;
    private $lastName;
    private $username;
    
    
    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }
    function getUsername() {
        return $this->username;
    }

    function setUsername($username) {
        $this->username = $username;
    }



}
