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
  <div class="container_title">&nbsp;&nbsp;&nbsp;Upload Pictures</div>
  <div id="container_content">
<form action="makethumbs.php" method="post" id="eventform" name="eventform">
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
		$("#id").val("");
		$("#date").val("");
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
	$("#date").val(mydata[0].Date);
};

</script>

<!-- begin upload script -->

<div id="uploader">
	<noscript>
		<p>Please enable JavaScript to use file uploader.</p>
		<!-- or put a simple form for upload here -->
	</noscript>
</div>

<script type="text/javascript" src="../assets/js/fileuploader.js"></script>

    <script type="text/javascript">
        function createUploader(){
            var uploader = new qq.FileUploader({
                element: document.getElementById('uploader'),
                action: 'upload.php',
                debug: true
            });
        }

        // in your app create uploader as soon as the DOM is ready
        // don't wait for the window to load
        window.onload = createUploader;
    </script>


<!-- end upload script -->
</form>
</div>
</div>


<? include("footer.php"); ?>
