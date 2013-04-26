<?
session_start();
error_reporting(0);

$email = $_SESSION[email];
$password = $_POST[password];
$password2 = $_POST[password2];
if ($password == $password2) {
	$salt = "linux";
        $password = sha1($salt.$password);
	$dbhandle = sqlite_open('../db/clients.db', 0666, $error);

if (!$dbhandle) die ($error);
$stm = "UPDATE Clients SET Password='$password', do_reset='' WHERE client_id=$_SESSION[id]";
$ok = sqlite_exec($dbhandle, $stm, $error);

if (!$ok) {
		$_SESSION[error] = $error;
		header('Location: /home');
	}
 else {
 			/* Set e-mail recipient */
		$to  = $_SESSION[email];
		$subject  = "Your password has been changed";
        $headers  = "from: noreply@hanskokx.com\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
        $headers .= "\r\n";

        // Let's prepare the message for the e-mail
        $message  = '
<html>
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
                                        <td width="500px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tm.png\');">
Your password has been changed.
                                        </td>
                                        <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tr.png\');"></td>
                                </tr>
                                <tr>
                                        <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/ml.png\');"></td>
                                        <td bgcolor="#e6e8ed">
Hi '.$_SESSION[name].', <br />
Your password has been updated.
<br />
This change was was made by somebody at the IP address '.$_SERVER[REMOTE_ADDR].'.  If you did not make this change, please email me at <a href="mailto:info@hanskokx.com">info@hanskokx.com</a>
<br /><br />
Please do not reply to this email.
<br /><br />
Stay sharp!
<br /><br />
Hans Kokx
<br />
http://www.hanskokx.com
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
</html>
';

		// Send the message using mail() function
		mail($to, $subject, $message, $headers);
 		$_SESSION[updated] = "Your profile has been updated successfully.";
 		unset($_SESSION[reset]);
 		header('Location: /home');
 		exit;
	};
};
?>
