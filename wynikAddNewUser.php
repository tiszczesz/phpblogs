<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         require_once 'SqlUserRepo.class.php';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isOK('imie') && isOK('nazwisko') && isOK('login')) {
                $imie = filter_input(INPUT_POST, 'imie', FILTER_SANITIZE_MAGIC_QUOTES);
                $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_MAGIC_QUOTES);
                $nazwisko = filter_input(INPUT_POST, 'nazwisko', FILTER_SANITIZE_MAGIC_QUOTES);
               
                $u = new User(-1, $login, $imie, $nazwisko);
               // var_dump($u);
                $repo = new SqlUserRepo();
                $repo->AddUser($u);
                echo "<p><a href='index.php'>Powrót do listy użytkowników</a></p>";
            }else{
                echo "<p>Błędne dane</p>";
                //TODO
                echo "<p><a href='addNewUser.html'>Porót do tworzenia użytkownika</p>";
            }
        }else{
            echo 'to nie post';
        }

        function isOK($nazwa) {
            return isset($_POST[$nazwa]) && trim($_POST[$nazwa]) !== "";
        }
        ?>
    </body>
</html>
