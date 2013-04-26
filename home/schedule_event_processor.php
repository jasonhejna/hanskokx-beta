<?
session_start();
error_reporting(0);

$name = $_SESSION[name];
$email = $_SESSION[email];
$date = $_POST[date];
$start_time = $_POST[start_time];
$end_time = $_POST[end_time];
$location = $_POST[location];
$notes = $_POST[notes];
$title = $_POST[title];

$location = sqlite_escape_string($location);
$notes = sqlite_escape_string($notes);
$title = sqlite_escape_string($title);

function createRandomString() { 

    $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $pass = '' ; 

    while ($i <= 8) { 
        $num = rand() % 9; 
        $tmp = substr($chars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
    } 

    return $pass; 

} 
$string = createRandomString();

if (!empty($email)) {

 $dbhandle = sqlite_open('../db/clients.db', 0666, $error);

 if (!$dbhandle) die ($error);
 $stm = "INSERT INTO Events(Notes, Date, Begin_Time, End_Time, Location, events_email, public_string, published, title) VALUES('$notes', '$date', '$start_time', '$end_time', '$location', '$email', '$string', '0', '$title')";
 $ok = sqlite_exec($dbhandle, $stm, $error);

 if (!$ok) {
  $_SESSION[error] = $error;
  header('Location: /home/?q=events');
  exit;
 } 
 else {
 		$_SESSION[scheduled] = "Your event has been tentatively scheduled";
		mkdir("../clients/".$email."/".$date , 0775);
        mkdir("../clients/".$email."/".$date."/original" , 0775);
        mkdir("../clients/".$email."/".$date."/thumb" , 0775);
        mkdir("../clients/".$email."/".$date."/large" , 0775);
		$imagepath = "http://".$_SERVER['HTTP_HOST']."/email/images/";

                /* Set e-mail recipient */
                $to  = $email;
                $subject  = "Your event has been tentatively scheduled";
                $headers  = "from: noreply@hanskokx.com\n";
                $headers .= "MIME-Version: 1.0\n";
                if($_SESSION[email_pref] == 'html') { $headers .= "Content-Type: text/html; charset=iso-8859-1\n";}
                $headers .= "\r\n";

                // Let's prepare the message for the e-mail
		if($_SESSION[email_pref] == 'html')
                $message = '<html>
                <body>
                <span style="text-align: center;">
                <p style="color: #0099ff; text-shadow:#FFF 0 1px 0; font-size: 18pt;">
                <img style="vertical-align: middle" src="http://www.hanskokx.com/assets/images/logo_mini.png" />
                &nbsp;HANS KOKX <span style="color: #999999; text-shadow:#FFF 0 1px 0;  font-size: 30pt;">photography</span>
                </p>
                </span>
                <table cellpadding="0" cellspacing="0" align="center" width="528px">
                <tbody>
                <tr>
                <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tl.png\');"></td>
                <td width="500px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tm.png\');">
Your event has been tentatively scheduled
		</td>
                <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tr.png\');"></td>
                </tr>
                <tr>
                <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/ml.png\');"></td>
                <td bgcolor="#e6e8ed">
Hi '.$name.',
<br />
Your session entitled "'.$title.'" has been tentatively booked.  The information you have provided for this session is as follows:
<br />
The event is on '.$date.', from '.$start_time.' to '.$end_time.' at <br />
<pre>'.$location.'</pre>
<br />
Any additional notes you have entered about this event are as follows:
<br />
'.$notes.'
<br /><br />
Please note that scheduling this event is a proposed time, and in no way a binding agreement.  I will contact you shortly to finalize the details.
                </td>
                <td width="14px" style="background-image:url(\'http://www.hanskokx.com/email/images/mr.png\');" />
                </tr>
                <tr>
                <td width="14px" height="37px" style="background-image:url(\'http://www.hanskokx.com/email/images/bl.png\');" />
                <td height="14px" height="37px" style="background-image:url(\'http://www.hanskokx.com/email/images/bm.png\');" />
                <td width="14px" height="37px" style="background-image:url(\'http://www.hanskokx.com/email/images/br.png\');" />
                </tr>
                </tbody>
                </table>
                </body>
                </html>';
		else
	                $message = '
Hi '.$name.',

Your session entitled "'.$title.'" has been tentatively booked.
The information you have provided for this session is as follows:
The event is on '.$date.', from '.$start_time.' to '.$end_time.' at 
'.$location.'

Any additional notes you have entered about this event are as follows:
'.$notes.'


Please note that scheduling this event is a proposed time, and in no way a binding agreement.  I will contact you shortly to finalize the details.';


                // Send the message using mail() function
                mail($to, $subject, $message, $headers, '-f mailer@hanskokx.com');



                $subject  = "Photo session request";
		$to	  = "skipmeister123@gmail.com";
                $headers  = "from: noreply@hanskokx.com\n";
                $headers .= "MIME-Version: 1.0\n";
                $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
                $headers .= "\r\n";

                // Let's prepare the message for the e-mail
                $message = '<html>
                <body>
                <span style="text-align: center;">
                <p style="color: #0099ff; text-shadow:#FFF 0 1px 0; font-size: 18pt;">
                <img style="vertical-align: middle" src="http://www.hanskokx.com/assets/images/logo_mini.png" />
                &nbsp;HANS KOKX <span style="color: #999999; text-shadow:#FFF 0 1px 0;  font-size: 30pt;">photography</span>
                </p>
                </span>
                <table cellpadding="0" cellspacing="0" align="center" width="528px">
                <tbody>
                <tr>
                <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tl.png\');"></td>
                <td width="500px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tm.png\');">
'.$name.' has scheduled a photo session
                </td>
                <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tr.png\');"></td>
                </tr>
                <tr>
                <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/ml.png\');"></td>
                <td bgcolor="#e6e8ed">
                <a href="mailto:'.$email.'">'.$name.'</a> has requested a session entitled "'.$title.'".
Their phone number is '.$_SESSION["phone"].'.
<br />
The event is on '.$date.', from '.$start_time.' to '.$end_time.' at <br /><pre> '.$location.'</pre><br /><br />
	<center>
        <a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q='.urlencode($location).'&amp;aq=0&amp;ie=UTF8t=m&amp;z=14 style="color:#0000FF;text-align:left">
	<img src="http://maps.googleapis.com/maps/api/staticmap?center='.urlencode($location).'&amp;zoom=16&size=490x384&amp;maptype=roadmap&amp;markers=color:red%7C'.urlencode($location).'&sensor=false"></img>
	</a>
	<br /><br />	
	</center>

Any additional notes that have been entered about this event are as follows:
<br />
<pre>
'.$notes.'
</pre>
<br /><br />
     </td>
     <td width="14px" style="background-image:url(\'http://www.hanskokx.com/email/images/mr.png\');" />
    </tr>
    <tr>
     <td width="14px" height="37px" style="background-image:url(\'http://www.hanskokx.com/email/images/bl.png\');" />
     <td height="14px" height="37px" style="background-image:url(\'http://www.hanskokx.com/email/images/bm.png\');" />
     <td width="14px" height="37px" style="background-image:url(\'http://www.hanskokx.com/email/images/br.png\');" />
    </tr>
   </tbody>
  </table>
 </body>
</html>';

                // Send the message using mail() function
                mail($to, $subject, $message, $headers, '-f mailer@hanskokx.com');


	        header('Location: /home/?q=booked');
   		exit;
    }
}
?>
