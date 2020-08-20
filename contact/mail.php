<?php 

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$formcontent="From: $name \n Message: $message";
$recipient = "sam@samrdexter.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
$rtn = mail($recipient, $subject, $formcontent, $mailheader);
echo $rtn;
echo "Thank You!";

?>