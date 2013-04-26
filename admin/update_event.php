<?
session_start();
error_reporting(0);

$id = $_POST[id];
$date = $_POST[date];
$start_time = $_POST[start_time];
$end_time = $_POST[end_time];
$address = $_POST[address];
$title = $_POST[event_title];
$notes = $_POST[notes];
$public = $_POST['public'];
$original_date = $_POST[original_date];

$email = sqlite_escape_string($email);
$date = sqlite_escape_string($date);
$start_time = sqlite_escape_string($start_time);
$end_time = sqlite_escape_string($end_time);
$location = sqlite_escape_string($location);
$title = sqlite_escape_string($title);
$notes = sqlite_escape_string($notes);
$public = sqlite_escape_string($public);

if(empty($id)) {
	$_SESSION[error] = "You must select a user to edit first!";
	header('Location: view_events.php');
	exit;
}

if (!empty($id)) {

	$dbhandle = sqlite_open('../db/clients.db', 0666, $error);

	if (!$dbhandle) die ($error);
	$stm = "UPDATE Events SET title='$title', Date='$date', Begin_Time='$start_time', End_Time='$end_time', Location='$address', Notes='$notes', public_string='$public' WHERE event_id='$id'";
	$ok = sqlite_exec($dbhandle, $stm, $error);

	if (!$ok) {
			$_SESSION[error] = $error;
			header('Location: view_events.php');
		}
	 else {
			rename("../clients/".$email."/".$original_date , "../clients/".$email."/".$date);
	 		$_SESSION[updated] = "true";
	 		header('Location: view_events.php');
	 		exit;
		};
};
?>
