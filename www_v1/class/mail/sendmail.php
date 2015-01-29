<html>
<head>
<title>PHPMailer - SMTP basic test with authentication</title>
</head>
<body>

<?php

//error_reporting(E_ALL);
error_reporting(E_STRICT);

date_default_timezone_set('shanghai');

require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

$body             = 'hello';

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "smtp.sina.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "smtp.sina.com"; // sets the SMTP server
$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
$mail->Username   = "taokucom@sina.com"; // SMTP account username
$mail->Password   = "ete123";        // SMTP account password

$mail->SetFrom('taokucom@sina.com', 'First Last');

$mail->AddReplyTo("taokucom@sina.com","First Last");

$mail->Subject    = "PHPMailer Test Subject via smtp, basic with authentication";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "xugang9804@gmail.com";
$mail->AddAddress($address, "John Doe");


if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}

?>

</body>
</html>
