<?
	ob_start("ob_gzhandler");
	session_start();
	include_once('../assets/includes/config.php');
?>

<!DOCTYPE html>
<link rel="icon" type="image/png" href="../assets/images/favicon.png">

<!-- Javascript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<script src="../assets/js/jquery.validate.pack.js" type="text/javascript"></script>
	<script src="../assets/js/html5.js" type="text/javascript"></script>
	<script src="../assets/js/jquery.notifyBar.js" type="text/javascript"></script>
	<script src="../assets/js/motionpack.js" type="text/javascript"></script>
	<script src="../assets/js/modernizr-1.6.min.js" type="text/javascript"></script>
	<script src="../assets/js/anytimec.js" type="text/javascript"></script>
	<script src="../assets/js/anytimetz.js" type="text/javascript"></script>
	<script src="../assets/js/jquery.lightbox-0.5.min.js" type="text/javascript"></script>
	<script src="../assets/js/jquery-ui-1.8.9.custom.min.js" type="text/javascript"></script>

<!-- Stylesheets -->
	<link rel="stylesheet" href="../assets/css/styles.css" media="all" type="text/css" />
	<link rel="stylesheet" href="../assets/css/home.css" media="all" type="text/css" />
	<link rel="stylesheet" href="../assets/css/anytimec.css" media="all" type="text/css" />
	<link rel="stylesheet" href="../assets/css/jquery.lightbox-0.5.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../assets/css/cupertino/jquery-ui-1.8.9.custom.css"  type="text/css" />
	<link rel="stylesheet" href="../assets/css/login.css" type="text/css" />

	<script type="text/javascript"> 
	function toggle() {
		var menu = document.getElementById("profile_dropdown");
		var button = document.getElementById("profile_dropdown_button");
		if(menu.style.display == "block") {
	    	menu.style.display = "none";
	    	if(button.className == "profile_dropdown_button_down") {
	    		button.className = "user_select_none";
	    		button.style.backgroundImage = "";
	    	}
	    	return
	  	}
		else {
				if(navigator.appName == 'Microsoft Internet Explorer'){
					button.setAttribute( 'class', 'profile_dropdown_button_down' );
					menu.setAttribute( 'class', 'highlight' );
				} else {
					button.setAttribute( 'className', 'profile_dropdown_button_down' );  
					menu.setAttribute( 'className', 'highlight' );  
					
				}
			menu.style.display = "block";
			button.className = "profile_dropdown_button_down";
    		button.style.backgroundImage = "url(/assets/images/profile_hover.png)";
			
			return
		}
	} 
	</script>

		<title>Photography by Hans Kokx</title>
	</head>
	
	<body class="body no-js">

<!-- Begin header -->
	<header class="user_select_none">
		<div class="header">
			<div class="home_logo" onclick="location.href='/home';" style="cursor: pointer;"></div>
			
			<div id="profile_dropdown_button" onclick="toggle();" class="user_select_none">
				<div id="profile_dropdown">
				
					<div id="menu_profile" class="profile_dropdown_item" onclick="window.location='http://<? echo $_SERVER['HTTP_HOST']; ?>/home/?q=account&amp;s=profile'">
						<div id="menu_profile_icon"></div>
						<div class="bold_text" style="display: inline-block;">
								<?
									if(isset($_SESSION[name])) {
											echo $_SESSION[name];
										} else {
											echo "Your Name";
										}
								?>
							<br />
							<div id="menu_profile_desc" class="light_text">View my profile page</div>
						</div>
					</div>
				
					<div class="menu_divider"></div>
					
					<div id="menu_settings" class="profile_dropdown_item" onclick="window.location='http://<? echo $_SERVER['HTTP_HOST']; ?>/home/?q=account&amp;s=settings'">Settings</div>
					<div class="menu_divider"></div>
					
					<div id="menu_logout" class="profile_dropdown_item" onclick="window.location='http://<? echo $_SERVER['HTTP_HOST']; ?>/logout.php'" >Sign out</div>
				</div>
			</div>

		</div>
	</header>
<!-- End header -->
