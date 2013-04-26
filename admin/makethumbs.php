<?
function make_thumb($src,$dest,$desired_width)
{

  /* read the source image */
  $source_image = imagecreatefromjpeg($src);
  $width = imagesx($source_image);
  $height = imagesy($source_image);

  /* find the "desired height" of this thumbnail, relative to the desired width  */
  $desired_height = floor($height*($desired_width/$width));

  /* create a new, "virtual" image */
  $virtual_image = imagecreatetruecolor($desired_width,$desired_height);

  /* copy source image at a resized size */
  imagecopyresized($virtual_image,$source_image,0,0,0,0,$desired_width,$desired_height,$width,$height);

  /* create the physical thumbnail image to its destination */
  imagejpeg($virtual_image,$dest,100);
}

$watermark = imagecreatefrompng('../assets/images/logo.png');  
$watermark_width = imagesx($watermark);  
$watermark_height = imagesy($watermark);
$upload = 'uploads';
$dir = 'uploads/original/';
$directory = array_diff(scandir($dir), array('..', '.'));
$count = count($directory);
for ($i = 0; $i < $count; $i++) {
	if($dir."/".$directory[$i] == $dir."/" ) {
		//do nothing
	 } else {
		make_thumb($dir."/".$directory[$i],$upload."/large/".$directory[$i],380);
		make_thumb($dir."/".$directory[$i],$upload."/thumb/".$directory[$i],104);
		//imagecopymerge($upload."/large/".$directory[$i], $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, 100);  

	}
}
header('Location: upload_pictures.php?done');
exit;
?>
