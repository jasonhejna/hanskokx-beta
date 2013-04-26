<?php
include("header.php");
// Check to see if we just updated our profile, and display a confirmation if we did
if ( isset($_SESSION[updated])) {
	echo '
		<script type="text/javascript">
    		$(function() {
        		$.notifyBar({ cls: "success", html: "'.$_SESSION[updated].'"});
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

$result = $db->query("SELECT * FROM Clients");
?>
<?php include('events_nav.php'); ?>
<div id="container">
  <div class="container_title">&nbsp;&nbsp;&nbsp;Create an Event</div>
  <div id="container_content">
<form action="process_event.php" method="post" id="contactform">

<label for="select">&nbsp;</label>
<br />
<select id="select_user" name="select_user" class="input" style="margin-left: 10px;">
<option disabled>Choose a user...</option>
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

<script type="text/javascript">

jQuery(function($){

$("select#select_user").bind("change", function(){
       var user_id = $("option:selected", this).val();

       $.post("getuser.php", "user_id=" + user_id, processResults, 'json');
});

});

function processResults(data){
	mydata = data;
	$("#id_").val(mydata[0].Id);
	$("#name_").val(mydata[0].Name);
	$("#email_").val(mydata[0].Email);
}

</script>

	<form action="process_event.php" method="post" id="updateform">
		<fieldset style="border: none; height: 100%;">
                        <label for="title">Title</label>
                                <input name="title" type="text" id="title" value="" class="input" />
                                <br /><br />

			<label for="date">Date</label>
				<input name="date" type="text" id="date" class="input" value="" />
				<br /><br />

		<label for="start_time">Begins at</label>
				<input name="start_time" type="text" id="start_time" style="width: 175px;" value="" class="input" />
				<br /><br />
			
			<label for="end_time">Ends at</label>
				<input name="end_time" type="text" id="end_time" style="width: 175px;" value="" class="input" />
				<br /><br />
			
			<label for="location">Location</label>
				<textarea name="location" cols=35 rows=6 class="textarea"></textarea>
				<br /><br />
			
			<label for="notes">Notes</label>
				<textarea name="notes" cols=35 rows=6 class="textarea"></textarea>
				<br /><br />			


				<p class="submit"><input type="submit" name="update" class="big_button" value="Create Event" /></p>
			<br /><br /><br /><br />
		</fieldset>
	</form>
</div>
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
<? include("footer.php"); ?>
