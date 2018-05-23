<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/21/2018
 * Time: 6:20 PM
 */

//include_once ($_SERVER['DOCUMENT_ROOT'] . "/ConditioningCentre/config.php");
includeFile("config.php");

class db
{
    public static $mysqli;

    public function __construct()
    {
        self::$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if(mysqli_connect_errno()) {
            echo("Could not connect to DB: " . mysqli_connect_error());
            exit();
        }
    }

    public static function query($sql)
    {
        //xdebug_var_dump();
        $result = mysqli_query(self::$mysqli,$sql)
        or die(mysqli_connect_error());
        return $result;
    }

    public static function test()
    {
        return "works123";
    }
}