<?
                $email = "eh.struble@gmail.com";
		$subject  = "Your prints are now ready";
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
Your prints are now online
                                        </td>
                                        <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/tr.png\');"></td>
                                </tr>
                                <tr>
                                        <td width="14px" height="46px" style="background-image:url(\'http://www.hanskokx.com/email/images/ml.png\');"></td>
                                        <td bgcolor="#e6e8ed">
<strong>Congratulations!</strong>
<br /><br />
The prints for your photo session are now online for your viewing.  These photos <strong>are</strong> of final quality, so please share them with friends and family!<br /><br />
If you intend to PRINT these images, please contact me for print-ready copies.  If you intend to view these ONLINE ONLY, you are good to go!
<br /><br />
If you see something you don\'t like, or you\'re not quite sure of, please ask! I\'m certain it\'s something that can be fixed.  Until next time, enjoy!
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
