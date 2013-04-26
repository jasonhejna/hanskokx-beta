<?
session_start();
error_reporting(0);

$id = $_POST[select_date];


if(empty($id)) {
	$_SESSION[error] = "You must select a user to edit first!";
	header('Location: delete_event.php');
	exit;
}

if (!empty($id)) {

	$dbhandle = sqlite_open('../db/clients.db', 0666, $error);

	if (!$dbhandle) die ($error);
	//$stm = "UPDATE Events SET published='0' WHERE event_id=$id";
	
	$stm = "DELETE FROM Events WHERE event_id=$id";
	
	$ok = sqlite_exec($dbhandle, $stm, $error);

	if (!$ok) {
			$_SESSION[error] = $error;
			header('Location: delete_event.php');
		}
	 else {
	 		$_SESSION[updated] = "true";
	 		header('Location: delete_event.php');
	 		exit;
		};
};
?>
