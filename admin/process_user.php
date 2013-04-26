<?
session_start();
error_reporting(0);

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

if($_POST[password] != '') {
	$pass = $_POST[password];
}
else {
	$pass = createRandomPassword(); 
};


$name = $_POST[name];
$email = $_POST[email];
$_SESSION[to_email] = $email;
$_SESSION[to_name] = $name;
$_SESSION[to_password] = $pass;
$salt = "linux";
$password = sha1($salt.$pass);


if (!empty($name)) {

 $dbhandle = sqlite_open('../db/clients.db', 0666, $error);

 if (!$dbhandle) die ($error);
 $stm = "INSERT INTO Clients(Name, Email, Password, Address, Profile_Completed, is_admin) VALUES('$name', '$email', '$password', '', '0', '')";
 $ok = sqlite_exec($dbhandle, $stm, $error);

 if (!$ok) {
  $_SESSION[error] = $error;
  header('Location: create_user.php');
 } 
 else {
		$dir = getcwd();
		$number = 1;
		for($i=0; $i<$number; $i++) {
		    $dir = dirname($dir);
		}
mkdir($dir ."/clients/".$email , 0777);

		/* Set e-mail recipient */
		$to  = $_SESSION[to_email];
		$subject  = "Your account has been successfully created!";
		$headers = "From: info@hanskokx.com" . "\r\n";
		$headers .= 'Reply-To: ';
		$headers .= 'noreply@hanskokx.com';
		$headers .= '"\r\n"';

		// Let's prepare the message for the e-mail
		$message = "Your account has been successfully created!
You may now log in using the following credentials at www.hanskokx.com:
			
Username: $_SESSION[to_email]
Password: $_SESSION[to_password]

Please do not reply to this email.
";

		 
		// Send the message using mail() function
		mail($to, $subject, $message, $headers, '-f mailer@hanskokx.com');

        header('Location: success.php');
   		exit;
    }
}
?>
