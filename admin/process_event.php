<?
session_start();
error_reporting(0);

$email = $_POST[select_user];
$date = $_POST[date];
$start_time = $_POST[start_time];
$end_time = $_POST[end_time];
$location = $_POST[location];
$title = $_POST[title];
$notes = $_POST[notes];

$email = sqlite_escape_string($email);
$date = sqlite_escape_string($date);
$start_time = sqlite_escape_string($start_time);
$end_time = sqlite_escape_string($end_time);
$location = sqlite_escape_string($location);
$title = sqlite_escape_string($title);
$notes = sqlite_escape_string($notes);


function createRandomString() { 

    $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $pass = '' ; 

    while ($i <= 8) { 
        $num = rand() % 9; 
        $tmp = substr($chars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
    } 

    return $pass; 

} 

$string = createRandomString();

if (!empty($email)) {

 $dbhandle = sqlite_open('../db/clients.db', 0666, $error);

 if (!$dbhandle) die ($error);
 $stm = "INSERT INTO Events(Notes, Date, Begin_Time, End_Time, Location, events_email, public_string, title) VALUES('$notes', '$date', '$start_time', '$end_time', '$location', '$email', '$string', '$title')";
 $ok = sqlite_exec($dbhandle, $stm, $error);

 if (!$ok) {
  $_SESSION[error] = $error;
  header('Location: create_event.php');
  exit;
 } 
 else {
 	$_SESSION[updated] = "Event successfully created!";
	mkdir("../clients/".$email."/".$date , 0775);
	mkdir("../clients/".$email."/".$date."/original/" , 0775);
	mkdir("../clients/".$email."/".$date."/large/" , 0775);
	mkdir("../clients/".$email."/".$date."/thumb/" , 0775);
        header('Location: create_event.php');
   	exit;
    }
}
?>
