<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/21/2018
 * Time: 6:24 PM
 */

includeFile("include/core.php");
includeFile("config.php");


class user extends db
{
    public static function userQuery($sql)
    {
        $result = mysqli_query(self::$mysqli,$sql) or
        die(mysqli_connect_error());
        $user_data = mysqli_fetch_array($result);
        $count_row = $result->num_rows;
        if($count_row == 1) {
            return $user_data;
        }
        else {
            return mysqli_connect_error();
        }
    }
    public static function login($username,$password)
    {
        session_start();
        $hashedpassword = md5($password . SECRETHASH);
        $loginsql = "SELECT accountID, username, password, accesslevel FROM CoachLoginAccount WHERE username = '" . $username . "' AND password = '" . $hashedpassword . "'";
        $row = self::userQuery($loginsql);
        if(is_array($row))
        {
            $_SESSION["login_user"] = $row['username'];
            $_SESSION["accesslevel"] = $row['accesslevel'];
            $_SESSION['accountid'] = $row['accountID'];
            $RNGsessionid = bin2hex(openssl_random_pseudo_bytes(16));
            $updatesql = "UPDATE CoachLoginAccount SET sessionid = '" . $RNGsessionid . "' WHERE username='" . $_POST["username"] . "'";
            $result = self::query($updatesql) or
            die(mysqli_connect_error());
            $_SESSION['sessionid'] = $RNGsessionid;
            return $result;
        }
        else{
            popup('Invalid Username or Password!',"index.php");
        }
        return null;
    }

    public static function test()
    {
        return "words";
    }
}