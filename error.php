<?php include("header.php"); ?>
<?php session_start(); ?>
<?
if(isset($_SESSION[error])) {
 echo '<script type="text/javascript">
  $(function() {
   $.notifyBar({ cls: "error", html: "'.$_SESSION[error].'"});
   }); 
 </script>
 ';} 
?>
<div id="text" style="text-align: center;">
<? echo $_SESSION[error];
unset($_SESSION[error]);
?>
<br />
There was an error with your request.
</div>

<?php
include("footer.php");
?>
