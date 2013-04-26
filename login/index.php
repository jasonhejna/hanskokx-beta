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
unset($_SESSION[error]);
?>
<div id="text" style="text-align: center;">
<? include("login.php"); ?>
</div>
<?php include("../footer.php"); ?>
