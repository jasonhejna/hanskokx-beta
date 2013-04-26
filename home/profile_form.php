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
 
                        <label for="country">Country</label>
                                <select name="country" class="input">
                                        <? foreach($countries as $country) {
                                                        print '<option value="'.$country.'">'.$country.'</option>';
                                                }
                                        ?>
                                </select>
                                <br /><br />

                        <label for="address">Address</label>
                                <input name="address" id="address" class="input" <?php if(isset($_SESSION[address])) { echo 'value="'; echo $_SESSION[address]; echo '"';}?>>
                                <br /><br />

                        <label for="address2">Address 2</label>
                                <input name="address2" id="address2" class="input" <?php if(isset($_SESSION[address2])) { echo 'value="'; echo $_SESSION[address2]; echo '"';}?>>
                                <br /><br />

                        <label for="city">City</label>
                                <input name="city" id="city" class="input" <?php if(isset($_SESSION[city])) { echo 'value="'; echo $_SESSION[city]; echo '"';}?>>
                                <br /><br />


                        <label for="state">State</label>
                                <input name="state" id="state" class="input" <?php if(isset($_SESSION[state])) { echo 'value="'; echo $_SESSION[state]; echo '"';}?>>
                                <br /><br />

                        <label for="zip">Zip/Postal</label>
                                <input name="zip" id="zip" class="input" <?php if(isset($_SESSION[zip])) { echo 'value="'; echo $_SESSION[zip]; echo '"';}?>>
                                <br />

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
			<p class="submit"><input type="submit" style="width: 96%;" name="agree" class="big_button" value="Update profile" /></p>
		</fieldset>
	</form>
	<br /><br />
</div>
