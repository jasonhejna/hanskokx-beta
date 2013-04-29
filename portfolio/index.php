<?
# Global configuration
include '/config.php';

echo $doctype;
echo $favicon;
head();
?>
<script src="../assets/js/slideshow.js"></script>
<div id="slideshow">

        <?
            $dir = "../assets/images/slideshow/";
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
                            //echo    '<li style="max-width: 1000px; max-height: 1000px;"><img src="'.$dir.$narray[$i].'" width="496" height="620" alt="" /></li>';
                            echo    '<li style="max-width: 1000px; max-height: 1000px;"><img src="'.$dir.$narray[$i].'" width="750" height="500" alt="" /></li>';
                        }
                    }
                    closedir($dh);
                }
            echo "</ul>";
        ?>

    <span class="arrow previous"></span>
    <span class="arrow next"></span>
</div>
<?php include("../footer.php"); ?>

