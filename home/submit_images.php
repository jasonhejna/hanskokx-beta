<?
session_start();
error_reporting(0);

$email = $_SESSION[email];

$to  = "info@hanskokx.com";
$subject  = $_SESSION[name]." has chosen some images for processing!";
$headers = "From: ".$_SESSION[email];
$headers .= '"\r\n"';

foreach($_POST as $x => $y) {
	$images .= $x."
";
};

// Let's prepare the message for the e-mail
$message = $_SESSION[name]." has chosen some images for you to look over.

".
$images."
";	 
# Anti-header-injection - Use before mail() 
# By Victor Benincasa <vbenincasa(AT)gmail.com> 

foreach($_REQUEST as $fields => $value) if(eregi("TO:", $value) || eregi("CC:", $value) || eregi("CCO:", $value) || eregi("Content-Type", $value)) exit("ERROR: Code injection attempt denied! Please don't use the following sequences in your message: 'TO:', 'CC:', 'CCO:' or 'Content-Type'."); 

// Fix any bare linefeeds in the message to make it RFC821 Compliant. 
$message = preg_replace("#(?<!\r)\n#si", "\r\n", $message); 
		    
// Make sure there are no bare linefeeds in the headers 
$headers = preg_replace('#(?<!\r)\n#si', "\r\n", $headers); 

// Send the message using mail() function
mail($to, $subject, $message, $headers, '-f mailer@hanskokx.com');

$_SESSION[sent] = "Your chosen images have been sent to me for review.";
header('Location: /home');
exit;

?>
