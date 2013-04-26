<div id="form">
	<form action="update_processor.php" method="post" id="updateform">
		<fieldset style="border: none; height: 100%;">
			<label for="name">Name</label>
				<input name="name_" type="text" id="name_" class="input">
				<br /><br />
			
                        <label for="last_login">Last login</label>
                                <input name="last_login_" type="text" id="last_login_" class="input" disabled="disabled">
                                <br /><br />

			<label for="phone">Phone</label>
				<input name="phone_" type="phone" id="phone_" class="input">
				<br /><br />
			
			<label for="email">E-mail</label>
				<input required name="email_" id="email_" class="input">
				<br /><br />
				
			<label for="password">Password</label>
				<input name="password_" type="text" id="password" class="input" value="">
				<br /><br />

			<label for="address">Address</label>
				<textarea name="address_" cols=35 rows=4 class="textarea" id="address_"></textarea>
				<br /><br />

			<label for="discount">Discount</label>
				<select name="discount_" id="discount_" class="input">
					<option value="0">0%</option>
					<option value="5">5%</option>
					<option value="10">10%</option>
					<option value="15">15%</option>
				</select>
				<br /><br />

			<label for="total_sessions">Total Sessions</label>
				<input name="total_sessions_" type="text" id="total_sessions_" class="input">
				<br /><br />

			<label for="is_admin">Administrator?</label>
				<input type="checkbox" name="is_admin_" id="is_admin_" />
				<br /><br />

			<label for="reset">Reset?</label>
				<input type="checkbox" name="reset_" id="reset_" />
				<br /><br />			

				<input name="id_" type="hidden" id="id_" class="input">
			
			<p class="submit"><input type="submit" name="update" class="big_button" value="Update profile" /></p>
			<br /><br /><br /><br />
		</fieldset>
	</form>
</div>
