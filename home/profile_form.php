<div id="form">
	<form action="profile_processor.php" method="post">
		<fieldset style="border: none; height: auto; top: 15px; width: auto;">

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

			<p class="submit"><input type="submit" style="width: 96%;" name="agree" class="big_button" value="Update profile" /></p>
		</fieldset>
	</form>
	<br /><br />
</div>
