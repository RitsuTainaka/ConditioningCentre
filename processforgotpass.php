<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/24/2018
 * Time: 6:52 PM
 */

include ('include/core.php');
include ('include/phpmailer/PHPMailer.php');
include ('include/phpmailer/SMTP.php');
include ('include/phpmailer/OAuth.php');
include ('include/phpmailer/Exception.php');


$mail = new \PHPMailer\PHPMailer\PHPMailer(false);


if(isset($_POST['submit']))
{
    $newpass = md5("LetMeIn1".SECRETHASH);

    $db = new db();
    $from = 'rukiax@gmail.com';
    $to = $_POST['useremail'];
    $name = "Test";
    $subject = "Forgotten Password";
    $sql = "UPDATE CoachLoginAccount SET password = '$newpass' WHERE email = '$to'";
    $result = $db::query($sql);
    if($result){
        $body = "Your forgotted password is:\nLetMeIn1\nPlease change password after logging in";
    }
    else{
        popup("Error", "index.php");
        die;
    }


    $message = "From: The Fitness Centre\n Message: $body";

//Tell PHPMailer to use SMTP
    $mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
    $mail->SMTPDebug = 0;
//Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
    $mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "rukiax@gmail.com";
//Password to use for SMTP authentication
    $mail->Password = "zfdbwmfteolveaoo";
//Set who the message is to be sent from
    try
    {
        $mail->setFrom($from);
    }
    catch (\PHPMailer\PHPMailer\Exception $e)
    {
        xdebug_var_dump($e);
    }
//Set an alternative reply-to address
    //$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
    $mail->addAddress($to, 'Dean MacLeod');
//Set the subject line
    $mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
    //  $mail->msgHTML(file_get_contents('contents.html'), __DIR__);
    $mail->Body = $message;
//Replace the plain text body with one created manually
    $mail->AltBody = $message;
//Attach an image file
    // $mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
    if (!$mail->send()) {
        popup("Message could not be sent. Mailer Error: ' + $mail->ErrorInfo", "index.php");
    } else {
        popup("Message Sent, returning home.", "index.php");
        //Section 2: IMAP
        //Uncomment these to save your message in the 'Sent Mail' folder.
        #if (save_mail($mail)) {
        #    echo "Message saved!";
        #}
    }
}