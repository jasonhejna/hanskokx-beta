<div id="container" style="margin-top: 0; left: 50%; margin-left: -300px;">
        <div class="container_title" >Please log in</div>
        <div id="profile_content">
		<form action="login_processor.php" method="post">
       		       	<fieldset class="login_page">
				<br />
				<input name="redir" type="hidden" id="redir" value="<? echo $_GET[redir]; ?>" ?>
                        	<input name="username" type="text" id="username" class="input" placeholder="Email address" /><br />
                        	<input name="password" type="password" id="password" class="input" placeholder="Password" style="margin-top: 5px;"/>
				<p class="forgot" style="margin-top: 10px;">
					<a href="/reset" id="resend_password_link">Forgot your password?</a>
					&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/signup" >Need an account?</a>
				</p>
                        	<input type="submit" value="Login" class="login_button" style="display: inline block; width: 175px; height: 35px; position: relative; left: 50%; margin-left: -87.5px; top: 5px; margin-bottom: 15px; font-size: 18px;"/>
                	</fieldset>
       		</form>
	</div>
</div>
