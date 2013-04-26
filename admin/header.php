<?php 
// This is the header for the admin pages.

// Let's check and see if the user is an admin.  If they are, all is well - let them go.  If not, send them to error.php.
session_start();

if($_SESSION[is_admin] != "on" || !isset($_SESSION[is_admin])) {
	$_SESSION[error] = "Unathorized access!";
	header('Location: /error.php');
};

// Ok, they've passed the admin check.

// We can send this page compressed, so let's do that.
ob_start("ob_gzhandler");

// Get current page's filename or path, and store it as curPageName()
function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
?>
<!DOCTYPE html>
<link rel="icon" type="image/png" href="../assets/images/favicon.png">

<!-- Javascript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="/assets/js/jquery.validate.pack.js" type="text/javascript"></script>
	<script src="/assets/js/html5.js" type="text/javascript"></script>
	<script src="/assets/js/jquery.notifyBar.js" type="text/javascript"></script>
	<script src="/assets/js/motionpack.js" language="JavaScript"></script>
	<script src="/assets/js/modernizr-1.6.min.js" language="JavaScript"></script>
	<script src="/assets/js/anytimec.js" language="JavaScript"></script>
	<script src="/assets/js/anytimetz.js" language="JavaScript"></script>

<!-- Stylesheets -->
	<link rel="stylesheet" href="/assets/css/styles.css" media="all" type="text/css" />
	<link rel="stylesheet" href="/assets/css/anytimec.css" media="all" type="text/css" />
	<link rel="stylesheet" href="/assets/css/login.css" media="all" type="text/css" />
	<link rel="stylesheet" href="/assets/css/fileuploader.css" media="all" type="text/css" />

	<head>
		<title>Admin | <?php echo ucwords(str_replace(".php", "", curPageName())); ?></title>

	</head>
	<body class="body no-js" onload="load()" onunload="GUnload()">

<?php include "../login_box.php" ?> 

<!-- Begin header -->
	<header>
		<div id="title_container" class="title_container">
			<div id="titletext_container" class="titletext_container" style="text-align: left;  width: 99%;">
				<div id="title" class="name">HANS KOKX</div>
				<div id="title" class="title">photography</div>
				<div id="title" class="name"><a href="/admin">ADMIN PANEL</a></div>
			</div>
		</div>
	</header>
<!-- End header -->

<!-- This is the top level navigation for the admin area -->
<div style="margin-top: 100px; width: 100%; min-width: 700px; text-align: center;">
<div style="display: inline-block;">
        <a href="users.php" class="nav_button<?php if ( curPageName() == "users.php" || curPageName() == "create_user.php"  || curPageName() == "view_users.php" || curPageName() == "delete_user.php" )
        { echo "_now"; }; ?>">
                <span style="text-align: center; position: relative; width: 100%; top: 30%;">
                        Manage my<br /><span style="font-weight: bold; font-size: 18pt;">users</span>
                </span>
        </a>

        <a href="manage_events.php" class="nav_button<?php if ( curPageName() == "manage_events.php" || curPageName() == "create_event.php" ||
        curPageName() == "view_events.php" || curPageName() == "delete_event.php" || curPageName() == "upload_pictures.php") { echo "_now"; }; ?>">
                <span style="text-align: center; position: relative; width: 100%; top: 30%;">
                        Manage my<br /><span style="font-weight: bold; font-size: 18pt;">sessions</span>
                </span>
        </a>

</div>
</div>
<!-- 
<ul id="navigation" class="navigation" style="margin-top: 85px;"> 
	<li onclick="location.href='users.php'" id="users" 
	class="nav_item<?php if ( curPageName() == "users.php" || curPageName() == "create_user.php"  || curPageName() == "view_users.php" || curPageName() == "delete_user.php" )
	{ echo "_now"; }; ?>">Manage Users</li> 

	<li onclick="location.href='manage_events.php'" id="manage_events" class="nav_item<?php if ( curPageName() == "manage_events.php" || curPageName() == "create_event.php" ||
	curPageName() == "view_events.php" || curPageName() == "delete_event.php" || curPageName() == "upload_pictures.php") { echo "_now"; }; ?>">Manage Events</li> 

</ul> 
-->
