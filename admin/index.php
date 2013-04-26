<?php
include("header.php");

echo '<div id="container_message">';
echo 'Welcome back, '.$_SESSION[name].'.';
echo '</div>';
echo '<center><iframe src="https://www.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=skipmeister123%40gmail.com&amp;color=%23182C57&amp;src=323p4vk8nqhrcb90go1vfh5d9k%40group.calendar.google.com&amp;color=%232952A3&amp;src=aaps.k12.mi.us_bkfpnid9pe5438jl75bschj5k4%40group.calendar.google.com&amp;color=%23125A12&amp;ctz=America%2FNew_York" style=" border-width:0 " width="800" height="600" frameborder="0" scrolling="no"></iframe></center>';
include("footer.php");
?>
