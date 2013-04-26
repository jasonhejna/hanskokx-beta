<?
session_start();
error_reporting(0);

function createRandomPassword() { 

    $chars = "abcdefghijkmnopqrstuvwxyz023456789!@$"; 
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

$id = $_POST[id_];
$name = $_POST[name_];
$phone = $_POST[phone_];
$email = $_POST[email_];
$address = $_POST[address_];
$is_admin = $_POST[is_admin_];
$reset = $_POST[reset_];
$discount = $_POST[discount_];
$sessions = $_POST[total_sessions_];
$password = $_POST[password_];

$db = new SQLiteDatabase('../db/clients.db');
$old_email = $db->arrayQuery("SELECT DISTINCT Email FROM Clients WHERE client_id=$id" , SQLITE_ASSOC); 

if(isset($password)){
	$salt = "linux";
	$password = sha1($salt.$password);
}

if(empty($id)) {
	$_SESSION[error] = "You must select a user to edit first!";
	header('Location: view_users.php');
	exit;
}

if (!empty($id)) {

	$dbhandle = sqlite_open('../db/clients.db', 0666, $error);

	if (!$dbhandle) die ($error);
	$stm = "UPDATE Clients SET Name='$name', Phone='$phone', Email='$email', Address='$address', is_admin='$is_admin', do_reset='$reset', Discount='$discount', Total_Sessions='$sessions'"; 
	 if(!empty($_POST[password_])) {
		$stm .= ", Password='$password'";
	}
	$stm .= " WHERE client_id=$id";
	$ok = sqlite_exec($dbhandle, $stm, $error);


	if($email == $old_email[0][Email]) {
		$hurp = durp;
	}
	else
	{
		system('mv ../clients/'.$old_email[0][Email].' ../clients/'.$email);
	}

	if (!$ok) {
			$_SESSION[error] = $error;
			header('Location: view_users.php');
		}
	 else {
	 		$_SESSION[updated] = "true";
		        if($email == $old_email[0][Email]) {
               			// nothing happens
        		}
        		else
        		{
                		system('mv ../clients/'.$old_email[0][Email].' ../clients/'.$email);
       			}


			if(isset($reset)){
				$pass = createRandomPassword(); 
				$salt = "linux";
				$password = sha1($salt.$pass);
				$stm = "UPDATE Clients SET Password='$password' WHERE client_id=$id"; 
				$ok = sqlite_exec($dbhandle, $stm, $error);

				/* Set e-mail recipient */

				$subject  = "Your password has been reset.";
				$headers = "From: noreply@hanskokx.com" . "\r\n";
                $headers .= "MIME-Version: 1.0\n";
                $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
                $headers .= "\r\n";

                // Let's prepare the message for the e-mail
                $message .= '<html>
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
                The account for your password at hanskokx.com has been reset by an administrator.
                <br /><br />
                Please log in using the password <strong>'.$pass.'</strong>, and update your password.  To login, click <a href="http://www.hanskokx.com/login">here</a>, or visit  http://www.hanskokx.com/login in your web browser.
		<br />
		If you believe this message may have been received in error, please email info@hanskokx.com
                <br /><br />
		Please do not reply to this email. 
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
                mail($email, $subject, $message, $headers, '-f mailer@hanskokx.com');
			}
	 		header('Location: view_users.php');
	 		exit;
		};
};
?>
