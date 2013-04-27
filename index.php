<?
# Set up the session
session_start();

# Global configuration
include 'config.php';

echo $doctype;
echo $favicon;
head();
?>


<body class="body no-js">

<?php include "login_box.php" ?>
<!-- Begin header -->
	<header>
		<div id="title_container_big" class="title_container_big">
			<div id="logo" class="logo" onclick="location.href='/';" style="cursor:pointer;"></div>
			<div class="welcome_text user-select-none cursor_default">
				<div class="name">HANS KOKX</div>
				<div class="title">photography</div>
				<div class="clear"></div>
			</div>
		</div>
	</header>
<!-- End header -->
<!-- Begin services -->
	<div id="services" class="tagline">
		<div class="title user-select-none cursor_default">Candid portraits of real moments.</div>
	</div>
<!-- End services -->

<?php include('footer.php'); ?>
