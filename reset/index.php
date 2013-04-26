<?php
include("../header.php");
 session_start(); 
if(isset($_SESSION[error])) {
 echo '<script type="text/javascript">
  $(function() {
   $.notifyBar({ cls: "error", html: "'.$_SESSION[error].'"});
   }); 
 </script>
 ';} 

 if(isset($_SESSION[updated])) {
 echo '<script type="text/javascript">
  $(function() {
   $.notifyBar({ cls: "success", html: "'.$_SESSION[updated].'"});
   }); 
 </script>
 ';} 

if(!isset($_SESSION[updated])) {
echo '
<div id="container" style="margin-top: 100px;">
  <div class="container_title">&nbsp;&nbsp;&nbsp;Reset my password</div>
  <div id="container_content">
 <form action="forgot_processor.php" method="post" id="forgotform">
  <fieldset style="border: none; height: 100%;">
   
   <label for="email">E-mail</label>
    <input required name="email" type="email" id="email" class="input">

   <p class="submit"><input type="submit" name="submit" class="big_button" value="Send reset email" style="margin-bottom: 65px;" /></p>
  </fieldset>
 </form>
</div>
</div>
';
};
if(isset($_SESSION[updated])) {
  echo '
 <div id="container" style="margin-top: 100px;">
  <div class="container_title">&nbsp;&nbsp;&nbsp;Check your email.</div>
  <div id="container_content" style="margin: 10px;">
If the e-mail address you entered is associated with a customer account in our records, you will receive an e-mail from us with instructions for resetting your password. If you don\'t receive this e-mail, please check your junk mail folder or visit the contact page to contact Customer Service for further assistance. 
  </div>  
</div>
';
};
unset($_SESSION[error]);
unset($_SESSION[updated]);
include("../footer.php");
?>
