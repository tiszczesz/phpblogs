<?php

class User {
    private $id;
    private $login;
    private $imie;
    private $nazwisko;
    
    function __construct($id, $login, $imie, $nazwisko) {
        $this->id = $id;
        $this->login = $login;
        $this->imie = $imie;
        $this->nazwisko = $nazwisko;
    }
    function getId() {
        return $this->id;
    }

    function getLogin() {
        return $this->login;
    }

    function getImie() {
        return $this->imie;
    }

    function getNazwisko() {
        return $this->nazwisko;
    }



}
