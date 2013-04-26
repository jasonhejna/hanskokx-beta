<div id="form">
	<form action="reset_processor.php" method="post" id="updateform">
		<fieldset style="border: none; height: 100%;">

			<label for="email">E-mail</label>
				<input disabled="true" name="email" type="email" id="email" class="input" <?php if(isset($_SESSION[email])) { echo 'value="'; echo $_SESSION[email]; echo '"';}?>>
				<br /><br />
			
			<label for="password">Password</label>
				<input required name="password" type="password" id="password" class="input" value="">
				<br /><br />
			<label for="password2">Confirm</label>
				<input required name="password2" type="password" id="password" class="input" value="">
				<br /><br />

			<p class="submit"><input type="submit" name="agree" class="big_button" value="Update profile" /></p>
			<br /><br /><br /><br />
		</fieldset>
	</form>
</div>
