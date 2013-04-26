<?php
include("header.php");
// Check to see if we just updated our profile, and display a confirmation if we did
if ( isset($_SESSION[updated])) {
	echo '
		<script type="text/javascript">
    		$(function() {
        		$.notifyBar({ cls: "success", html: "Profile has been successfully updated."});
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

$result = $db->query("SELECT client_id,is_admin,do_reset,Name,Email FROM Clients");
?>
<?php include('users_nav.php'); ?>
<div id="container">
  <div class="container_title">&nbsp;&nbsp;&nbsp;Edit Users</div>
  <div id="container_content">
<form action="update_processor.php" method="post" id="contactform">

<label for="select">&nbsp;</label>
<br />
<select id="select_user" name="select_user" class="input" style="margin-left: 10px;">
<option disabled>Choose a user...</option>
<?
      while ($result->valid()) {
              $row = $result->current();
              echo '<option value='.$row[client_id].'>';
              if ( $row[is_admin] == "on" ) { echo "* "; };
              if ( $row[do_reset] == "on" ) { echo "? "; };
              echo $row[Name].' - '.$row[Email].'</option>';

              $result->next();
      }
unset($db);
?>
</select>
</form>
<script type="text/javascript">

jQuery(function($){

$("select#select_user").bind("change", function(){
       var user_id = $("option:selected", this).val();

       $.post("getuser.php", "user_id=" + user_id, processResults, 'json');
});

});

function processResults(data){
	mydata = data;
        $("#id_").val("");
        $("#last_login_").val("");
        $("#name_").val("");
        $("#phone_").val("");
        $("#email_").val("");
        $("#address_").text("");
        $("#discount_").val("");
        $("#total_sessions_").val("");

	$("#id_").val(mydata[0].client_id);
	$("#last_login_").val(mydata[0].last_login);
	$("#name_").val(mydata[0].Name);
	$("#phone_").val(mydata[0].Phone);
	$("#email_").val(mydata[0].Email);
	$("#address_").text(mydata[0].Address);
	$("#is_admin_").attr('checked', Boolean(mydata[0].is_admin));
	$("#reset_").attr('checked', Boolean(mydata[0].do_reset));
	$("#discount_").val(mydata[0].Discount);
	$("#total_sessions_").val(mydata[0].Total_Sessions);
}

</script>
<? include("user_data.php"); ?>
</div>
</div>
<? include("footer.php"); ?>
