<?php
session_start();
$_SESSION['error'] = "FALSE";
$hasgpc = get_magic_quotes_gpc();
foreach($_POST as $field => $value)
{
	$value = trim($value);
	if($hasgpc)
	{
		$value = stripslashes($value);
	}
	$filtered_post[$field] = $value;
}

$hasgpc = get_magic_quotes_gpc();
foreach($_POST as $field => $value)
{
	/* first we extract the actual intended field name */
 
	$fieldinfo = explode('_', $field); // turn the posted field name into an array of properties
	$field = array_shift($fieldinfo); // take the first element as the intended field name
 
	/* do the standard stuff we discussed above */
 
	$value = trim($value);
	if($hasgpc)
	{
		$value = stripslashes($value);
	}
	$filtered_post[$field] = $value;
 
	/* new stuff to verify user input based on $fieldinfo */
 
	if(array_search('required', $fieldinfo) && empty($value))
	{
		$error = TRUE;
	}
	if(array_search('emailaddress', $fieldinfo) && !preg_match('|^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$|i', $value))
	{
		$error = TRUE;
	}
	if(array_search('alphanumeric', $fieldinfo) && preg_match('|[^a-z0-9]|i', $value))
	{
		$error = TRUE;
	}
	if($filtered_post[turing] != "8")
	{
		$error = TRUE;
	}
}
 
/* if there were errors in the web form, send the user back to make changes */
if($error)
{	
	$_SESSION['name'] = $filtered_post[name_required_alphanumeric];
	$_SESSION['email'] = $filtered_post[email_required_emailaddress];
	$_SESSION['message'] = $filtered_post[message];
	$_SESSION['error'] = $error;
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
}
 
/*
at this point the form has been cleaned and validated.
reference the fields with $filtered_post, such as $filtered_post['username']
*/
/* Set e-mail recipient */
$to  = "info@hanskokx.com";
$subject  = "New message from hanskokx.com";
$headers = "From: hanskokx.com" . "\r\n";
$headers .= 'Reply-To: ';
$headers .= $filtered_post[email_required_emailaddress];
$headers .= '"\r\n"';

// Let's prepare the message for the e-mail
$message = "Hello!
Somebody has requested some more information:

Name: $filtered_post[name_required_alphanumeric]
E-mail: $filtered_post[email_required_emailaddress]

$filtered_post[message]
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
$_SESSION['name'] = $filtered_post[name_required_alphanumeric];
$_SESSION['email'] = $filtered_post[email_required_emailaddress];
$_SESSION['message'] = $filtered_post[message];
$_SESSION['emailSent'] = true;


// Redirect visitor to the thank you page
header('Location: contacted.php');
exit();

?>
