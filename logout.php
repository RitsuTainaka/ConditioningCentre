<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/23/2018
 * Time: 12:37 AM
 */
session_start();
includeFile("config.php");
$db = new db();

if(!empty($_POST["logout"])) {
    //echo 'logout';
    $updatesql = "UPDATE CoachLoginAccount SET sessionid = NULL WHERE username='" . $_SESSION["login_user"] . "'";

    $result = db::query($updatesql) or
    die(mysqli_connect_error());
    $_SESSION["login_user"] = null;
    $_SESSION["sessionid"] = null;
    session_destroy();
    pageReturn(siteroot());
}