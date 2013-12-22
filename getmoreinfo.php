<?php
	error_reporting(0);
	session_start();
	require("connect.php");
	
	$q=$_GET['q'];

	$final_result = mysql_query("SELECT firstname,lastname,twitter,facebook,youtube,yahoo,windows,aim,skype,wave,phone,digg,email FROM userinfo WHERE user_id='$q'");
							
	echo "<table border='0'>";
							
	while($getusers = mysql_fetch_array($final_result))
	{
		echo "<tr><td><h3>" . $getusers['firstname'] . " " . $getusers['lastname'] . "</h3></td></tr>";
		if($getusers['twitter'] != NULL)
			echo "<tr><td><img src=\"images/twitter_16.png\" /> Twitter: <p><a href=\"http://www.twitter.com/" . $getusers['twitter'] . "\">" . $getusers['twitter']. "</a></p></td></tr>";
		if($getusers['facebook'] != NULL)
			echo "<tr><td><img src=\"images/facebook_16.png\" /> Facebook: <p><a href=\"http://www.facebook.com/" . $getusers['facebook'] . "\">" . $getusers['facebook']. "</a></p></td></tr>";
		if($getusers['youtube'] != NULL)
			echo "<tr><td><img src=\"images/youtube_16.png\" /> Youtube: <p><a href=\"http://www.youtube.com/user/" . $getusers['youtube'] . "\">" . $getusers['youtube']. "</a></p></td></tr>";
		if($getusers['yahoo'] != NULL)
			echo "<tr><td><img src=\"images/yahoo_16.png\" /> Yahoo IM: <p>" . $getusers['yahoo']. "</p></td></tr>";
		if($getusers['windows'] != NULL)
			echo "<tr><td><img src=\"images/windows_16.png\" /> Windows IM: <p>" . $getusers['windows']. "</p></td></tr>";
		if($getusers['aim'] != NULL)
			echo "<tr><td><img src=\"images/aim_16.png\" /> AIM: <p>" . $getusers['aim']. "</p></td></tr>";
		if($getusers['skype'] != NULL)
			echo "<tr><td><img src=\"images/skype_16.png\" /> Skype: <p>" . $getusers['skype']. "</p></td></tr>";
		if($getusers['wave'] != NULL)
			echo "<tr><td><img src=\"images/google_wave_16.png\" /> Wave Email: <p>" . $getusers['wave']. "</p></td></tr>";
		if($getusers['digg'] != NULL)
			echo "<tr><td><img src=\"images/digg_alt_16.png\" /> Digg: <p>" . $getusers['digg']. "</p></td></tr>";
		if($getusers['email'] != NULL)
			echo "<tr><td><img src=\"images/email_16.png\" /> Email: <p>" . $getusers['email']. "</p></td></tr>";
		if($getusers['phone'] != NULL)
			echo "<tr><td>Phone #: <p>" . $getusers['phone']. "</p></td></tr>";
	}
	echo "</table>";

	mysql_close($con);
?>