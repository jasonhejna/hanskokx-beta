<div id="form">
	<form action="email_update_processor.php" method="post" id="updateform">
		<fieldset style="border: none; height: 100%;">

			<label for="email">E-mail</label>
				<input disabled="true" name="email" type="email" id="email" class="input" <?php if(isset($_SESSION[email])) { echo 'value="'; echo $_SESSION[email]; echo '"';}?>>
				<br /><br />

			<p class="submit"><input type="submit" name="agree" class="big_button" value="Update profile" /></p>
			<br /><br /><br /><br />
		</fieldset>
	</form>
</div>
