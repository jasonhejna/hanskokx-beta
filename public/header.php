<?
ob_start("ob_gzhandler");
 // Set up the session
	session_start();

$dbhandle = sqlite_open('../db/clients.db', 0666, $error);
$query = "SELECT * FROM Events WHERE public_string='".$_GET[event]."'";
$result = sqlite_query($dbhandle, $query);
$row = sqlite_fetch_array($result, SQLITE_ASSOC);

?>

<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="icon" type="image/png" href="../assets/images/favicon.png">

<!-- Javascript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="../assets/js/html5.js" type="text/javascript"></script>
	<script src="../assets/js/prototype.js" type="text/javascript"></script>
	<script src="../assets/js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
	<script src="../assets/js/lightbox.js" type="text/javascript"></script>

<!-- Stylesheets -->
	<link rel="stylesheet" href="../assets/css/styles.css" media="all" type="text/css" />
	<link rel="stylesheet" href="../assets/css/lightbox.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="../assets/css/login.css" type="text/css" />

		<title><? echo $row[title] ?> - Photography by Hans Kokx</title>
	</head>
	<body class="body no-js">

<?php include "../login_box.php" ?>

<!-- Begin header -->
	<header>
		<div id="title_container" class="title_container">
			<div id="logo_mini" class="logo_mini" onclick="location.href='/';" style="cursor:pointer;"></div>
			<div id="titletext_container" class="titletext_container" style="text-align: left;  width: 99%;">
				<div class="name">HANS KOKX</div>
				<div class="title">photography</div>
			</div>
		</div>
	</header>
<!-- End header -->
