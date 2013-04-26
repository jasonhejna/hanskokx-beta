<?
session_start();
error_reporting(0);

$salt = "linux";
$current_pwd = sha1($salt.$_POST[current_password]);

$dbhandle = sqlite_open('../db/clients.db', 0666, $error);
$query = "SELECT Password FROM Clients WHERE Email='$_SESSION[email]'";
$result = sqlite_query($dbhandle, $query);
if (!$result) die("Cannot execute query.");

$row = sqlite_fetch_array($result, SQLITE_ASSOC);

if($row[Password] == $current_pwd) {
	$goodtogo = 1;
} else {
	$goodtogo = 0;
        $_SESSION[error] = "Incorrect password";

}

if(($_POST[password]!="") && ($_POST[password]==$_POST[password2]) && ($goodtogo == "1"))
        {
                $pass = $_POST[password];
                $_SESSION[password_err] = "";
        }
else
        {
                $_SESSION[error] = "Password wrong, or new passwords don't match";
        }
if(isset($_SESSION[error])) {
header('Location: /home/?q=password');
exit;
} else {
$salt = "linux";
$password = sha1($salt.$pass);
}


if (!empty($password)) {


if (!$dbhandle) die ($error);
$stm = "UPDATE Clients SET Password='$password' WHERE client_id=$_SESSION[id]";

$ok = sqlite_exec($dbhandle, $stm, $error);

if (!$ok) {
		$_SESSION[error] = $error;
		header('Location: /home/?=password');
	}
 else {
 			/* Set e-mail recipient */
		$to  = $_SESSION[email];
		$subject  = "Your password has been successfully updated!";
        $headers  = "from: noreply@hanskokx.com\n";
        $headers .= "MIME-Version: 1.0\n";
        if($_SESSION[email_pref] == 'html') {$headers .= "Content-Type: text/html; charset=iso-8859-1\n";}
        $headers .= "\r\n";

        // Let's prepare the message for the e-mail
	if($_SESSION[email_pref] == 'html')
        $message  = '<html><body>
         <table cellpadding="0" cellspacing="0" align="center">
           <tr>
             <td>
               <table cellpadding="0" cellspacing="0" align="center">
                 <tr>
                   <td width="500px" align="center">
                     <p style="color: #0099ff; text-shadow:#FFF 0 1px 0; font-size: 18pt;">
                       <img style="vertical-align: middle" src="http://www.hanskokx.com/assets/images/logo_mini.png" />
                       &nbsp;HANS KOKX
                       <span style="color: #999999; text-shadow:#FFF 0 1px 0;  font-size: 30pt;">photography</span>
                     </p>
                  </td>
                 </tr>
               </table>
             </td>
           </tr>
           <tr>
             <td>
               <table cellpadding="0" cellspacing="0" align="center">
                 <tr>
                   <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tl.png\');" />
                   <td width="500px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tm.png\');">
                     Your account has been successfully updated!
                   </td>
                   <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tr.png\');" />
                 </tr>
                 <tr>
                   <td width="14px" style="background-image:url(\'http://www.hanskokx.com/email/images/ml.png\');" />
                   <td bgcolor="#e6e8ed">
			Your password at hanskokx.com has been updated successfully.
                        <br /><br />
                        If you did not request this change to your account, please email me at <a href="mailto:info@hanskokx.com">info@hanskokx.com</a>.
                        <br /><br />
                        Please do not reply to this email.
                   </td>
                   <td width="14px" style="background-image:url(\'http://www.hanskokx.com/email/images/mr.png\');" />
                 </tr>
                 <tr>
                   <td width="14px" height="37px" style="background-image:url(\'http://www.hanskokx.com/email/images/bl.png\');" />
                   <td height="37px" style="background-image:url(\'http://www.hanskokx.com/email/images/bm.png\');" />
                   <td width="14px" height="37px" style="background-image:url(\'http://www.hanskokx.com/email/images/br.png\');" />
                 </tr>
               </table>
             </tr>
           </td>
         </table>
        </body></html>';
        else
                $message = 'Your password at hanskokx.com has been updated successfully.

If you did not request this change to your account, please email me at info@hanskokx.com
Please, do not reply to this email.';

		// Send the message using mail() function
		mail($to, $subject, $message, $headers, '-f mailer@hanskokx.com');
 		$_SESSION[updated] = "Your password has been updated successfully.";
 		unset($_SESSION[reset]);
 		header('Location: /home');
 		exit;
	};
}else{
	$_SESSION[error] = "Passwords don't match";
	header('Location: /home/?q=password');

};
?>
