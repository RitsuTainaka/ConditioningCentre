<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/24/2018
 * Time: 2:05 PM
 */
include_once ('include/core.php');

$user = $_POST['user'];

$set = "SET ";
if(isset($_POST['submit'])) {
    if (!empty($_POST['newusername'])) {
        $set = $set . "`username` = '" . $_POST['newusername'] . "',";
    }
    if (!empty($_POST['newpassword'])) {
        $encryptedMessage = md5($_POST['newpassword'] . SECRETHASH);
        $set = $set . "`password` = '" . $encryptedMessage . "',";
    }
    if (!empty($_POST['newaccountlevel'])) {
        $set = $set . "`accesslevel` = '" . $_POST['newaccountlevel'] . "',";
    }
    if (!empty($_POST['newemail'])) {
        $set = $set . "`email` = '" . $_POST['newemail'] . "',";
    }

    $set = substr($set, 0, -1);
    $set = $set . " WHERE accountID = '$user'";


    $sql = "UPDATE CoachLoginAccount " . $set;

    $db = new db();

    $result = $db::query($sql);

    if ($result) {
        popup("Successfully updated", "admin.php");
    } else {
        popup("error", "admin.php");
    }
}
