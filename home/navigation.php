<div style="top: 20%; width: 100%; margin-left: auto; margin-right: auto; text-align: center;">
<div style="display: inline-block; height: 100%; margin: 0px auto; text-align: center;">
	<a href="?q=account" class="nav_button<?php if ( $_GET['q'] == "account" ) { echo "_now"; }; ?>">
		<span style="text-align: center; position: relative; width: 100%; top: 30%;">
			Manage my<br /><span style="font-weight: bold; font-size: 18pt;">account</span>
		</span>
	</a>

        <a href="?q=sessions" class="nav_button<?php if ( $_GET['q'] == "sessions" || $_GET['q'] == "scheduled" ) { echo "_now"; }; ?>">
<?
$today = date("Y-m-d");
$db = new SQLiteDatabase("../db/clients.db");
$result_array = $db->arrayQuery("SELECT event_id FROM Events WHERE DATETIME(date) >= '".$today."' AND events_email='".$_SESSION[email]."';", SQLITE_ASSOC);
$results =  sizeof($result_array);
if($results >= "1") {
        echo '<div class="badge">'.$results.'</div>';
}
?>

                <span style="text-align: center; position: relative; width: 100%; top: 30%; <? if($results >= "1") { echo 'margin-left: 42px;';} ?>">
                        Manage my<br /><span style="font-weight: bold; font-size: 18pt;  <? if($results >= "1") { echo 'margin-left: 42px;';} ?>">sessions</span>
                </span>
        </a>

	<a href="?q=proofs" class="nav_button<?php if ( $_GET['q'] == "proofs" ) { echo "_now"; }; ?>">
<?
$result_array = $db->arrayQuery("SELECT event_id FROM Events WHERE unviewed='1' AND published='1' AND events_email='".$_SESSION[email]."';", SQLITE_ASSOC);
$unviewed =  sizeof($result_array);
if($unviewed >= "1") {
        echo '<div class="badge">'.$unviewed .'</div>';
}
?>
        	<span style="text-align: center; position: relative; width: 100%; top: 30%; <? if($unviewed >= "1") { echo 'margin-left: 42px;';} ?>">
                        Manage my<br /><span style="font-weight: bold; font-size: 18pt;  <? if($unviewed >= "1") { echo 'margin-left: 42px;';} ?>">proofs</span>
		</span>
	</a>

        <a href="?q=prints" class="nav_button<?php if ( $_GET['q'] == "prints" ) { echo "_now"; }; ?>">
                <span style="text-align: center; position: relative; width: 100%; top: 30%;">
                        Manage my<br /><span style="font-weight: bold; font-size: 18pt;">prints</span>
                </span>
        </a>

</div>
</div>
