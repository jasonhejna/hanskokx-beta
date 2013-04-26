<?
session_start(); 
error_reporting(0);

$email = $_POST[email];

if(($_POST[password1]!="") && ($_POST[password1]==$_POST[password2]))
	{
		$pass = $_POST[password1];
		$_SESSION[password_err] = "";
	}
else
	{
		$_SESSION[password_err] = "password";
		$_SESSION[error] = "1";
	}

if(isset($_SESSION[error])) {
    header('Location: index.php');
	exit;
}

$salt = "linux";
$password = sha1($salt.$pass);

if (isset($email)) {

 $dbhandle = sqlite_open('../db/clients.db', 0666, $error);

 if (!$dbhandle) die ($error);
 $stm = "INSERT INTO Clients(Email, Password, Profile_Completed, is_admin) VALUES('$email', '$password', '0', '')";
 $ok = sqlite_exec($dbhandle, $stm, $error);

 if (!$ok) {
  $_SESSION[error] = $error;
  header('Location: index.php');
 } 
 else {
		$dir = getcwd();
		$number = 1;
		for($i=0; $i<$number; $i++) {
		    $dir = dirname($dir);
	}


mkdir($dir ."/clients/".$email , 0777);
$imagepath = "http://".$_SERVER['HTTP_HOST']."/email/images/";
                /* Set e-mail recipient */
                $to  = $email;
                $subject  = "Your account has been successfully created!";
                $headers  = "from: noreply@hanskokx.com\n";
		$headers .= "return-path: info@hanskokx.com\n";
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
                <td width="500px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tm.png\');">Your Account Has Been Created!</td>
                
                <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tr.png\');"></td>
                </tr>
                <tr>
                <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/ml.png\');"></td>
                <td bgcolor="#e6e8ed">
                Congratulations! You have successfully created an account at hanskokx.com.
                <br /><br />
                You may log in with the email address and password you signed up with.  To login, click <a href="http://www.hanskokx.com/login">here</a>, or visit  http://www.hanskokx.com/login in your web browser.
                
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
                mail($to, $subject, $message, $headers, '-f info@hanskokx.com');

        header('Location: success.php');
                exit;
    }
}
?>
