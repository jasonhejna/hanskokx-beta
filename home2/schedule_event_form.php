	<form action="schedule_event_processor.php" method="post" id="contactform">
		<fieldset style="border: none; height: auto; top: 15px;">
			<h2>What should we name this event?</h2>
                        <hr style="border: none 0; border-top: 1px dotted gray; height: 1px;" /><br />

                        <label for="Title">Title</label>
                                <input name="title" type="text" id="title" class="input" value="<?php if(isset($_SESSION[title])) { echo $_SESSION[title];}?><?php if(!isset($_SESSION[title])) { echo "Untitled Event"; }?>" />
                                <br /><br />

		
			<h2>Event Information</h2>
			<hr style="border: none 0; border-top: 1px dotted gray; height: 1px;" /><br />
			
			<label>Event type</label>
					<select name="event_type" class="input">
						<option value ="" disabled>Choose one...</option>
						<option value ="Engagement" <?php if($_SESSION[event_type] == "Engagement") { echo " selected";}?>>Engagement</option>
						<option value ="Wedding" <?php if($_SESSION[event_type] == "Wedding") { echo " selected";}?>>Wedding</option>
						<option value ="Life" <?php if($_SESSION[event_type] == "Life") { echo " selected";}?>>Life</option>
						<option value ="Other" <?php if($_SESSION[event_type] == "Other") { echo " selected";}?>>Other</option>
					</select>
			<br /><br />
			
			<label for="date">Date</label>
				<input name="date" type="text" id="date" class="input" value="<?php if(isset($_SESSION[date])) { echo $_SESSION[date];}?><?php if(!isset($_SESSION[date])) { echo date("Y-m-d");}?>" />
				<br /><br />
			
			<label for="start_time">Begins at</label>
				<input name="start_time" type="text" id="start_time" style="width: 175px;" class="input" value="<?php if(isset($_SESSION[start_time])) { echo $_SESSION[start_time];}?>" />
				<br /><br />
			
			<label for="end_time">Ends at</label>
				<input name="end_time" type="text" id="end_time" style="width: 175px;" class="input" value="<?php if(isset($_SESSION[end_time])) { echo $_SESSION[end_time];}?>" />
				<br /><br />
			
			<label>Location</label>
				<textarea name="location" cols=35 rows=6 class="textarea"><?php if(isset($_SESSION[location])) { echo $_SESSION[location];}?></textarea>
				<br /><br />
			
			<h2>Other information</h2>
			<hr style="border: none 0; border-top: 1px dotted gray; height: 1px;" /><br />
			
			<label>Notes</label>
				<textarea name="notes" cols=35 rows=6 class="textarea"><?php if(isset($_SESSION[message])) { echo $_SESSION[message];}?></textarea>
				<br /><br />

			<h2>Terms and Conditions</h2>
			<hr style="border: none 0; border-top: 1px dotted gray; height: 1px;" /><br />
			This form does not constitute a binding contract or a promise of services.  The data sent to Hans Kokx Photography using this form will be used to schedule a session, at which point a contract will be signed by all parties.

			
			<br /><br />
			<p class="submit"><input type="submit" name="agree" class="agree" value="I agree to the terms and conditions" /></p>
		</fieldset>
	</form>
			<br /><br />
