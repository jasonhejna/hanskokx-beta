<?
$user_id = $_POST[user_id];

$db = new SQLiteDatabase("../db/clients.db");

$result_array = $db->arrayQuery("SELECT Date,event_id FROM Events WHERE events_email='$user_id'", SQLITE_ASSOC);

header("Content-type: application/json");
echo json_encode($result_array);
?>