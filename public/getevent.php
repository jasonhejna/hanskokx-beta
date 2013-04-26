<?
session_start();
$string = $_POST[string];
$db = new SQLiteDatabase("../db/clients.db");


$result_array = $db->arrayQuery("SELECT * FROM Events WHERE public_string='$string'", SQLITE_ASSOC);

header("Content-type: application/json");
echo json_encode($result_array);

?>
