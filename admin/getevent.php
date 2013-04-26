<?
$id = $_POST[id];

$db = new SQLiteDatabase("../db/clients.db");

$result_array = $db->arrayQuery("SELECT * FROM Events WHERE event_id='$id'", SQLITE_ASSOC);

header("Content-type: application/json");
echo json_encode($result_array);
?>
