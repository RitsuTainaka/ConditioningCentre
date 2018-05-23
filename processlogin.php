<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/21/2018
 * Time: 6:16 PM
 */

include_once ('include/core.php');

$db = new db();
if(isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($db::$mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($db::$mysqli, $_POST['password']);
    $login = user::login($username, $password);

    if($login)
    {
        popup("Login Successful","index.php");
    }
    else
    {
        popup("Invalid Username or Password","index.php");
    }
}