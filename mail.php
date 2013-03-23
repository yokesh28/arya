<?php

$to = 'annamalai.cs@gmail.com';

$subject = 'Received mail information';

$headers = "From: " . strip_tags($_POST['email']) . "\r\n";
$headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '<html><body>';
	
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_REQUEST['name']) . "</td></tr>";
$message .= "<tr><td><strong>Mobile:</strong> </td><td>" . strip_tags($_REQUEST['phone']) . "</td></tr>";
$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_REQUEST['email']) . "</td></tr>";

$message .= "<tr><td><strong>Message:</strong> </td><td>" . strip_tags($_REQUEST['message']) . "</td></tr>";
	
	
	
$message .= "</table>";
$message .= "</body></html>";





	
$mobile ="$_REQUEST[phone]";
	
	
	
$enquiry="$_REQUEST[message]";
	
// Enter your email address

$send_contact=mail($to,$subject,$message,$headers);
	
// Check, if message sent to your email
// display message "We've recived your information"
if($send_contact){
	echo "We've recived your contact information";
}
else {
	echo "ERROR";
}
	
	
	
?>

