<?php

class UserToHtml {

    public static function UserInfo(User $u) {
        $html = "";


        return $html;
    }

    public static function AllUsersToHtmlTab(array $users) {
        $html = "<table class='users'>";
        $html .= "<tr><th>Lp</th><th>login</th><th>imie</th><th>nazwisko</th><th></th></tr>\n";
        $i = 0;
        foreach ($users as $user) {
            $i++;
            $html .= "<tr><td>{$i}</td>\n"
                    . "<td><a href='EditUser.php?id="
                    . $user->getId()
                    . "'>{$user->getLogin()}</a></td>\n"
                    . "<td>{$user->getImie()}</td>\n"
                    . "<td>{$user->getNazwisko()}</td>"
                    . "<td><a href='DeleteUser.php?id="
                    . $user->getId()
                    . "'>Usuń użytkownika</a></td></tr>";
        }
        return $html . "</table>";
    }

}
