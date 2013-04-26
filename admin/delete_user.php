<?php
include("header.php");
// Check to see if we just updated our profile, and display a confirmation if we did
if ( isset($_SESSION[updated])) {
	echo '
		<script type="text/javascript">
    		$(function() {
        		$.notifyBar({ cls: "success", html: "User was deleted."});
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
<?php include('users_nav.php'); ?>
<div id="container" style="min-height: 100px;">
  <div class="container_title">&nbsp;&nbsp;&nbsp;Delete User</div>
  <div id="container_content">
<form action="delete_confirm.php" method="post" id="deleteform">
<br />
<label for="select">Delete who?</label>
<select id="select_user" name="select_user" class="input">
<option disabled>Choose a user...</option>
<?
      while ($result->valid()) {
              $row = $result->current();
              echo '<option value='.$row[Email].'>';
              if ( $row[is_admin] == "on" ) { echo "* "; };
              if ( $row[do_reset] == "on" ) { echo "? "; };
              echo $row[Name].' - '.$row[Email].'</option>';

              $result->next();
      }
unset($db);
?>
</select>
			<p class="submit"><input type="submit" name="delete" class="big_button" value="Delete user" style="margin-bottom: 35px; width: 95%;"/></p>
</form>
</div>
</div>
<? include("footer.php"); ?>
