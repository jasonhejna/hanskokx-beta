<?
$today = date("Y-m-d");
$db = new SQLiteDatabase("../db/clients.db");
$result_array = $db->arrayQuery("SELECT * FROM Events WHERE DATETIME(date) >= '".$today."' AND events_email='".$_SESSION[email]."';", SQLITE_ASSOC);
$results =  sizeof($result_array);

if($results >= "1") {
echo '
<div style="border: none; height: auto; margin-top: 10px; margin-left: 5px; overflow: hidden; position: relative;">
<table>
<tr>
    <td><div class="hideextra" style="margin-left: 10px;">Title</div></td><td>Date</td><td>Starts at</td><td>Location</td>
</tr>';

foreach ($result_array as $x) {
        echo "<pre>";
        //print_r($x);
        echo "</pre>";

        echo '<tr>';

        echo '<td><div class="hideextra" style="width: 250px; margin-left: 10px;">';
        echo $x[title];
        echo '</div></td>';
        echo '<td><div class="hideextra" style="width: 150px">';
        echo date('F j, Y', strtotime($x[Date]));
        echo '</div></td>';
        echo '<td><div class="hideextra" style="width: 100px;">';
        echo $x[Begin_Time];
        echo '</div></td>';
        echo '<td><div class="hideextra" style="width: 100px;">';
        echo '<a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q='.urlencode($x[Location]).'&amp;aq=0&amp;ie=UTF8t=m&amp;z=14 style="color:#0000FF;text-align:left" target="_blank">
			Map&nbsp;
			<img src="../assets/images/new_window_icon.gif" />
		</a>';
        echo '</div></td>';

        echo '</div></td>';
        echo '</tr>';
};
}
if ($results == "0") {
	echo '<div id="container_text" style="height: auto;">You have no upcoming sessions.</div>';
} else {
	echo "You have ".$results." upcoming session";
	if($results > "1") {
        	echo "s";
	}
echo ".";
}
echo '&nbsp;<br />&nbsp;';

if($results >= "1") {
echo'
</div>
</table>';
}
