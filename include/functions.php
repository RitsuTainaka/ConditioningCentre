<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/21/2018
 * Time: 6:18 PM
 */

function popup($string,$returnpage)
{
    echo "<script type='text/javascript'>alert('$string');</script>";
    header("refresh:0; url=". siteroot() . $returnpage);
    die();
}

function pageReturn($string)
{
    header("refresh:0; url=" . $string);
}

function pageReturnPopup($string,$returnURL)
{
    echo "<script type='text/javascript'>alert('$string');</script>";
    header("refresh:0; url=" . $returnURL);
}
function classAutoLoad($class)
{
    require_once ('class/' . $class . '.class.php');
}

function debug()
{
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
function includeFile($file)
{
    return include_once ($_SERVER['DOCUMENT_ROOT'] . "/ConditioningCentre/" . $file);
}

function siteroot()
{
    return "http://" . $_SERVER['SERVER_NAME'] . "/ConditioningCentre/";
}