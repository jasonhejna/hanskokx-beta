<!DOCTYPE html>
<head>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="/favicon.png">
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="/styles.css" media="all" type="text/css" />
	<link rel="stylesheet" href="/assets/css/button.css" media="all" type="text/css" />
	<link rel="stylesheet" href="/assets/css/slideshow.css" media="all" type="text/css" />

	<!-- Javascript -->
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="/assets/js/slideshow.js"></script>

</head>
<body>
	<div id="body-wrapper" class="user-select-none">
		<header>
			<div id="header_text" class="cursor_default">
				<div class="logo_mini"></div>
				<div class="name">HANS KOKX</div>
				<div class="title">photography</div>
			</div>
			<div id="login_button" class="button blue">Login</div>
		</header>
		<div id="background-container">
			<!-- Background -->
			<div class="clearpx"></div>
			<!-- <div id="background-photo"></div> -->
			<!-- End Background -->

 			<div id="slideshow">
 			        <?
			            $dir = "images/slideshow/";
			            $narray=array();
			            $dh = @opendir($dir);
			            $i=0;
			            echo '<ul class="slides">';
			            if (is_dir($dir)) {
			                if ($dh = opendir($dir)) {
			                    while($file = readdir($dh))
			                        {
			                                if(is_dir($file))
			                                {
			                                        continue;
			                                }
			                                else if($file != '.' && $file != '..')
			                                {
			                                        $narray[$i]=$file;
			                                        $i++;
			                                }
			                        }
			                        rsort($narray);

			                        for($i=sizeof($narray)-1; $i>-1; $i--)
			                        {
			                            $title = preg_replace('/\.[^.]+$/','',$narray[$i]);
			                            echo    '<li style="background: url('.$dir.$narray[$i].') no-repeat center center fixed;"></li>';
			                        }
			                    }
			                    closedir($dh);
			                }
			            echo "</ul>";
			        ?>

			    <span class="arrow previous"></span>
			    <span class="arrow next"></span>
			</div>


		</div>
		<footer></footer>
	</div>
</body>
</html>