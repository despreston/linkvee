<?php
	session_start();
	require("connect.php");
	
	$screenname = $_SESSION['username'];
	$getid = mysql_query("SELECT id FROM user WHERE username='$screenname'");
	$convert_id = mysql_fetch_array($getid);
	$screenname = $convert_id['id'];
	$final_result = mysql_query("SELECT firstname,lastname FROM userinfo WHERE contact_id='$screenname'");
							
	echo "<table border='1'>
	<tr>										
	<th>First Name</th>									
	<th>Last Name</th>										
	</tr>";
							
	while($getusers = mysql_fetch_array($final_result))
	{
		echo "<tr>";
		echo "<td>" . $getusers['firstname'] . "</td>";
		echo "<td>" . $getusers['lastname'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";

mysql_close($con);
?>