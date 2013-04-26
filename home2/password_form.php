<div id="form">
        <form action="password_processor.php" method="post" id="updateform">
                <fieldset style="border: none; height: auto; width: auto; top: 15px;">

                        <label for="current_password">Current</label>
                                <input required name="current_password" type="password" id="current_password" class="input" value="" style=" <? if ($_SESSION[password_err]=="current_password"){ echo "border: 2px solid red;";}?>">
                                <br /><br />

                        <label for="password">New</label>
                                <input required name="password" type="password" id="password" class="input" value="" style=" <? if ($_SESSION[password_err]=="password"){ echo "border: 2px solid red;";}?>">
                                <br /><br />
                        <label for="password2">Confirm</label>
                                <input required name="password2" type="password" id="password" class="input" value="" style=" <? if ($_SESSION[password_err]=="password"){ echo "border: 2px solid red;";}?>">
                                <br /><br />

                        <p class="submit"><input type="submit" style="width: 96%; margin-left: auto; margin-right: auto;" name="agree" class="big_button" value="Update password" /></p>
                </fieldset>
        </form>
	<br /><br />
</div>

