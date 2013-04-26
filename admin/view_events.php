<?php
include("header.php");
// Check to see if we just updated our event, and display a confirmation if we did
if ( isset($_SESSION[updated])) {
	echo '
		<script type="text/javascript">
    		$(function() {
        		$.notifyBar({ cls: "success", html: "Event has been successfully updated."});
     		}); 
    	</script>';
    	unset($_SESSION[updated]);
    };

if ( isset($_SESSION[error])) {
	echo '
		<script type="text/javascript">
    		$(function() {
   				$.notifyBar({ cls: "error", html: "'.$_SESSION[error].'"});
     		}); 
    	</script>';
    	unset($_SESSION[error]);
    };

$db = new SQLiteDatabase("../db/clients.db");

$result = $db->query("SELECT DISTINCT Email,Name,client_id FROM Clients NATURAL JOIN Events WHERE Clients.Email=Events.events_email");
?>

<?php include('events_nav.php'); ?>
<div id="container">
  <div class="container_title">&nbsp;&nbsp;&nbsp;Edit Events</div>
  <div id="container_content">
<form action="update_event.php" method="post" id="eventform" name="eventform">
	<label for="select">&nbsp;</label>
	<br />
	<select id="select_user" name="select_user" class="input" style="margin-left: 12px;">
		<option value="">Choose a user...</option>
			<?
      			while ($result->valid()) {
              		$row = $result->current();
              		echo '<option value='.$row[Email].'>';
              		echo $row[Name].' - '.$row[Email].'</option>';
		            $result->next();
      			}
				unset($db);
			?>
	</select>
<br /><br />

<script type="text/javascript">

jQuery(function($){

$("select#select_user").bind("change", function(){
		var user_id = $("option:selected", this).val();
		$.post("geteventlist.php", "user_id=" + user_id, processResults, 'json');
	});
});

function processResults(data){
	mydata = data;
	options = '<option value="">Choose a date...</option>';
	for (var i = 0; i < mydata.length; i++) {
		options += '<option value="' + mydata[i].event_id + '">' + mydata[i].Date + '</option>';
		}
		$("#select_date").html(options);
		$("#event_title").val("");
		$("#id").val("");
		$("#date").val("");
		$("#original_date").val("");
		$("#start_time").val("");
		$("#end_time").val("");
		$("#address").text("");
		$("#notes").text("");
}

</script>

	<label for="select">Date</label>
		<select id="select_date" name="select_date" class="input" style="margin-left: 12px;">
		</select>


<script type="text/javascript">

jQuery(function($){

$("select#select_date").bind("change", function(){
		var id = $("option:selected", this).val();
		$.post("getevent.php", "id=" + id, processEvent, 'json');
	});
});

function processEvent(data){
	mydata = data;
	$("#id").val(mydata[0].event_id);
	$("#event_title").val(mydata[0].title);
	$("#date").val(mydata[0].Date);
	$("#original_date").val(mydata[0].Date);
	$("#start_time").val(mydata[0].Begin_Time);
	$("#end_time").val(mydata[0].End_Time);
	$("#address").text(mydata[0].Location);
	$("#notes").text(mydata[0].Notes);
	$("#public").val(mydata[0].public_string);
};

</script>

<? include("event_data.php"); ?>
</form>
</div>
</div>
<? include("footer.php"); ?>
