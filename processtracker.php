<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/24/2018
 * Time: 1:29 AM
 */

include_once ('include/core.php');

$customerid = $_POST['customerid'];
$customername = $_POST['customername'];
$selectedprogram = $_POST['program'];
$bodyarea = $_POST['areaname'];
$exercise = $_POST['exercisename'];
$bodyareaid = $_POST['areaid'];
$exerciseid = $_POST['exerciseid'];
$weight = $_POST['newvalue'];
if(isset($_POST['submit']))
{
    $db = new db();

    $sql = "INSERT INTO Result (resultWeight, fkAreaID, fkCustomerID, fkExerciseID) VALUES ($weight,$bodyareaid,$customerid,$exerciseid)";
    $result = $db::query($sql);

    if($result)
    {
        popup("Successfully Added", "exercise.php?customerid=" . $customerid . "&customername=" . $customername . "&program= " . $selectedprogram . "&area=" . urlencode($bodyarea));
    }
    else
    {
        popup("error", "tracker.php?customerid=" . $customerid . "&customername=" . $customername . "&program= " . $selectedprogram . "&area=" . urlencode($bodyarea) . "&exercise=" . $exercise);
    }
}
