<?
$user_id = $_POST[user_id];


$db = new SQLiteDatabase("../db/clients.db");

$result_array = $db->arrayQuery("SELECT DISTINCT * FROM Clients WHERE client_id=$user_id", SQLITE_ASSOC);

header("Content-type: application/json");
echo json_encode($result_array);
?>