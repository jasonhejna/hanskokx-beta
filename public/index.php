<?
if(!isset($_GET[event])) {
	Header("Location: /");
};

include("header.php");

$dir = "../clients/".$row[events_email]."/".$row[Date]."/large";
if(!file_exists($dir)){
	echo '	<div id="container" style="height: auto; margin-top: 100px;">
			<div class="container_title" style="text-overflow: ellipsis-word; text-wrap: none; overflow: hidden;">
                		&nbsp;&nbsp;&nbsp;Whoops!
 			</div>
			<div id="container_text" style="font-size: 150px; line-height: 70%; margin-top: 0px;">
				404	
			</div>
			<div style="text-align: center; margin-left: 20px; color: rgb(187, 187, 187); text-shadow: 0pt 1px 0pt rgb(255,255,255);">
				Event not found.	
			</div>
		</div>
	';
} else {
	include("proofs.php");
}

include("../footer.php");
?>
