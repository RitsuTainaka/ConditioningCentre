<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/23/2018
 * Time: 12:37 AM
 */
session_start();
//includeFile("include/core.php");
//$db = new db();


    //$updatesql = "UPDATE CoachLoginAccount SET sessionid = NULL WHERE username='" . $_SESSION["login_user"] . "'";

    //$result = $db::query($updatesql) or
    //die(mysqli_connect_error());
    session_destroy();
    header("refresh:0; url=" . "http://rukiax.noip.me/ConditioningCentre/");
