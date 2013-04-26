<?php include("../header.php"); ?>
<?php 
session_start(); 
?>

<div id="container" style="margin-top: 100px; left: 50%; margin-left: -300px;">
        <div class="container_title" >&nbsp;&nbsp;&nbsp;Create an account</div>
        <div id="profile_content">
                <form autocomplete="off" action="/signup/process_user.php" method="post">
                        <fieldset class="login_page">
                                <br />
    <!--[if IE]>
      <label for=email style="width: 95.5%; margin-left: 5px;">Email Address</label><br />
    <![endif]-->

    				<input required name="email" type="email" id="email" class="input" style="width: 95.5%; margin-left: 5px;  <? if ($_SESSION[email_err]=="email"){ echo "border: 2px solid red;";}?>" placeholder="Email Address"
    				<?
      					if (isset($_SESSION[email]))
        				{
          				echo "value=\"$_SESSION[email]\"";
        				}
    				?>
    				>
				<br /><br />

                                <input name="redir" type="hidden" id="redir" value="<? echo $_GET[redir]; ?>" />
    <!--[if IE]>
      <label for=password style="width: 46%; margin-left: 5px;">Password</label><label for=password2 style="width: 46%">(Repeat)</label><br />
    <![endif]-->
       				<input name="password1" type="password" id="password1" class="input" style="width: 46%; margin-left: 5px;  <? if ($_SESSION[password_err]=="password"){ echo "border: 2px solid red;";}?>" placeholder="Password">
			        <input name="password2" type="password" id="password2" class="input" style="width: 46%; <? if ($_SESSION[password_err]=="password"){ echo "border: 2px solid red;";}?>" placeholder="Confirm Password">
                                <input type="submit" value="Signup now" class="login_button" style="display: inline block; width: 150px; height: 35px; position: relative; left: 50%; margin-left: -75px; top: 10px; margin-bottom: 15px; font-size: 18px;"/>
                        </fieldset>
                </form>
        </div>
</div>

<?php
if(isset($_SESSION[email_err]) || ($_SESSION[password_err])){
        unset($_SESSION[email_err]);
        unset($_SESSION[password_err]);
}
include("../footer.php");
?>

