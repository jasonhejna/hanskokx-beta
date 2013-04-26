<?
session_start();
error_reporting(0);

$email = $_SESSION[select_user];
$date = date("dmY");

if(empty($email)) {
	$_SESSION[error] = "You must select a user to edit first!";
	header('Location: delete_user.php');
	exit;
}

if (!empty($email)) {

	$dbhandle = sqlite_open('../db/clients.db', 0666, $error);

	if (!$dbhandle) die ($error);
	$stm = "DELETE FROM Clients WHERE Email='$email'";
	$ok = sqlite_exec($dbhandle, $stm, $error);

	if (!$ok) {
			echo error;
			exit;
			$_SESSION[error] = $error;
	 		unset($_SESSION[select_user]);
			header('Location: delete_user.php');
		}
	 else {
	 		system('tar cfz ../old_clients/'.$email.'.'.$date.'.tar.gz ../clients/'.$email);
	 		system('rm -rf ../clients/'.$email);
	 		$_SESSION[updated] = "true";
	 		unset($_SESSION[select_user]);
	 		header('Location: delete_user.php');
	 		exit;
		};
};
?>