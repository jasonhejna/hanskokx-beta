<?
session_start();
error_reporting(0);

$email = $_SESSION[email];
$email_pref = $_POST[email_pref];

$_SESSION[email_pref] = $email_pref;

if (!empty($email)) {

$dbhandle = sqlite_open('../db/clients.db', 0666, $error);

if (!$dbhandle) die ($error);
$stm = "UPDATE Clients SET email_pref='$email_pref' WHERE client_id=$_SESSION[id]";

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
        if($email_pref == 'html') { $headers .= "Content-Type: text/html; charset=iso-8859-1\n";}
        $headers .= "\r\n";

        // Let's prepare the message for the e-mail
	if($email_pref == "html")
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
                     Your email preferences have been updated for your account at hanskokx.com <br />
		     I\'m going to send you emails in HTML format now.<br /><br />
		     If you didn\'t make this change to your account, please email me at <a href="mailto:info@hanskokx.com">info@hanskokx.com</a>.
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
                $message = 'Your email preferences at hanskokx.com has been updated.
I\'m going to send you emails in plain text format now.

If you did not request this change to your account, please email me at info@hanskokx.com
Please, do not reply to this email.';

		// Send the message using mail() function
		mail($to, $subject, $message, $headers, '-f mailer@hanskokx.com');
 		$_SESSION[updated] = "Your profile has been updated successfully.";
 		unset($_SESSION[reset]);
 		header('Location: /home');
 		exit;
	};
}else{
	$_SESSION[error] = "Hey, wait a second... who are you?!";
	header('Location: /home/?q=account');

};
?>
