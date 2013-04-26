<div id="form">
	<form action="update_email_prefs_processor.php" method="post" id="updateform">
		<fieldset style="border: none; height: 100%;">

			<input disabled="true" name="email" type="hidden" id="email" class="input" <?php if(isset($_SESSION[email])) { echo 'value="'; echo $_SESSION[email]; echo '"';}?>>

                        <label for="email_pref">Type</label>
                                <input type="radio" name="email_pref" value="html"  <?php if($_SESSION[email_pref] == 'html') { echo 'checked';}?>
										    <?php if(!isset($_SESSION[email_pref])) { echo 'checked';}?>> HTML<br>
                                <input type="radio" name="email_pref" value="text"  <?php if($_SESSION[email_pref] == 'text') { echo 'checked';}?>> Plain Text<br>
                                <br /><br />

			
			<p class="submit"><input type="submit" name="agree" class="big_button" value="Update preferences" /></p>
			<br /><br /><br /><br />
		</fieldset>
	</form>
</div>
