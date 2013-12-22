<?php
error_reporting(0);
	session_start();
	require("connect.php");
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
				<a style="display:inline;float:left" href="index.php"><img src="images/Linkvee.png" alt="Linkvee" /></a>
				<div class="right_header">
					<?php getPicture($_SESSION['username']); ?><br />
					<a style="margin-left:25%;" href="logout.php">Logout</a>
				</div>
			</div>
	<div id="secondborder"></div>
	<div style="margin-left:auto;text-align:center;">
		<h3>Edit Profile</h3>
		<?php
			if(isset($_POST['submit']))
			{
				unset($_POST['submit']);
				updateProfile($_SESSION['username'],$_POST['newfirst'],$_POST['newlast'],$_POST['newemail']);
			}
			$screenname = $_SESSION['username'];
			$getprofile = mysql_query("SELECT username,firstname,lastname,email FROM user WHERE username='$screenname'");
		?>
			<form id="profile" action="profile.php" method="POST">
		<?php
			while($getuserprofile = mysql_fetch_array($getprofile)) {
		?>
				Firstname <input type='text' name='newfirst' id='newfirst' value='<?php echo($getuserprofile['firstname']); ?>'></input><br />
				Lastname <input type='text' name='newlast' id='newlast' value='<?php echo($getuserprofile['lastname']); ?>'></input><br />
				Email <input type='text' name='newemail' id='newemail' value='<?php echo($getuserprofile['email']); ?>'></input><br />
		<?php
		    }
		?>
			<input type='submit' id='submit' name='submit' value='Submit'/>		
		</form>
		<br /><br />
		<?php
		if(isset($_POST['submit2']))
		{
			unset($_POST['submit2']);
			updatePicture($_SESSION['username'],$_FILES['file']);
		}
		?>
		<p>Upload Profile Picture</p>
		<form action="profile.php" method="post" enctype="multipart/form-data">
			<label for="file">Filename:</label>
			<input type="file" name="file" id="file" /> 
			<br />
			<input type="submit" name="submit2" value="Submit" />
		</form>
		<br />
		<?php getPicture($_SESSION['username']); ?>
	</div>
<div class="footer">
	<ul>
		<li><a href="about.php">About</a></li>
		<li><a href="register.php">Register</a></li>
	</ul>
</div>
</div>
</body>
</html>