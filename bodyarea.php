<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/22/2018
 * Time: 11:40 PM
 */


$customerdetails = explode('|',$_GET['customerdetail']);

$customerid = $customerdetails[0];
$customername = $customerdetails[1];
$selectedprogram = $_GET['program'];

xdebug_var_dump($customerid);
xdebug_var_dump($customername);
xdebug_var_dump($selectedprogram);