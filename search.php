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
	<div class="center">
		<h3>Search</h3>
		<form>
			<input type="text" id="search" size="30" onkeyup="searchFunction(this.value)"/>
		</form>
		<div id="search_result"></div>
		<div id="contact_info"></div>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
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