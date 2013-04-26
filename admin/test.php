<?
$id = "6";

$db = new SQLiteDatabase("../db/clients.db");

$result_array = $db->arrayQuery("SELECT * FROM Events WHERE event_id='$id'", SQLITE_ASSOC);

print_r($result_array);
?>

