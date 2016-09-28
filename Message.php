<?php

class Message {
    private $user;
    private $text;
    private $date; 
    
    function __construct() {
        
    }
    
    function getUser() {
        return $this->user;
    }

    function getText() {
        return $this->text;
    }

    function getDate() {
        return $this->date;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setText($text) {
        $this->text = $text;
    }

    function setDate($date) {
        $this->date = $date;
    }


}
