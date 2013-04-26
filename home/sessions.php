<script src="../assets/js/showhide.js" type="text/javascript"></script>
<div style="display:block; float: left; width: 100%;">

        <div id="container" style="min-height: 0px; margin-top: 10px; position: relative;">
                <div class="container_title" id="upcoming_title" onclick="showstuff('upcoming');" onmouseover="showstuff('upcoming');" onmouseout="hidestuff('upcoming');">&nbsp;&nbsp;&nbsp;Upcoming sessions
			<?
				$today = date("Y-m-d");
				$db = new SQLiteDatabase("../db/clients.db");
				$result_array = $db->arrayQuery("SELECT event_id FROM Events WHERE DATETIME(date) >= '".$today."' AND events_email='".$_SESSION[email]."';", SQLITE_ASSOC);
				$results =  sizeof($result_array);
				if($results >= "1") {
					echo '<div class="badge">'.$results.'</div>';
				}
			?>
		</div>
                <div id="upcoming_more" onclick="showstuff('upcoming');" onmouseover="showstuff('upcoming');" onmouseout="hidestuff('upcoming');" style="overflow: hidden; height: 0px; text-align: center;">...</div>
                <div id="upcoming_content" style="height: 0px; overflow: hidden; position: relative;"><? include('upcoming_events_form.php'); ?></div>
        </div>
</div>

<div style="display:block; float: left; width: 100%;">
        <div id="container" style="min-height: 0px; margin-top: 10px; position: relative;">
                <div class="container_title" id="book_title" onclick="showstuff('book');" onmouseover="showstuff('book');" onmouseout="hidestuff('book');">&nbsp;&nbsp;&nbsp;Schedule a session</div>
                <div id="book_more" onclick="showstuff('book');" onmouseover="showstuff('book');" onmouseout="hidestuff('book');" style="overflow: hidden; height: 0px; text-align: center;">...</div>
                <div id="book_content" style="height: 0px; overflow: hidden; position: relative;"><? include('schedule_event_form.php'); ?></div>
        </div>
</div>

<script type="text/javascript">
  AnyTime.picker( "date",
      { format: "%Y-%m-%d", firstDOW: 1 } );
  $("#start_time").AnyTime_picker(
      { format: "%l:%i %p" } );
  $("#end_time").AnyTime_picker(
      { format: "%l:%i %p" } );
</script>

