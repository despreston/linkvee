<?php
	//CONNECT.PHP IS USED TO HOUSE FUNCTIONS FOR CHECKING PASSWORD TO DATABASE, AS WELL AS CONNECTING TO THE DATABASE
	error_reporting(0);
	require("connect.php");
	session_start();
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
<?php 
//CHECKS IF THE USER HAS SUBMITTED THE FORM, OR IF USERNAME/PASSWORD ARE NULL
	if(!isset($_POST['submit']) || $_POST['username'] == NULL || $_POST['pass'] == NULL)
	{
		//CHECKS IF USER HAS BEEN LOGGED IN BEFORE (SESSION HAS ALREADY BEEN SET). IF NOT, THE LOG IN PAGE IS CREATED
		if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true)
		{
?>
			<div class="header">
				<a href="index.php"><img src="images/Linkvee.png" alt="Linkvee" /></a>
				<a style="position:relative;left:60%" href="register.php">Register</a>
			</div>
			<div id="secondborder"></div>
			<div style="margin-left:auto;text-align:center;">
				<h3>Login</h3>
				<br /><br />
				<form style="margin:auto;width:350px;border:1px #000 solid;padding:10px;" id="login" action="index.php" method="POST">
					Name: &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="username" ></input><br />
					Password: <input type="password" name="pass"></input><br />
					<input type="submit" value="Login" name="submit"></input>
				</form>
				<br /><br /><br /><br />
				<ul class="home_icons">
					<li><img src="images/youtube_32.png" alt="YouTube" /></li>
					<li><img src="images/yahoo_32.png" alt="Yahoo" /></li>
					<li><img src="images/windows_32.png" alt="Windows" /></li>
					<li><img src="images/twitter_32.png" alt="Twitter" /></li>
					<li><img src="images/skype_32.png" alt="Skype" /></li>
					<li><img src="images/google_wave_32.png" alt="Google Wave" /></li>
					<li><img src="images/facebook_32.png" alt="Facebook" /></li>
					<li><img src="images/email_32.png" alt="Email" /></li>
					<li><img src="images/aim_32.png" alt="AIM" /></li>
					<li><img src="images/digg_32.png" alt="Digg" /></li>
				</ul>
				<br /><br /><br />
				<div class="welcome_message">
					<p><?php getWelcomeMsg(); ?></p>
				</div>
			</div>
<?php
		}
	}
//IF THE USER HAS ALREADY SUBMITTED THE FORM, AND PASSWORD AND USERNAME ARE NOT NULL, IT WILL CHECK TO SEE IF PASSWORD IS CORRECT FOR THAT USERNAME
	else
	{
		$username = $_POST['username'];
		$password = login($_POST['username']);
		//IF THE USERNAME AND PASSWORD DO NOT MATCH, DISPLAY LOG IN SCREEN AGAIN WITH ERROR
		$salt = 's+(_a*';
		$hash = md5($_POST['pass'].$salt);
		if($hash != $password)
		{
?>
			<div class="header">
				<a href="index.php"><img src="images/Linkvee.png" alt="Linkvee" /></a>
				<a style="position:relative;left:60%" href="register.php">Register</a>
			</div>
			<div id="secondborder"></div>
			<div style="margin-left:auto;text-align:center;">
				<h3>Login</h3>
				<br /><br />
				<form style="margin:auto;width:350px;border:1px #000 solid;padding:10px;" id="login" action="index.php" method="POST">
					Name: &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="username" value="<?php echo($_POST['username']); ?>" ></input><br />
					Password: <input type="password" name="pass"></input><br />
					<input type="submit" value="Login" name="submit"></input>
				</form>
				<h3 style="color:#ff0000">Password Incorrect</h3>
				<ul class="home_icons">
					<li><img src="images/youtube_32.png" alt="YouTube" /></li>
					<li><img src="images/yahoo_32.png" alt="Yahoo" /></li>
					<li><img src="images/windows_32.png" alt="Windows" /></li>
					<li><img src="images/twitter_32.png" alt="Twitter" /></li>
					<li><img src="images/skype_32.png" alt="Skype" /></li>
					<li><img src="images/google_wave_32.png" alt="Google Wave" /></li>
					<li><img src="images/facebook_32.png" alt="Facebook" /></li>
					<li><img src="images/email_32.png" alt="Email" /></li>
					<li><img src="images/aim_32.png" alt="AIM" /></li>
					<li><img src="images/digg_32.png" alt="Digg" /></li>
				</ul>
				<br /><br /><br />
				<div class="welcome_message">
					<p><?php getWelcomeMsg(); ?></p>
				</div>
			</div>
<?php
		}
		//IF PASSWORD MATCHES, SET SESSION
		$salt = 's+(_a*';
		$hash = md5($_POST['pass'].$salt);
		if($hash === $password)
		{
			$_SESSION['logged_in'] = true;
			$_SESSION['username'] = $_POST['username'];
			addUserCount(); 
		}
		
	}
	//IF SESSION HAS BEEN SET, DISPLAY THE WELCOME PAGE
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] = true)
		{
?>
			<div class="header">
				<a style="display:inline;float:left" href="index.php"><img src="images/Linkvee.png" alt="Linkvee" /></a>
				<div class="right_header">
					<?php getPicture($_SESSION['username']); ?><br />
					<a style="margin-left:25%;" href="logout.php">Logout</a>
				</div>
			</div>

			<div id="secondborder"></div>
			<div style="margin-left:auto;text-align:center;">
				<h3>WELCOME, <?php getFirstName($_SESSION['username']); ?></h3>
				<span style="font-size:13px"><a href="new.php">[Contacts]</a>&nbsp&nbsp|&nbsp&nbsp <a href="profile.php">[Edit Profile]</a>
					<?php if($_SESSION['username'] === 'admin') { echo("|&nbsp&nbsp<a href=\"admin.php\">[Admin]</a>"); } ?>
				</span>
			</div>
			<br /><br />
			<div class="welcome_message">
				<h3>Message of the Day</h3>
				<p><?php getMOTD(); ?></p>
			</div>
						<?php
								}
						?>
	<div class="footer">
		<ul>
			<li><a href="about.php">About</a></li>
			<li><a href="register.php">Register</a></li>
		</ul>
	</div>
</div>

</body>
</html>