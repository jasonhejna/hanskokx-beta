<?php if(!$_SESSION['is_logged_in'] == 'on') { echo '
<div id="login_container">
  <div id="topnav" class="topnav">
    <a href="http://'.$_SERVER['HTTP_HOST'].'/signup">Need an account?</a> <a href="/login" class="signin"><span>Sign in</span></a>
  </div>
  <fieldset id="signin_menu">
    <form method="post" id="signin" action="/login/login_processor.php">
      <label class="login_label" for="username">Email</label>
      <input id="username" name="username" value="" title="username" tabindex="4" type="text">
      <p>
        <label class="login_label" for="password">Password</label>
        <input id="password" name="password" value="" title="password" tabindex="5" type="password">
      </p>
      <p class="remember">
        <input id="signin_submit" value="Sign in" tabindex="6" type="submit">
        <!-- <input id="remember" name="remember_me" value="1" tabindex="7" type="checkbox">
        <label class="login_label" for="remember">Remember me</label> -->
      </p>
      <p class="forgot"> <a href="/reset" id="resend_password_link">Forgot your password?</a> </p>
    </form>
  </fieldset>
</div>
';}
?>

<?php if($_SESSION['is_logged_in'] == 'on') { echo '
<div id="login_container">
  <div id="topnav" class="topnav">
    <input type="button" value="Sign out" class="signup" onclick="window.location=\'http://'.$_SERVER['HTTP_HOST'].'/logout.php\'"/>
  </div>
</div>
';}
?>
