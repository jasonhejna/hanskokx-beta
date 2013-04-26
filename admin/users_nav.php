<ul id="navigation" class="navigation" style="margin-top: 25px;"> 
	<li onclick="location.href='create_user.php'" id="create_user" class="nav_item<?php if ( curPageName() == "create_user.php" ) { echo "_now"; }; ?>">Create User</li> 
	<li onclick="location.href='view_users.php'" id="edit_user" class="nav_item<?php if ( curPageName() == "view_users.php" ) { echo "_now"; }; ?>">Edit Users</li> 
	<li onclick="location.href='delete_user.php'" id="delete_user" class="nav_item<?php if ( curPageName() == "delete_user.php" ) { echo "_now"; }; ?>">Delete User</li> 
</ul> 
