<?
# Set up the session
session_start();

# Global configuration
include 'config.php';

echo $doctype;
?>
<head>
	<? echo $favicon; ?>

<!-- Javascript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="/assets/js/jquery.validate.pack.js" type="text/javascript"></script>
	<script src="/assets/js/html5.js" type="text/javascript"></script>
	<script src="/assets/js/jquery.notifyBar.js" type="text/javascript"></script>
	<script src="/assets/js/motionpack.js" type="text/javascript"></script>
	<script src="/assets/js/modernizr-1.6.min.js" type="text/javascript"></script>
	<script src="/assets/js/anytimec.js" type="text/javascript"></script>
	<script src="/assets/js/anytimetz.js" type="text/javascript"></script>
<!-- Stylesheets -->
	<link rel="stylesheet" href="/assets/css/styles.css" media="all" type="text/css" />
	<link rel="stylesheet" href="/assets/css/anytimec.css" media="all" type="text/css" />
	<link rel="stylesheet" href="/assets/css/login.css" media="all" type="text/css" />

	<script type="text/javascript">
        $(document).ready(function() {

            $(".signin").click(function(e) {
                e.preventDefault();
                $("fieldset#signin_menu").toggle();
                $(".signin").toggleClass("menu-open");
            });

            $("fieldset#signin_menu").mouseup(function() {
                return false
            });
            $(document).mouseup(function(e) {
                if($(e.target).parent("a.signin").length==0) {
                    $(".signin").removeClass("menu-open");
                    $("fieldset#signin_menu").hide();
                }
            });

        });
	</script>

	<title><? echo $title; ?></title>
</head>

<body class="body no-js">

<!-- Begin services -->
	<div id="services" class="tagline">
		<div class="title user-select-none cursor_default">Candid portraits of real moments.</div>
	</div>
<!-- End services -->

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

</body>
</html>