		<div class="push"></div>
<? // Begin navigation ?>
<div id="footer-holder">&nbsp;</div>
<div id="footer-wrapper">
	<div id="nav" class="nav"> 
		<ul id="navigation" class="navigation"> 
			<? if($_SESSION['is_logged_in'] == "on"){
				echo "<li onclick=\"location.href='/home'\" class=\"nav_item";
				if (strstr($_SERVER['REQUEST_URI'], 'home')){
					echo "_now";
				};
				echo "\">Home</li>";
			};?>
			<li onclick="location.href='/portfolio'" class="nav_item<?php if (strstr($_SERVER['REQUEST_URI'], "portfolio")) { echo "_now"; }; ?>">Portfolio</li> 		
			<li onclick="location.href='/services'" class="nav_item<?php if  (strstr($_SERVER['REQUEST_URI'],"services" )) { echo "_now"; }; ?>">Services</li> 
			<li onclick="location.href='/expectations'" class="nav_item<?php if  (strstr($_SERVER['REQUEST_URI'],"expectations")) { echo "_now"; }; ?>">Expectations</li> 
			<li onclick="location.href='/contact'" class="nav_item<?php if (strstr($_SERVER['REQUEST_URI'],"contact" )) { echo "_now"; }; ?>">Contact</li> 
		</ul> 
	</div> 
<? // End navigation ?>
 
	<footer>
			<br /><br />
		<div class="footer_text">&copy;&nbsp;2010-<?php echo date("Y");?>&nbsp;Hans Kokx. All rights reserved&nbsp;-&nbsp;
			<a href="/disclaimer.php">Disclaimer</a>&nbsp;-&nbsp; 
			<a href="http://validator.w3.org/check?uri=<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>&amp;charset=%28detect+automatically%29&amp;doctype=Inline&amp;group=0">
				<img src="/assets/images/html5icon.png" style="vertical-align: middle; border: 0; margin-top: -5px;" alt="HTML5 W3C validated" />
			</a>
			<br /><br />
		</div>
	</footer>
</div>
<? // Woopra Code Start ?>
	<script type="text/javascript" src="//static.woopra.com/js/woopra.v2.js"></script>
	<script type="text/javascript">
	woopraTracker.track();
	</script>
<? // Woopra Code End ?>
	</body>
</html>
