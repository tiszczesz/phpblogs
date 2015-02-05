<?php
// CRUD  Create Read Update Delete
require_once 'User.class.php';
interface IUserRepo {
    function GetUser($id);
    function GetAllUsers();
    function AddUser(User $u);
    function DeleteUser( User $u);
    function UpdateUser( User $u);
}
