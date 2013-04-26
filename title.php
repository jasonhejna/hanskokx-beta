<? ob_start("ob_gzhandler"); ?>
<?php
 // Set up the session
	session_start();
?>
<?php
// Get current page's filename or path, and store it as curPageName()
function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
?>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 

<!--

                                -oooooooooooooooooooooooooooooooooo:
                             -/oooooooo+/::-..```````..-:://+ooooooo+:.`
                         `-/oooooo/:-``                     ``.-/+ooooo+:.
                       ./ooooo+:.`                                `-/+oooo+:`
                    `.+oooo+:`                                       `./+oooo/.
                   -+oooo/.                                             `-+oooo/`
                 .+oooo:`                                                  ./oooo:`
               `:oooo/`                                                      .+ooo+.
              `+ooo+.               `//////////////////////////               `:oooo:
            -o+.oo:`                `ooossssssssssssssssssssoo+                 .+ooo/
           -ooooo-                   `....-/osssssssso::-....``                  `/oooo/
          -ooooo.                           `+sssssss+                             /oooo/
         -ooooo-      .:://////:             -sssssss+            `://////::`       /oooo/
         -oooo:        `.:ooooo`             .sssssss+             `:ooo/.`         `+ooo/
         :ooo+            oooo/              .sssssss+            `:++:`             .oooo`
         oooo.            +ooo:              .sssssss+          `-+o:`                /ooo/
        -ooo+             +ooo:              .sssssss+        `-+o:`                  `oooo
        /ooo-             +ooo:              .sssssss+       -+o:`                     +ooo.
        oooo`             +ooo:              .sssssss+     -+o:`                       :ooo:
        oooo              +ooo:              .sssssss+  `-+o/`                         -ooo/
        oooo              +ooo+///::===-..`  .sssssss+ `+oooo-                         -ooo/
        oooo              +ooo/`             .sssssss+   :oooo+.                       :ooo/
        oooo.             +ooo:              .sssssss+    `/oooo/`                     /ooo:
        /ooo:             +ooo:              .sssssss+      -+oooo:`                   oooo.
        .ooo+             +ooo:              .sssssss+       `:oooo+-                 .oooo
         +ooo-            +ooo:              .sssssss+         `/oooo/.               +ooo:
         -ooo+`           +ooo:              .sssssss+           .+oooo:`            -oooo
         -oooo/          .oooo-              .sssssss+            `:oooo+-`         `oooo/
          -oooo:      `:/ooooo+:::.          -sssssss+              .+oooo+/:`     `+ooo/
           -oooo:     .-==-=-.....`         .osssssss:               `.......     `+ooo/
            -oooo:                   `...-:+ossssssss+//:::-=..`                 `+ooo/
             `+ooo+`                 /ossssssssssssssssssssssss-                -oo:.`
              `/oooo-                -//:::::::::::::-=-=-=-=-=`              `/oooo-
                -oooo+.                                                     `:oooo/`
                 `:oooo/.                                                 `:+ooo+-
                   ./oooo+-`                                            .:oooo+:`
                     `/ooooo/-`                                      `:+oooo+-`
                       `-+ooooo/-.`                              `.:+ooooo/.
                          .:+oooooo/:-.``                  ``.-/+oooooo/-`
                             -:+oooooooo++/::-=-=..-=-:://+ooooooooo/`
                                 `ooooooooooooooooooooooooooooooo/`

-->

<link rel="icon" type="image/png" href="/assets/images/favicon.png">
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


		<title>Photography by Hans Kokx | Ann Arbor and Southeast Michigan Photographer for your wedding, engagement, life, and other photographic needs</title>
	</head>
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
