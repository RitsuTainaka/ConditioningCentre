<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/24/2018
 * Time: 4:50 PM
 */
include_once ('include/core.php');
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$coach = $_POST['coach'];
$cid = $_POST['cid'];
$program = explode("|",$_POST['program']);

if(isset($_POST['submit']))
{
    $db=new db();

    $sql = "UPDATE Customer SET customerName = '$name', customerAddress = '$address', customerPhone = '$phone', customerEmail = '$phone', customerAge = '$age', customerGender = '$gender' WHERE customerID = '$cid'";
    $result = $db::query($sql);
    if($result)
    {
        $sqlcoach = "UPDATE CoachCustomer SET fkAccountID = '$coach' WHERE fkCustomerID = '$cid' ";
        $result2 = $db::query($sqlcoach);
        if($result2)
        {
            $programsql = "UPDATE EnrolledProgram SET fkProgramID = '$program[0]' WHERE fkCustomerID = '$cid'";
            $result3 = $db::query($programsql);
            if ($result3){
                popup("Successfully added", "customer.php?program=". $program[1]);
            } else {
                popup("error", "customer.php?program=". $program[1]);
            }
        } else {
            popup("error", "customer.php?program=". $program[1]);
        }
    } else {
        popup("error", "customer.php?program=". $program[1]);
    }
}