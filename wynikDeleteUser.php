<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         require_once 'SqlUserRepo.class.php';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isOK('id') ) {
                
                $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_MAGIC_QUOTES);
                $u = new User($id, 'login', 'imie', 'nazwisko');
               // var_dump($u);
                $repo = new SqlUserRepo();
                $repo->DeleteUser($u);
                echo "<p> Użytkownik został usunięty z bazy danych!!</p>";
                echo "<p><a href='index.php'>Powrót do listy użytkowników</a></p>";
            }else{
                echo "<p>Błędne dane</p>";
               "<p><a href='index.php'>Powrót do listy użytkowników</a></p>";
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
