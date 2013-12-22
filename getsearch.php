<?php
	error_reporting(0);
	session_start();
	require("connect.php");
	
	$q=$_GET['q'];
	
	$screenname = $_SESSION['username'];
	$getid = mysql_query("SELECT id FROM user WHERE username='$screenname'");
	$convert_id = mysql_fetch_array($getid);
	$screenname = $convert_id['id'];

	$final_result = mysql_query("SELECT firstname,lastname,user_id FROM userinfo WHERE firstname LIKE '$q%' OR lastname LIKE '$q%' AND contact_id='$screenname'");
						
		
		echo "<table border='0' cellpadding='5' cellspacing='0'>";
							
					while($getusers = mysql_fetch_array($final_result))
					{
						echo "<tr onMouseOver=\"this.bgColor='#ccffcc'\" onMouseOut=\"this.bgColor='white';\">";
						?>
						<td width="400"><a href="javascript:getmoreinfo(<?php echo($getusers['user_id']); ?>);"><?php echo($getusers['firstname']." ".$getusers['lastname']); ?></a></td>
						<?php
						echo "</tr>";
					}
		echo "</table>";

	mysql_close($con);
?>