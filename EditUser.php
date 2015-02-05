<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Edytuj usera</title>
         <link rel="stylesheet" href="main.css" />
    </head>
    <body>
        <?php
        require_once 'User.class.php';
        require_once 'SqlUserRepo.class.php';
        if(isset($_GET['id'])){
            $id = filter_input(INPUT_GET, 'id');
        }else{
            $id=1;
        }
        echo '<p>Wybrano usera o id: '.$id.'</p>';
        $repo = new SqlUserRepo();
         $u = $repo->GetUser($id);
         echo <<< TEXT
         <form action="wynikEditUser.php" method="post" id="edit">
            <fieldset>
                <legend>Edycja danych użytkownika</legend>
                <label class='info'>Id: </label>{$u->getId()}
                    <input type="hidden" name = "id" value="{$u->getId()}"><br>
                <label class='info'>Login: </label>
                <input type="text" name="login" id="login" value="{$u->getLogin()}"/><br>
                 <label class='info'>Imię: </label>
                <input type="text" name="imie" id="imie" value="{$u->getImie()}"/><br>
                 <label class='info'>Nazwisko: </label>
                <input type="text" name="nazwisko" id="nazwisko" value="{$u->getNazwisko()}"/><br>
                <input type="submit" value="Zapisz"/>
            </fieldset> 
        </form>
TEXT
        ?>
    </body>
</html>
