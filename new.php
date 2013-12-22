<?php
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
			<div class="header">
				<a style="display:inline;float:left" href="index.php"><img src="images/Linkvee.png" alt="Linkvee" /></a>
				<div class="right_header">
					<?php getPicture($_SESSION['username']); ?><br />
					<a style="margin-left:25%;" href="logout.php">Logout</a>
				</div>
			</div>
	<div id="secondborder"></div>
	<div style="margin-left:auto;text-align:center;">
		<h3>Contacts</h3>
		<span style="font-size:13px"><a href="#" onClick='document.getElementById("styled_popup").style.display="block"'>[New Contact]</a>&nbsp&nbsp|&nbsp&nbsp <a href="search.php">[Search]</a></span>
	</div>
	<div id='styled_popup' name='styled_popup' style='width:400px; height:600px; display:none; position: absolute; top:20px; left:400px;'>
				<table cellpadding='0' cellspacing='0' border='0'>
					<tr>
					<td><img height='23' width='356' src='images/titlebar.jpg' class="dragme"></td>
					<td><a href='javascript:styledPopupClose();'><img height='23' width='24' src='images/x11_close.gif' border='0'></a></td>
					</tr>
					<tr><td colspan='2' style='background-color:#EFEFE7; width: 380px; height: 500px;'>
						<div class="center">
						<h3>Contacts</h3>
							</div>
								<div class="registration">
								<form name="new_contact" onsubmit="addUserInstantly()" method="POST">
									<ul>
										<li>First Name: <input type="text" id="first_name" name="first_name"></input></li>
										<li>Last Name: <input type="text" id="last_name" name="last_name"></input></li>
										<li><img src="images/email_16.png" /> Email: <input type="text" id="email" name="email"></input></li>
										<li><img src="images/twitter_16.png" /> Twitter: <input type="text" id="twitter" name="twitter"></input></li>
										<li><img src="images/facebook_16.png" /> Facebook Vanity: <input type="text" id="facebook" name="facebook"></input></li>
										<li><img src="images/youtube_16.png" /> Youtube: <input type="text" id="youtube" name="youtube"></input></li>
										<li><img src="images/yahoo_16.png" /> Yahoo IM: <input type="text" id="yahoo" name="yahoo"></input></li>
										<li><img src="images/windows_16.png" /> Live Messenger: <input type="text" id="windows" name="windows"></input></li>
										<li><img src="images/aim_16.png" /> AIM: <input type="text" id="aim" name="aim"></input></li>
										<li><img src="images/skype_16.png" /> Skype: <input type="text" id="skype" name="skype"></input></li>
										<li><img src="images/google_wave_16.png" /> Google Wave: <input type="text" id="wave" name="wave"></input></li>
										<li><img src="images/digg_alt_16.png" /> Digg: <input type="text" id="digg" name="digg"></input></li>
										<li>Phone #: <input type="text" id="phone" name="phone"></input></li>
									</ul>
									<div style="text-align:center">
										<input type="submit" name="submit" value="Add"></input>&nbsp&nbsp
										<input type="reset" name="reset" value="Reset"></input>
									</div>
								</form>
							</div>
						<?php
						 if(isset($_POST['submit'])) { 
								unset($_POST['submit']);
								addUser($_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['twitter'],$_POST['facebook'],$_POST['youtube'],$_POST['yahoo'],$_POST['windows'],$_POST['aim'],$_POST['skype'],$_POST['wave'],$_POST['digg'],$_POST['phone'],$_SESSION['username']);
							}
						?>
						</td></tr>
					</table>
			</div>
			<br /><br />
			<div class="addresses">
				<?php
					$screenname = $_SESSION['username'];
					$getid = mysql_query("SELECT id FROM user WHERE username='$screenname'");
					$convert_id = mysql_fetch_array($getid);
					$screenname = $convert_id['id'];
					$final_result = mysql_query("SELECT firstname,lastname,user_id FROM userinfo WHERE contact_id='$screenname'");
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
				?>
			</div>
			<div id="contact_info"></div>
				<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<div class="footer">
	<ul>
		<li><a href="about.php">About</a></li>
		<li><a href="register.php">Register</a></li>
	</ul>
</div>
</div>
</body>
</html>