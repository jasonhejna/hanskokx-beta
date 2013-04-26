<? include('../header.php');
if ( isset($_SESSION['name'])) {
        $extra = ", ".$_SESSION['name'];
    };
    
echo '<div id="notice" class="notice">Thank you for contacting me'. $extra .'!<br /> I will respond to your inquiry shortly.</div>
		<script type="text/javascript">
    		$(function() {
        		$.notifyBar({ cls: "success", html: "Your message was successfully sent!"});
     		}); 
    	</script>';

include('../footer.php'); ?>
