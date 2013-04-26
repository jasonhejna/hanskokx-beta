<ul id="navigation" class="navigation" style="margin-top: 25px;"> 
	<li onclick="location.href='create_event.php'" id="create_event" class="nav_item<?php if ( curPageName() == "create_event.php" ) { echo "_now"; }; ?>">Create event</li> 
	<li onclick="location.href='view_events.php'" id="edit_event" class="nav_item<?php if ( curPageName() == "view_events.php" ) { echo "_now"; }; ?>">Edit events</li> 
	<li onclick="location.href='upload_pictures.php'" id="edit_event" class="nav_item<?php if ( curPageName() == "upload_pictures.php" ) { echo "_now"; }; ?>">Upload Pictures</li> 
	<li onclick="location.href='delete_event.php'" id="delete_event" class="nav_item<?php if ( curPageName() == "delete_event.php" ) { echo "_now"; }; ?>">Delete event</li> 
</ul> 
