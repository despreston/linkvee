<?php
	error_reporting(0);
	session_start();
	require("connect.php");
	
	$q=$_GET['q'];
	$remove = mysql_query("DELETE FROM user WHERE id='$q'");

	$get_all = mysql_query("SELECT id,firstname,lastname FROM user");
	echo "<table border='0' cellpadding='5' cellspacing='0'>";
	while($getusers = mysql_fetch_array($get_all))
	{
		echo "<tr onMouseOver=\"this.bgColor='#ccffcc'\" onMouseOut=\"this.bgColor='white';\">";
?>
		<td width="400"><?php echo($getusers['id']." ".$getusers['firstname']." ".$getusers['lastname']." "); ?><a href="javascript:delete_contact(<?php echo($getusers['id']); ?>);">Delete User</a></td>
<?php
		echo "</tr>";
	}
	echo "</table>";
	

	mysql_close($con);
?>