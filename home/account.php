<script src="../assets/js/showhide.js" type="text/javascript"></script>
<div style="display:block; float: left; width: 100%;">
	<div id="container" style="min-height: 0px; margin-top: 10px; position: relative;">
		<div class="container_title" id="profile_title" onclick="showstuff('profile');" onmouseover="showstuff('profile');" onmouseout="hidestuff('profile');">&nbsp;&nbsp;&nbsp;My Profile</div>
		<div id="profile_more" onclick="showstuff('profile');" onmouseover="showstuff('profile');" onmouseout="hidestuff('profile');" style="overflow: hidden; height: 0px; text-align: center;">...</div>
		<div id="profile_content" style="height: 0px; overflow: hidden; position: relative;"><? include('profile_form.php'); ?></div>
	</div>
</div>

<div style="display:block; float: left; width: 100%;">
        <div id="container" style="min-height: 0px; margin-top: 10px; position: relative;">
                <div class="container_title" id="password_form_title" onclick="showstuff('password_form');" onmouseover="showstuff('password_form');" onmouseout="hidestuff('password_form');">&nbsp;&nbsp;&nbsp;My Password</div>
                <div id="password_form_more" onclick="showstuff('password_form');" onmouseover="showstuff('password_form');" onmouseout="hidestuff('password_form');" style="overflow: hidden; height: 0px; text-align: center;">...</div>
                <div id="password_form_content" style="height: 0px; overflow: hidden; position: relative;"><? include('password_form.php'); ?></div>
        </div>
</div>

<div style="display:block; float: left; width: 100%;">
        <div id="container" style="min-height: 0px; margin-top: 10px; position: relative;">
                <div class="container_title" id="email_prefs_title" onclick="showstuff('email_prefs');" onmouseover="showstuff('email_prefs');" onmouseout="hidestuff('email_prefs');">&nbsp;&nbsp;&nbsp;My Email Preferences</div>
                <div id="email_prefs_more" onclick="showstuff('email_prefs');" onmouseover="showstuff('email_prefs');" onmouseout="hidestuff('email_prefs');" style="overflow: hidden; height: 0px; text-align: center;">...</div>
                <div id="email_prefs_content" style="height: 0px; overflow: hidden; position: relative;"><? include('email_prefs_form.php'); ?></div>
        </div>
</div>

