<div id="container" style="height: auto; margin-top: 100px;">
  <div class="container_title" style="text-overflow: ellipsis-word; text-wrap: none; overflow: hidden;">
  		&nbsp;&nbsp;&nbsp;<? echo $row[title] ?>
 </div>
	<div style="height: auto; width: 95%; margin-left: auto; margin-right: auto; margin-top: 15px;">
		<?
			$dir = "../clients/".$row[events_email]."/".$row[Date]."/thumb/";
			$originals = "../clients/".$row[events_email]."/".$row[Date]."/large/";
			echo "<ul>";
			if (is_dir($dir)) {
			    if ($dh = opendir($dir)) {
				$img_count=1;
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
							echo 	'<div class="image_check" style="height: 165px;">
			            				<div class="thumbnail_title" style="font-weight: bold;">'.$img_count.'</div>
			            				<li class="thumbnails">
			            					<a href="'.$originals.urlencode($narray[$i]).'"  rel="lightbox[event]"><img src="'.$dir.urlencode($narray[$i]).'" /></a>
			            				</li>
			            			</div>';
						$img_count++;
						}
			        }
			        closedir($dh);
			    }
			echo "</ul>";
		?>

	</div>

<div id="social">
	<div id="disqus_thread">
		<iframe src="http://www.facebook.com/plugins/like.php?href=<? echo "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&amp;layout=standard&amp;show_faces=true&amp;width=450&amp;action=like&amp;colorscheme=light&amp;height=80" scrolling="no" frameborder="0" style="border:none; width:100%; height:80px; margin-top: 15px;" allowTransparency="true"></iframe>
		<a href="http://twitter.com/share" class="twitter-share-button" data-text="<? echo "Check out these pictures by Hans! - ".$row[Notes]; ?>" data-count="horizontal" data-via="HaDAk">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	</div>
		<script type="text/javascript">
		    var disqus_shortname = 'hanskokxphotography';

		    var disqus_identifier = '<? echo $_GET[event]; ?>';
		    var disqus_url = '<? echo "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>';

		    (function() {
		        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
		        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
		        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		    })();
		</script>
		<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	</div>
</div>

<script type="text/javascript">
// Lightbox hash tag linking support provided (graciously) by Rüdiger Kaatz.
// Thanks Rüdiger!
 
Event.observe(document,'dom:loaded', function() {
    setTimeout(function() {
        checkHash();
    }, 100);
});

function checkHash() {
    if(typeof lightbox == "undefined") {
        // wait till lightbox was loaded
        setTimeout(function() {
            checkHash();
        },100);
        return;
    }
    
    var hash=window.location.hash;
    if(hash!="") {
        if(hash.indexOf("#")==0) {
            hash=hash.substring(1);
        }
        var imageLink=null;
        $$("a").each(function(anchor) {
            var href=anchor.readAttribute("href");
            if(href.indexOf("../")!=-1) {
                href=href.substring(3);
            }
        if(href.indexOf(unescape(hash))!=-1) {
            imageLink=anchor;
        }
        });
        if(imageLink!=null) {
            lightbox.start(imageLink);
        }
    }
}
</script>
