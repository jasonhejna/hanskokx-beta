<?
$today = date("Y-m-d");
$db = new SQLiteDatabase("../db/clients.db");
$result_array = $db->arrayQuery("SELECT * FROM Events WHERE DATETIME(date) >= '".$today."';", SQLITE_ASSOC);
$results =  sizeof($result_array);

if($results >= "1") {
echo '<table>
<tr>
    <td>Title</td><td>Date</td><td>Starts at</td><td>Location</td><td>Notes</td>
</tr>';

foreach ($result_array as $x) {
	echo "<pre>";
	//print_r($x);	
	echo "</pre>";

	echo '<tr>';

	echo '<td><div class="hideextra" style="width:200px">';
	echo $x[title];
	echo '</div></td>';
        echo '<td><div class="hideextra" style="width:100px">';
        echo date('F j, Y', strtotime($x[Date]));
        echo '</div></td>';
        echo '<td><div class="hideextra">';
        echo $x[Begin_Time];
        echo '</div></td>';
        echo '<td><div class="hideextra">';
        echo $x[Location];
        echo '</div></td>';
        echo '<td><div class="hideextra" style="width:200px">';
        echo $x[Notes];
        echo '</div></td>';

	echo '</tr>';
};
}
if ($results == "0") {
	$results = "no";
}

echo "You have ".$results." upcoming photoshoot";
if($results != "1") {
	echo "s";
}
echo ".";
?>
</table>
