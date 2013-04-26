<?php include("header.php"); ?>
<?php session_start(); ?>
<?php unset($_SESSION[error]); ?>
<div id="text">
	User has been created successfully!<br />
<?
 $dbhandle = sqlite_open('../db/clients.db', 0666, $error);
 if (!$dbhandle) die ($error);
$query = "SELECT * FROM Clients WHERE Email='$_SESSION[email]'";
$result = sqlite_query($dbhandle, $query);
if (!$result) die("Cannot execute query.");

$row = sqlite_fetch_array($result, SQLITE_ASSOC); 
echo "<br />";
echo "Name: ". $_SESSION[to_name]. "<br />";
echo "Email: ". $_SESSION[to_email]. "<br />";
echo "Password: ". $_SESSION[to_password]. "<br />";
?>
<div id="text"><a href="create_user.php">Create another?</div>

</div>
<?php include("footer.php"); ?>