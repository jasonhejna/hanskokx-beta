<?
                $email = "akokx@cedarville.edu";
		$subject  = "Your proofs are now ready";
		$headers = "From: noreply@hanskokx.com" . "\r\n";
                $headers .= "MIME-Version: 1.0\n";
                $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
                $headers .= "\r\n";

                // Let's prepare the message for the e-mail
                $message .= '<html>
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
Your proofs are now online
                                        </td>
                                        <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tr.png\');"></td>
                                </tr>
                                <tr>
                                        <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/ml.png\');"></td>
                                        <td bgcolor="#e6e8ed">
<strong>Congratulations!</strong>
<br /><br />
The proofs for your photo session are now online for your viewing.  These photos are <strong>not</strong> of final quality, so please hold off sharing them with friends and family until they are done.  You wouldn\'t want to give them the wrong idea!<br /><br />
Now, it\'s your turn! You need to pick the photos that you like <strong>best</strong>. How do you do that? Easy! Log in to your account, and check the proofs section.  The date dropdown will have your session in it - so go ahead and choose that.  You\'ll see thumbnails for all the images.  Click a thumbnail to view the larger version, and click the button under the thumbnail to choose it.  Once you\'ve chosen all the images you like, click the big button at the bottom, and you\'re done! It\'s just that easy.<br /><br />
So, how do you choose the perfect picture(s)? What do you worry about? What\'s not important at this stage? I\'m so glad you asked.  You <strong>should</strong> worry about things like whether or not the image is in focus, half your head is clipped off the top or side, or the image just doesn\'t convey the story or message you\'re trying to tell.  What\'s not important? What <strong>shouldn\'t</strong> you worry about? The brightness/darkness of the photo; the color balance (most of the images likely have white balance issues at this stage); minor imperfections like rogue hairs or blemishes; cropping of the photo.<br /><br />
Once you\'ve chosen your images, it can take up to a few weeks or more to go through all of them and prepare them for print and presentation - but don\'t worry! You\'ll get an email when they\'re ready.  Just be patient!  So, enough talk! Go and enjoy the proofs!
<br /><br />
Hans Kokx
<br />
http://www.hanskokx.com
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
                mail($email, $subject, $message, $headers, '-f mailer@hanskokx.com');
 		echo "message sent";
                echo "";
		exit;
?>
