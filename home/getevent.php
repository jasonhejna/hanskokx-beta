<?
session_start();
$event_id = $_POST[id];
$_SESSION[date] = $_GET[date];
$_SESSION[id] = $event_id;

$db = new SQLiteDatabase("../db/clients.db");

$stm = $db->query("UPDATE Events SET unviewed='0' WHERE event_id='$event_id'");
$result_array = $db->arrayQuery("SELECT * FROM Events WHERE event_id='$event_id' ORDER BY event_id", SQLITE_ASSOC);

header("Content-type: application/json");
echo json_encode($result_array);

?>
