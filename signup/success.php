<?php include("../header.php"); ?>
<?php session_start(); ?>
<?php unset($_SESSION[error]); ?>
<div id="text" style="text-align: center;">
	Your account has been created!<br />
	Please check your email for a confirmation and login instructions.<br />
</div>
<?php include("../footer.php"); ?>