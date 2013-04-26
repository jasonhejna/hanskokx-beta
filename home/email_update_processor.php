<?
session_start();
error_reporting(0);

$email = $_SESSION[email];

$_SESSION[name] = $name;
$_SESSION[email] = $email;


if (!empty($name)) {

$dbhandle = sqlite_open('../db/clients.db', 0666, $error);

if (!$dbhandle) die ($error);
$stm = "UPDATE Clients SET Email='$email' WHERE client_id=$_SESSION[id]";
$ok = sqlite_exec($dbhandle, $stm, $error);

if (!$ok) {
		$_SESSION[error] = $error;
		header('Location: /home');
	}
 else {
 			/* Set e-mail recipient */
		$to  = $_SESSION[email];
		$subject  = "Your account has been successfully updated!";
        $headers  = "from: noreply@hanskokx.com\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
        $headers .= "\r\n";

        // Let's prepare the message for the e-mail
        $message  = '<html><body>';
        $message .= ' <table cellpadding="0" cellspacing="0" align="center">';
        $message .= '   <tr>';
        $message .= '     <td>';
        $message .= '       <table cellpadding="0" cellspacing="0" align="center">';
        $message .= '         <tr>';
        $message .= '           <td width="500px" align="center">';
        $message .= '             <p style="color: #0099ff; text-shadow:#FFF 0 1px 0; font-size: 18pt;">';
        $message .= '               <img style="vertical-align: middle" src="http://www.hanskokx.com/assets/images/logo_mini.png" />';
        $message .= '               &nbsp;HANS KOKX';
        $message .= '               <span style="color: #999999; text-shadow:#FFF 0 1px 0;  font-size: 30pt;">photography</span>';
        $message .= '             </p>';
        $message .= '          </td>';
        $message .= '         </tr>';
        $message .= '       </table>';
        $message .= '     </td>';
        $message .= '   </tr>';
        $message .= '   <tr>';
        $message .= '     <td>';
        $message .= '       <table cellpadding="0" cellspacing="0" align="center">';
        $message .= '         <tr>';
        $message .= '           <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tl.png\');" />';
        $message .= '           <td width="500px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tm.png\');">';
        $message .= '             Your account has been successfully updated!';
        $message .= '           </td>';
        $message .= '           <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tr.png\');" />';
        $message .= '         </tr>';
        $message .= '         <tr>';
        $message .= '           <td width="14px" style="background-image:url(\'http://www.hanskokx.com/email/images/ml.png\');" />';
        $message .= '           <td bgcolor="#e6e8ed">';
        $message .= '             Please note the following changes to your account: <br />
        						  Name: '.$_SESSION[name].'<br />
								  Username: '.$_SESSION[email].'<br />
								  Phone Number: '.$_SESSION[phone].'<br />
                                  Addres: '.$_SESSION[address].'<br />
									<br /><br />
								  Please do not reply to this email.';
        $message .= '           </td>';
        $message .= '           <td width="14px" style="background-image:url(\'http://www.hanskokx.com/email/images/mr.png\');" />';
        $message .= '         </tr>';
        $message .= '         <tr>';
        $message .= '           <td width="14px" height="37px" style="background-image:url(\'http://www.hanskokx.com/email/images/bl.png\');" />';
        $message .= '           <td height="37px" style="background-image:url(\'http://www.hanskokx.com/email/images/bm.png\');" />';
        $message .= '           <td width="14px" height="37px" style="background-image:url(\'http://www.hanskokx.com/email/images/br.png\');" />';
        $message .= '         </tr>';
        $message .= '       </table>';
        $message .= '     </tr>';
        $message .= '   </td>';
        $message .= ' </table>';
        $message .= '</body></html>';

		// Send the message using mail() function
		mail($to, $subject, $message, $headers, '-f mailer@hanskokx.com');
 		$_SESSION[updated] = "Your profile has been updated successfully.";
 		unset($_SESSION[reset]);
 		header('Location: /home');
 		exit;
	};
};
?>
