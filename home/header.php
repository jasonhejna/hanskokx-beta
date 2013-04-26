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
	<link rel="stylesheet" href="../assets/css/anytimec.css" media="all" type="text/css" />
	<link rel="stylesheet" href="../assets/css/jquery.lightbox-0.5.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../assets/css/cupertino/jquery-ui-1.8.9.custom.css"  type="text/css" />
	<link rel="stylesheet" href="../assets/css/login.css" type="text/css" />

	
		<title>Photography by Hans Kokx</title>
	</head>
	<body class="body no-js">

<?php include "../login_box.php" ?>

<!-- Begin header -->
	<header>
		<div id="title_container" class="title_container user-select-none cursor_default">
			<div id="logo_mini" class="logo_mini" onclick="location.href='/home';" style="cursor:pointer;"></div>
			<div class="titletext_container" style="margin-top: 15px;">
				<div class="name">HANS KOKX</div>
				<div class="title">photography</div>
			</div>
		</div>
	</header>
<!-- End header -->
