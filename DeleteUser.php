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
        echo '<p>Wybrano do usunięcia usera o id: '.$id.'</p>';
        $repo = new SqlUserRepo();
         $u = $repo->GetUser($id);
         echo <<< TEXT
         <form action="wynikDeleteUser.php" method="post" id="edit">
            <fieldset>
                <legend>Usuwanie użytkownika</legend>
                <label class='info' >Id: </label>{$u->getId()}
                    <input type="hidden" name = "id" value="{$u->getId()}"><br>
                <label class='info'>Login: </label>
                <label>{$u->getLogin()}</label><br>
                 <label class='info'>Imię: </label>
               <label>{$u->getImie()}</label><br><br>
                 <label class='info'>Nazwisko: </label>
                <label>{$u->getNazwisko()}</label><br><br>
                <input type="submit" value="Usuń"/>
            </fieldset> 
        </form>
TEXT
        ?>
    </body>
</html>
