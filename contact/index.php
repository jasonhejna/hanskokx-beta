<?php include("../header.php"); ?>
<div id="container" style="margin-top: 100px;">
  <div class="container_title">&nbsp;&nbsp;&nbsp;Contact Me</div>
  <div id="container_content">
	<form action="submit.php" method="post" id="contactform">
		<fieldset style="height: auto; top: 0px; margin-top: 10px; margin-bottom: 10px;">
			<label for="name">Name</label> <input name="name_required_alphanumeric" type="text" id="name" class="input" <?php if(isset($_SESSION[name])) { echo "value=".$_SESSION[name];}?>><br /><br />
			<label for="email">E-mail</label> <input name="email_required_emailaddress" type="email" id="email" class="input" <?php if(isset($_SESSION[email])) { echo "value=".$_SESSION[email];}?>><br /><br />
			<label>Message</label> <textarea name="message" cols=35 rows=6 class="textarea"><?php if(isset($_SESSION[message])) { echo $_SESSION[message];}?></textarea><br /><br />
			<h2>Are you Human?</h2>
			<label for="turing" class="turing" style="margin-left: -50px;">What is 5+3?</label> <input name="turing" type="text" id="turing" class="input" maxlength="1"><br /><br />
                        <input type="submit" value="Submit" class="button" style="top: 0px; width: 125px; height: 35px; display: inline block; position: relative; margin-left: -62.5px"/>

		</fieldset>
	</form>
	</div>
</div>

<?php include("../footer.php"); ?>
