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
$program = explode("|",$_POST['program']);

if(isset($_POST['submit']))
{
    $db=new db();

    $sql = "INSERT INTO Customer (customerName, customerAddress, customerPhone, customerEmail, customerAge, customerGender) VALUES ('$name', '$address', '$phone', '$email', '$age', '$gender')";
    $result = $db::query($sql);
    if($result)
    {
        $getcidsql = "SELECT customerID FROM Customer WHERE customerName = '$name'";
        $result2 = $db::query($getcidsql);
        if($result2)
        {
            $cid = mysqli_fetch_array($result2)['customerID'];
            $sqlcoach = "INSERT INTO CoachCustomer (fkCustomerID, fkAccountID) VALUES ('$cid', $coach)";
            $result3 = $db::query($sqlcoach);
            if ($result3) {
                $programsql = "INSERT INTO EnrolledProgram (fkProgramID, fkCustomerID) VALUES ('$program[0]', '$cid')";
                $result4 = $db::query($programsql);
                if ($result4){
                    popup("Successfully added", "customer.php?program=". $program[1]);
                }
                else{
                    popup("error", "customer.php?program=". $program[1]);
                }
            } else {
                popup("error", "customer.php?program=". $program[1]);
            }
        }
        else {
            popup("error", "customer.php?program=". $program[1]);
        }
    }
    else {
        popup("error", "customer.php?program=". $program[1]);
    }
}