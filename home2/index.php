<? 
// This is the landing page for people who have just logged in.

// Begin by setting up the session
session_start();

$pageURL = "/login/?redir=";
$pageURL .= urlencode($_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);

// Check to see if the user is logged in - if they are, let them in.  If not, send them to error.php and tell them they don't have authorized access.
if($_SESSION[is_logged_in] != "on") {
	$_SESSION[error] = "You are either not logged in, or do not have permission to view that page.";
	header('Location: '.$pageURL);
	exit;
}

include("header.php");

$dbhandle = sqlite_open('../db/clients.db', 0666, $error);
if ( isset($_SESSION[updated])) {
        echo '
                <script type="text/javascript">
                $(function() {
                        $.notifyBar({ cls: "success", html: "'.$_SESSION[updated].'"});
                });
        </script>';
        unset($_SESSION[updated]);
    };

// Check for an error, and display it.
if(isset($_SESSION[error])) {
 echo '<script type="text/javascript">
                        $(function() {
                                $.notifyBar({ cls: "error", html: "'.$_SESSION[error].'"});
                        }); 
                </script>
        ';}
 unset($_SESSION[error]);


if (!$dbhandle) die ($error);

$query = "SELECT * FROM Clients WHERE Email='$_SESSION[email]'";
$result = sqlite_query($dbhandle, $query);
if (!$result) die("Cannot execute query.");

$row = sqlite_fetch_array($result, SQLITE_ASSOC);

// This is probably not the best way to do it, but we're going to set all the fields from the array to session variables for later use.
$_SESSION[id] = $row[client_id];
$_SESSION[name] = $row[Name];
$_SESSION[phone] = $row[Phone];
$_SESSION[email] = $row[Email];
$_SESSION[address] = $row[Address];
$_SESSION[next_session] = $row[Next_Session];
$_SESSION[total_sessions] = $row[Total_Sessions];
$_SESSION[discount] = $row[Discount];
$_SESSION[is_admin] = $row[is_admin];
$_SESSION[reset] = $row[do_reset];
$_SESSION[Profile_Completed] = $row[Profile_Completed];
$_SESSION[email_pref] = $row[email_pref];
$email = $_SESSION[email];
if($_SESSION[reset] == "on" ) {
			echo '<div id="text" style="text-align: center;">';
			echo "Please reset your password now. <br />";
			include('reset.php');
			echo '</div>';
}


if($_SESSION['is_admin'] == "on" && $_SESSION[reset] != "on") {
	header('Location: /admin');
	exit;
}
else {
	if($_SESSION['is_logged_in'] == "on" && !$_SESSION[reset] == "on") {
		echo '<div id="text" style="text-align: center;">';
// Let's say hello to our user for the time of day.
		$b = time();
		$hour = date("g",$b);
		$m = date ("A", $b);
		if (!$_SESSION[name] == ""){
		if ($m == "AM") {
			if ($hour == 12) {
				echo "Good Evening, ".$_SESSION[name]; 
				} 
				elseif ($hour < 4) 
				{ 
					echo "Good Evening, ".$_SESSION[name].'.'; 
				} 
				elseif ($hour > 3) 
				{ 
					echo "Good Morning, ".$_SESSION[name].'.'; 
					} 
					} 
					elseif ($m == "PM") 
					{ 
						if ($hour == 12) 
						{ 
							echo "Good Afternoon, ".$_SESSION[name].'.'; 
							} 
							elseif ($hour < 7) 
							{ 
								echo "Good Afternoon, ".$_SESSION[name].'.'; 
								} 
								elseif ($hour > 6) 
								{ 
									echo "Good Evening, ".$_SESSION[name].'.'; 
									} 
								} 
		} else
		{
                if ($m == "AM") {
                        if ($hour == 12) {
                                echo "Good Evening!";
                                }
                                elseif ($hour < 4)
                                {
                                        echo "Good Evening!";
                                }
                                elseif ($hour > 3)
                                {
                                        echo "Good Morning!";
                                        }
                                        }
                                        elseif ($m == "PM")
                                        {
                                                if ($hour == 12)
                                                {
                                                        echo "Good Afternoon!";
                                                        }
                                                        elseif ($hour < 7)
                                                        {
                                                                echo "Good Afternoon!";
                                                                }
                                                                elseif ($hour > 6)
                                                                {
                                                                        echo "Good Evening!";
                                                                        }
                                                                }
		}

			echo '</div>';
		if($_SESSION[Profile_Completed] == "0") {
			echo '<div id="text">';
			echo "Since this is your first time logging in, you need to complete your profile. <br />";
			include('first_login_form.php');
			echo '</div>';
		}
		else {
			include('navigation.php');
			switch($_GET["q"]){
				case "account":
					include_once('account.php');
					break;
				case "proofs":
					include_once('proofs.php');
					break;
				case "sessions":
					include_once('sessions.php');
					break;	
				case "booked":
					include_once('schedule_event_confirmation.php');
					break;
			}
		}
	};
};
include("../footer.php");
?>
