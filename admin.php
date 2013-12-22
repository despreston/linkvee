<?php
	error_reporting(0);
	require("connect.php");
	session_start();
	if($_SESSION['username'] === 'admin')
	{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title>Linkvee</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="all" /> 
	<script language="JavaScript" type="text/javascript" src="javascript_functions.js"></script> 	
</head>
<body>
<div class="content">
	<div class="header">
				<a href="index.php"><img src="images/Linkvee.png" alt="Linkvee" /></a>
				<a style="position:relative;left:60%" href="logout.php">Logout</a>
			</div>
	<div id="secondborder"></div>
	<div style="margin-left:auto;text-align:center;">
		<h3>Administration</h3>
	<table border="0" cellpadding="10" cellspacing="0" align="center">
	<tr>
		<td><?php if(isset($_POST['submit']) && $_POST['submit'] != NULL) { change_welcome_msg($_POST['newmsg']); }?></td>
		<td><?php if(isset($_POST['newmotd']) && $_POST['newmotd'] != NULL) { change_motd_msg($_POST['newmotd']); }?></td>
	</tr>
	<tr>
		<td><form name="welcome_msg" action="admin.php" method="POST">
			<p>Change welcome message:</p>
			<textarea rows="3" cols="50" name="newmsg" id="newmsg">Message displayed on log in page.</textarea><br />
			<input type="submit" name="submit" value="Submit"></input>
		</form></td>
		<td><form name="motd" action="admin.php" method="POST">
			<p>Change message of the day:</p>
			<textarea rows="3" cols="50" name="newmotd" id="newmotd">Message displayed after logging in.</textarea><br />
			<input type="submit" name="submit" value="Submit"></input>
		</form></td>
	</table>
		<div id="admin_contacts">
				<?php
					$get_all = mysql_query("SELECT * FROM user");
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
				?>
		</div>
	</div>

<div class="footer">
	<ul>
		<li><a href="about.php">About</a></li>
		<li><a href="register.php">Register</a></li>
	</ul>
</div>
</div>
<?php
}
else 
{
	echo("Access Denied");
}
?>
</body>
</html>