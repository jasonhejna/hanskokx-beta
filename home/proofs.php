<?
session_start(); 

$db = new SQLiteDatabase("../db/clients.db");
$result = $db->query("SELECT Date,event_id,unviewed FROM Events WHERE events_email='$email' AND published='1'");
$results =  sizeof($result);
?>
<script>
	$(function() {
		$( ".check" ).button();
		$( "#format" ).buttonset();
		$('.thumbnails a').lightBox({
		fixedNavigation:true,
		imageLoading: '../assets/images/loading.gif',
		imageBtnClose: '../assets/images/close.gif',
		imageBtnPrev: '../assets/images/prevlabel.gif',
		imageBtnNext: '../assets/images/nextlabel.gif',
	});

	});
</script>
<div style="display:block; float: left; width: 100%;">

<div id="container" style="height: auto; margin-top: 10px;">
  <div class="container_title">
  	<div style="width: 150px; display: block; float: left; margin-top: 2px;">
  		&nbsp;&nbsp;&nbsp;My Proofs
  	</div>
  	<div style="width: auto; display: block; float: right; margin-right: 10px; margin-top: 2px;">
<form action="#" method="post">
		<select id="select_date" name="select_date" class="input" style="width: 100%; height: 30px; <? if($results == "0") { echo 'display: none;';} ?>">
			<option value="">Choose a date...</option>
				<?
					$total_events = 0;
				      while ($result->valid()) {
				              $row = $result->current();
				              echo '<option ';
				              		if($row[Date] == $_GET[date])
				              			{
					              			echo "selected ";
					              		};
				              echo 'value="'.$row[event_id].'">';
						if ($row[unviewed] == '1') {
							echo "NEW! - ";
						}
				              echo date('F j, Y', strtotime($row[Date])).'</option>
				              ';
				              $total_events++;
				              $result->next();
				      }
				?>
		</select>
</form>
  	</div>
 	</div>
	<div id="container_text" style="height: auto;<? if(isset($_GET[date])) { echo 'display: none;';} ?>">
		<? if($total_events > 0 && !isset($_GET[date])) {
			echo 'You have had '. $total_events.' session';
				if($total_events > 1) {
					echo 's';
					}
				echo '.<br />Please select a date from the list.';
			}
			elseif(!isset($_GET[date])) {
				echo "You haven't had any sessions yet!";
			}
			else {
				echo "&nbsp;";
			};
			?>
	</div>
	<div id="contained" style="height: 100%; overflow: hidden; right: 3px; border: none;">
		<?
			if(isset($_GET[event])){
                                echo '<div id="public_link">
                                        <img src="../assets/images/link.png">
                                                <a href="http://'.$_SERVER["SERVER_NAME"].'/public?event='.$_GET[event].'">Public link</a>
                                        </div><br />

					';
			};

			$dir = "../clients/".$_SESSION[email]."/".$_GET[date]."/thumb/";
			$originals = "../clients/".$_SESSION[email]."/".$_GET[date]."/large/";
			$narray=array();
			$dh = @opendir($dir);
			$i=0;
			echo '
			<form action="submit_images.php" method="post">
			<fieldset class="thumbnails" ><ul>';
			$x=1;
			$img_count=1;
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
						                //echo "<a href='$path/$file'>$file</a><br/>";
						                $narray[$i]=$file;
						                $i++;
						        }
						}
						rsort($narray);

						for($i=sizeof($narray)-1; $i>-1; $i--)
						{
							$title = preg_replace('/\.[^.]+$/','',$narray[$i]);
							echo 	'<div class="image_check">
										<div class="thumbnail_title" style="font-weight: bold;">'.$img_count.'</div>
										<li class="thumbnails">
											<a href="'.$originals.'/'.$narray[$i].'"  rel="lightbox[event]"><img src="'.$dir.$narray[$i].chr(34).'" /></a>
										</li>
										<br />
										<span class="checkbox">
											<input type="checkbox" id="'.$narray[$i].'" class="check" name="'.$narray[$i].'" /><label for="'.$narray[$i].'">Select</label>
										</span>
									</div>';
							$img_count++;
						}
			        }
			        closedir($dh);
				echo '<p class="submit"><input type="submit" class="big_button" style="margin-bottom: 30px; width: 95%; margin-left: auto; margin-right: auto;" value="Submit photos for processing" /></p>';
			    };
			?>

				</ul>
			</fieldset>
		</form>
	</div>
</div>
</div>
<script type="text/javascript">

jQuery(function($){

$("select#select_date").bind("change", function(){
       var id = $("option:selected", this).val();
       $.post("getevent.php", "id=" + id, processResults, 'json');
	});
});

function processResults(data){
	mydata = data;
	date = mydata[0].Date;
	string = mydata[0].public_string;
	window.location.href = "?q=proofs&date=" + date + "&event=" + string;
}

</script>
<? 
unset($db);
?>
