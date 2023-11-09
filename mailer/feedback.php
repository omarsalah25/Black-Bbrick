<?php
require 'PHPMailerAutoload.php';
require 'form_setting.php';

if(isset($_POST)){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];


$messages = '<html><body style="background-color:#000; min-width:50%; text-align:center; color:#b99272";>';
$messages .='<div style="widht:100%; text-align:center; margin:20px 0 ;"><h1>New Message From Binco Website</h1></div>';
$messages .= '<table rules="all" style="border-color: #666; min-width:100%; text-align:center; color:#b99272"; cellpadding="20">';
$messages .= "<tr style=''><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['name']) . "</td></tr>";
$messages .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
$messages .= "<tr><td><strong>Message:</strong> </td><td>" . htmlentities($_POST['message']) . "</td></tr>";
$messages .= "</table>";
$messages .= "</body></html>";

	// $messages  = "<h3>New message from the site " .$fromName. "</h3> \r\n";
	// $messages .= "<ul>";
	// $messages .= "<li><strong>Name: </strong>" .$name."</li>";
	// $messages .= "<li><strong>Email: </strong>" .$email."</li>";
	// $messages .= "<li><strong>Phone: </strong>" .$tel."</li>";
	// $messages .= "<li><strong>Subject: </strong>" .$subject."</li>";
	// $messages .= "<li><strong>Message: </strong>" .$message."</li>";
	// $messages .= "</ul> \r\n";

	$mail = new PHPMailer;

	$mail->From = $from;
	$mail->FromName = $fromName;
	$mail->addAddress($to, 'Admin');

	$mail->isHTML(true);
	$mail->CharSet = $charset;

	$mail->Subject = $subj;
	$mail->Body    = $messages;

	if(!$mail->send()) {
	    print json_encode(array('status'=>0));
	} else {
	    print json_encode(array('status'=>1));
	}

}

?>
