<?php

require_once 'IUserRepo.class.php';

class SqlUserRepo implements IUserRepo {

    private function getConnection() {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=blogi4ti", 'bloger', 'bloger');
            $conn->query('set names utf8');
        } catch (PDOException $ex) {
            echo 'Connection ERRROR: ' . $ex->getMessage();
        }
        return $conn;
    }

    public function AddUser(User $u) {
        $conn = $this->getConnection();
        $sql = "insert into users(login, imie, nazwisko) values ('{$u->getLogin()}', '{$u->getImie()}', '{$u->getNazwisko()}')";
        $stm = $conn->prepare($sql);
         $stm->execute();
         echo $stm->rowCount() . " ilość dodanych  rekordów";
         $conn = null;
       // var_dump($wynik);
    }

    public function DeleteUser(User $u) {
        $conn = $this->getConnection();
        $sql = "Delete from users where id='{$u->getId()}'";
        $stm = $conn->prepare($sql);
        $stm->execute();
         $conn = null;
    }

    private function UserToObject(array $sqluser) {
        return new User($sqluser['id'], $sqluser['login'], $sqluser['imie'],
                       $sqluser['nazwisko']);
    }

    public function &GetAllUsers() {
        $conn = self::getConnection();
        $sqlquery = "SELECT * FROM users";
        $wynik = $conn->query($sqlquery)->fetchAll();
        $users = [];
        foreach ($wynik as $user) {
            $users[] = self::UserToObject($user);
        }
        $conn = null;
        return $users;
    }

    public function GetUser($id) {
        $conn = self::getConnection();
        //pobierze z bazy 1 usera i opakuje gpo w obiekt User
        $sql = "select * from users where id = " . $id;
        $wynik = $conn->query($sql)->fetch();
        return self::UserToObject($wynik);
        $conn = null;
    }

    public function UpdateUser(User $u) {
        $conn = self::getConnection();
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 
           "UPDATE users SET login =:login , imie= :imie, nazwisko=:nazwisko where id={$u->getId()}";

           
           
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':login', $u->getLogin());
            $stmt->bindParam(':imie', $u->getImie());
            $stmt->bindParam(':nazwisko', $u->getNazwisko());
//            echo '<pre>';
//            var_dump($stmt);
//            echo '</pre>';
            $stmt->execute();
            echo $stmt->rowCount() . " ilość zaktualizowanych rekordów";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }

}
