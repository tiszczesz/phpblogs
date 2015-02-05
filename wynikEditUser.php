<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>aktualizacja danch</title>
          <link rel="stylesheet" href="main.css" />
    </head>
    <body>
        <?php
        require_once 'SqlUserRepo.class.php';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isOK('login') && isOK('imie') && isOK('nazwisko') && isOK('id')) {
                $imie = filter_input(INPUT_POST, 'imie', FILTER_SANITIZE_MAGIC_QUOTES);
                $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_MAGIC_QUOTES);
                $nazwisko = filter_input(INPUT_POST, 'nazwisko', FILTER_SANITIZE_MAGIC_QUOTES);
                $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_MAGIC_QUOTES);
                $u = new User($id, $login, $imie, $nazwisko);
                //var_dump($u);
                $repo = new SqlUserRepo();
                $repo->UpdateUser($u);
                echo "<p><a href='index.php'>Powrót do listy użytkowników</a></p>";
            }else{
                echo "<p>Błędne dane</p>";
                echo "<p><a href='EditUser.php?id=".$_POST['id']."'>Porót do edycji</p>";
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
