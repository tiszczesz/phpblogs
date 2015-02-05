<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Operacje na użytkownikach</title>
        <link rel="stylesheet" href="main.css" />
    </head>
    <body>
        <?php
        require_once 'SqlUserRepo.class.php';
        require_once 'UserToHtml.class.php';
        $userRepo = new SqlUserRepo();      
        
        echo UserToHtml::AllUsersToHtmlTab( $userRepo->GetAllUsers());
        
        ?>
        <div class="dodaj"><a href="addNewUser.html">Dodaj nowego użytkownika</a></div>
    </body>
</html>
