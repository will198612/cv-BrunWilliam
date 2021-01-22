<?php
/*
THIS FILE USES PHPMAILER INSTEAD OF THE PHP MAIL() FUNCTION
*/

require 'vendor/autoload.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/// message that will be displayed when everything is OK :)

$fields = array('full-name' => 'Full-name', 'email' => 'Email', 'tel' => 'Tel', 'sujet' => 'Sujet', 'message' => 'Message');

try
{

	if(count($_POST) == 0) throw new \Exception('Form is empty');
    
    $emailTextHtml = "<h1>Nouveau message de votre WebCv</h1><hr>";
    $emailTextHtml .= "<table>";
    
    foreach ($_POST as $key => $value) {
        // If the field exists in the $fields array, include it in the email
        if (isset($fields[$key])) {
            $emailTextHtml .= "<tr><th>$fields[$key]</th><td>$value</td></tr>";
        }
    }
    $emailTextHtml .= "</table><hr>";
    

	//Create a new PHPMailer instance
	$mail = new PHPMailer;

	$mail->IsSMTP();
	$mail->Host = "ssl://smtp.gmail.com";
	$mail->Port = 465;

	// optional
	// used only when SMTP requires authentication  
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	$mail->Username = 'willafpa44@gmail.com';
	$mail->Password ='tylergcc44t';
	$mail->CharSet = "UTF-8";
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);

	$mail->IsHTML(true);
	//Set who the message is to be sent from
	$mail->setFrom($_POST['email'],$_POST['name']);
	//Set who the message is to be sent to
	$mail->addAddress('willafpa44@gmail.com');
	//Set the subject line
	$mail->Subject = ($_POST['name']).' '.($_POST['surname']).' vous a envoyé un message de votre WebCV';
	//Replace the plain text body with one created manually
	$mail->msgHTML($emailTextHtml);
	//send the message, check for errors
    if(!$mail->send()) {
        throw new \Exception('I could not send the email.' . $mail->ErrorInfo);
    }
    header("Location:index.html");
}
catch (\Exception $e)
{
    // $responseArray = array('type' => 'danger', 'message' => $errorMessage);
    $responseArray = array('type' => 'danger', 'message' => $e->getMessage());
}

