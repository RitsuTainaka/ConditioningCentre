<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/24/2018
 * Time: 2:47 PM
 */

include_once ('include/core.php');

$username = $_POST['username'];
$password = $_POST['password'];
$accesslevel = $_POST['accountlevel'];

if(isset($_POST['submit']))
{
    $encryptedMessage = md5($password . SECRETHASH);
    $sql = "INSERT INTO CoachLoginAccount (username, password, accesslevel) VALUES ('$username', '$encryptedMessage', '$accesslevel')";

    $db = new db();
    $result = $db::query($sql);

    if ($result) {
        popup("Successfully Added", "admin.php");
    } else {
        popup("error", "admin.php");
    }
}