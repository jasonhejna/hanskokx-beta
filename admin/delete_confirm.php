<?php include("header.php"); ?>
<div id="text" style="text-align: center;">
<form action="delete.php" method="post" id="deleteform">
	<? 
	$_SESSION[select_user] = $_POST[select_user];
	echo 'Confirm deletion of '.$_SESSION[select_user];
	?>
	<p class="submit"><input type="submit" name="delete" class="big_button" value="Delete user" /></p>
	<br /><br /><br /><br />
</form>
</div>
<? include("footer.php"); ?>
