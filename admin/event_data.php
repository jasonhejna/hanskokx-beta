		<fieldset style="border: none; height: 100%;">
                        <label for="title">Title</label>
                                <input name="event_title" type="text" id="event_title" class="input" value="" />
                                <br /><br />

			<label for="public">Public Link</label>
				<input name="public" type="text" id="public" class="input" value="" />
				<br /><br />

			<label for="date">Date</label>
				<input name="date" type="text" id="date" class="input" value="" />
				<br /><br />
					
			<label for="start_time">Starts</label>
				<input name="start_time" type="text" id="start_time" style="width: 175px;" class="input" value="" />
				<br /><br />
			
			<label for="end_time">Ends</label>
				<input name="end_time" type="text" id="end_time" style="width: 175px;" class="input" value="" />
				<br /><br />
			
			<label for="location">Address</label>
				<textarea name="address" id="address" cols=35 rows=6 class="textarea"></textarea>
				<br /><br />

			<label for="notes">Notes</label>
				<textarea name="notes" id="notes" cols=35 rows=6 class="textarea"></textarea>
				<br /><br />

				<input name="id" type="hidden" id="id" class="input"></input>
				<input name="original_date" type="hidden" id="original_date" class="input"></input>
			
			<p class="submit"><input type="submit" name="update" class="big_button" value="Update Event" /></p>
			<br /><br /><br /><br />
		</fieldset>
	</form>
</div>
<script type="text/javascript">
  AnyTime.picker( "date",
      { format: "%Y-%m-%d", firstDOW: 1 } );
  $("#start_time").AnyTime_picker(
      { format: "%l:%i %p" } );
  $("#end_time").AnyTime_picker(
      { format: "%l:%i %p" } );
</script>
