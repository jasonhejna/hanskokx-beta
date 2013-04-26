<?php
session_start();

$dbhandle = sqlite_open('../db/clients.db', 0666, $error);

$email=$_POST['username']; 
$pass=$_POST['password'];
$salt="linux";

$email = stripslashes($email);
$password = sha1($salt.$pass);

if (!$dbhandle) die ($error);

$query="SELECT * FROM Clients WHERE Email='$email' AND Password='$password'";
$get_data="SELECT * FROM Clients WHERE Email='$email' AND Password='$password'";

$result = sqlite_query($dbhandle, $query);
$row = sqlite_fetch_array($result, SQLITE_NUM); 

if(sqlite_num_rows($result)!="1")
{
	$_SESSION[error] = "Invalid username/password!";
	$_SESSION['is_logged_in'] = "0";
	
	header('Location: /login');
	exit;
}
{
	$result = sqlite_query($dbhandle, $get_data);
	$row = sqlite_fetch_array($result, SQLITE_NUM);
	$_SESSION['name'] = $row[2];
	$_SESSION['email'] = $email;
	$_SESSION['is_logged_in'] = "on";
	$_SESSION['is_admin'] = $row['is_admin'];
	$_SESSION['id'] = $row['client_id'];
	$_SESSION['stored_pwd'] = $row['Password'];
	$id=$_SESSION['id'];
	$date = date("F j, Y, g:i a");
	$stm = "UPDATE Clients SET last_login='$date', last_ip='$_SERVER[REMOTE_ADDR]' WHERE email='$email'";
	$ok = sqlite_exec($dbhandle, $stm);
	header('Location: /home');
	exit();
};

?>
