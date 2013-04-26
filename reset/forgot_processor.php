<?
session_start();
error_reporting(0);

$email = $_POST[email];


// Check to see whether or not the email address exists in the database before spamming it with emails.
if ($db = @sqlite_open("../db/clients.db", 0666, $error))
{
$result = sqlite_query($db, "SELECT * FROM Clients WHERE Email='$email'");
while (!$row = sqlite_fetch_array($result)) {
		$_SESSION[error] = "Invalid email address.";
 		header('Location: /reset');
 		exit;
	 };
};
/** 
 * The letter l (lowercase L) and the number 1 
 * have been removed, as they can be mistaken 
 * for each other. 
 */ 

function createRandomPassword() { 

    $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $pass = '' ; 

    while ($i <= 7) { 
        $num = rand() % 33; 
        $tmp = substr($chars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
    } 

    return $pass; 

} 

// Usage 
$pass = createRandomPassword(); 

$_SESSION[to_email] = $email;
$_SESSION[to_password] = $pass;
$salt = "linux";
$password = sha1($salt.$pass);



if(empty($email)) {
	$_SESSION[error] = "You must enter your email address!";
	header('Location: forgot.php');
	exit;
}

if (!empty($email)) {

	$dbhandle = sqlite_open('../db/clients.db', 0666, $error);

	if (!$dbhandle) die ($error);
	$stm = "UPDATE Clients SET do_reset='on', Password='$password' WHERE Email='$email'";
	$ok = sqlite_exec($dbhandle, $stm, $error);

	if (!$ok) {
			$_SESSION[error] = $error;
			header('Location: forgot.php');
		}
	 else {

		/* Set e-mail recipient */
		$to  = $_SESSION[to_email];
		$pwd = $_SESSION[to_password];
		$subject  = "Your password has been reset.";
                $headers  = "from: noreply@hanskokx.com\n";
                $headers .= "Reply-To: noreply@hanskokx.com\n";
                $headers .= "MIME-Version: 1.0\n";
                $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
                $headers .= "\r\n";

                // Let's prepare the message for the e-mail
                $message = '<html>
                <body>
                <span style="text-align: center;">
                <p style="color: #0099ff; text-shadow:#FFF 0 1px 0; font-size: 18pt;">
                <img style="vertical-align: middle" src="http://www.hanskokx.com/assets/images/logo_mini.png" />
                &nbsp;HANS KOKX <span style="color: #999999; text-shadow:#FFF 0 1px 0;  font-size: 30pt;">photography</span>
                </p>
                </span>
                <table cellpadding="0" cellspacing="0" align="center" width="528px">
                <tbody>
                <tr>  
                <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tl.png\');"></td>
                <td width="500px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tm.png\');">Your Password Has Been Reset</td>
                
                <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tr.png\');"></td>
                </tr>
                <tr>
                <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/ml.png\');"></td>
                <td bgcolor="#e6e8ed">
                The password for your  account at hanskokx.com has been reset. This request was made by somebody at the IP address '.$_SERVER[REMOTE_ADDR].'.  
		If you did not make this change, please email me at <a href="mailto:info@hanskokx.com">info@hanskokx.com</a>
                <br /><br />
                You may log in as '.$to.' with the password <strong>'.$pwd.'</strong>.  To login, click <a href="http://www.hanskokx.com/login">here</a>, or visit  http://www.hanskokx.com/login in your web browser.
                
                </td>
                <td width="14px" style="background-image:url(\'http://www.hanskokx.com/email/images/mr.png\');" />
                </tr>
                <tr>
                <td width="14px" height="37px" style="background-image:url(\'http://www.hanskokx.com/email/images/bl.png\');" />
                <td height="14px" height="37px" style="background-image:url(\'http://www.hanskokx.com/email/images/bm.png\');" />
                <td width="14px" height="37px" style="background-image:url(\'http://www.hanskokx.com/email/images/br.png\');" />
                </tr>
                </tbody>
                </table>
                </body>
                </html>';

		 
		// Send the message using mail() function
		mail($to, $subject, $message, $headers, '-f mailer@hanskokx.com');

	 		$_SESSION[updated] = "Your password has been reset! Please check your email.";
	 		header('Location: /reset');
	 		exit;
		};
};
?>
