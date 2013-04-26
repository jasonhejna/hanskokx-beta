<div id="form" style="margin-bottom: 50px;">
	<form action="update_first_processor.php" method="post" id="updateform">
		<fieldset style="border: none; height: 100%;">

			<label for="email">E-mail</label>
				<input disabled="true" name="email" type="email" id="email" class="input" <?php if(isset($_SESSION[email])) { echo 'value="'; echo $_SESSION[email]; echo '"';}?>>
				<br /><br />
			
			<label for="name">Name</label>
				<input name="name" type="text" id="name" class="input" <?php if(isset($_SESSION[name])) { echo 'value="'; echo $_SESSION[name]; echo '"';}?>>
				<br /><br />
			

			<label for="phone">Phone</label>
				<input name="phone" type="phone" id="phone" class="input" <?php if(isset($_SESSION[phone])) { echo 'value="'; echo $_SESSION[phone]; echo '"';}?>>
				<br /><br />
			
			<label for="address">Address</label>
				<textarea name="address" cols=35 rows=4 class="textarea"><?php if(isset($_SESSION[address])) { echo $_SESSION[address];}?></textarea>
				<br /><br />

                        <label for="email_pref">Email Preference</label>
				<input type="radio" name="email_pref" value="html" checked> HTML<br>
				<input type="radio" name="email_pref" value="text"> Plain Text<br>
                                <br /><br />

                        <label style="width: 100%; text-align: left;">How did you hear about me?</label>
                                <br />
                                        <select name="reference" class="input" style="width: 100%;">
                                                <option value ="oops" disabled>Choose one...</option>
                                                <option value ="Word of mouth" <?php if($_SESSION[reference] == "Word of mouth") { echo " selected";}?>>Word of mouth</option>
                                                <option value ="Search engine" <?php if($_SESSION[reference] == "Search engine") { echo " selected";}?>>Search engine (Google, Yahoo!, etc)</option>
                                                <option value ="News" <?php if($_SESSION[reference] == "News") { echo " selected";}?>>Local news</option>
                                                <option value ="Other" <?php if($_SESSION[reference] == "Other") { echo " selected";}?>>Any other way</option>
                                        </select>
                                <br /><br />


			<p class="submit"><input type="submit" name="agree" class="big_button" value="Update profile" /></p>
			<br /><br /><br /><br />
		</fieldset>
	</form>
</div>
