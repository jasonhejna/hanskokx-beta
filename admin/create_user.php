<?php
// This is the form we use to create new users. 
include("header.php");
if(isset($_SESSION[error])) {
 echo '<script type="text/javascript">
  $(function() {
   $.notifyBar({ cls: "error", html: "'.$_SESSION[error].'"});
   }); 
 </script>
 ';} 
 unset($_SESSION[error]);
?>
<?php include('users_nav.php'); ?>
<div id="container">
  <div class="container_title">&nbsp;&nbsp;&nbsp;Create User</div>
  <div id="container_content">
 <form action="process_user.php" method="post" id="createuserform">
  <fieldset style="border: none; height: 100%;">

   <label for="name">Name</label>
    <input name="name" type="text" id="name" class="input">
    <br /><br />
   
   <label for="email">E-mail</label>
    <input required name="email"  id="email" class="input">
<br /><br />

   <label for="password">Password (optional)</label>
    <input name="password" type="password" id="password" class="input">
<br /><br /><br />

   <p class="submit"><input type="submit" name="submit" class="big_button" value="Submit" style="margin-bottom: 65px;" /></p>
  </fieldset>
 </form>
</div>

<?php include("footer.php"); ?>
