<div id="form">
	<form action="update_processor.php" method="post" id="updateform">
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
<!-- 
                        <label for="state">State</label>
				<select name="state" class="input">
					<? foreach($states as $state) {
							print '<option value="'.$state.'">'.$state.'</option>';
						}
					?>
				</select>
                                <br /><br />
-->
			<p class="submit"><input type="submit" name="agree" class="big_button" value="Update profile" /></p>
			<br /><br /><br /><br />
		</fieldset>
	</form>
</div>
