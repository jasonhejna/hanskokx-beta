<?
$file = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $file);
$pfile = $break[count($break) - 1];

	$string = dirname(__FILE__);
	$array = explode("/",$string); echo $array[count($array)-1];
	$curpage = $array[4];
?>
	<div id="expectations_nav" class="expectations"> 
		<ul class="navigation"> 
			<li onclick="location.href='/expectations'" class="nav_item<?php if ( $pfile == "index.php" ) { echo "_now"; }; ?>">Expectations</li>
			<li onclick="location.href='engagements.php'" class="nav_item<?php if ( $pfile == "engagements.php" ) { echo "_now"; }; ?>">Engagements</li>
			<li onclick="location.href='weddings.php'" class="nav_item<?php if ( $pfile == "weddings.php" ) { echo "_now"; }; ?>">Weddings</li>	
			<li onclick="location.href='decor.php'" class="nav_item<?php if ( $pfile == "decor.php" ) { echo "_now"; }; ?>">Decor</li>	
			<li onclick="location.href='testimonials.php'" class="nav_item<?php if ( $pfile == "testimonials.php" ) { echo "_now"; }; ?>">Testimonials</li>	
		</ul> 
	</div> 