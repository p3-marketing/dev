<?php
header('AMP-Access-Control-Allow-Source-Origin: https://www.p3.marketing');
$name=$_POST['name'];
$email = $_POST['email'];
$enquiry = $_POST['enquiry'];
$formcontent=" $name, <$email> \n Nachricht: $enquiry";
$recipient = "agentur@p3.marketing";
$subject = "P3.MARKETING — Anfrage";
$mailheader = "From: ANFRAGE@p3.marketing \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
$response = array('name' => $name);
echo json_encode($response);
?>