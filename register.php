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
	
<script type="text/javascript">
function passwordstrength () {
 min_name=0 ; min_screenname=2; min_password=4;
 a="";
 b="";
 c="Screenname must be at least 3 characters";
 d="Password must be at least 5 characters";
 fname_check=document.getElementById('first_name').value ;
 lname_check=document.getElementById('last_name').value ;
 screenname_check=document.getElementById('screenname').value ;
 pass_check=document.getElementById('pass').value ;
   if (fname_check.length>min_name) {
       a="<font color='#22bb22'>OK</font>";
	   submit_button=true;
    }
	if (lname_check.length>min_name) {
       b="<font color='#22bb22'>OK</font>";
	   submit_button=true;
    }
	if (screenname_check.length>min_screenname) {
       c="<font color='#22bb22'>OK</font>";
	   submit_button=true;
    }
    if (pass_check.length>min_password) {
       d="<font color='#22bb22'>OK</font>";
	   submit_button=true;
    }
    document.getElementById('first_name_check').innerHTML=a ;
	document.getElementById('last_name_check').innerHTML=b ;
    document.getElementById('screenname_check').innerHTML=c ;
    document.getElementById('password_check').innerHTML=d ;

}
</script>	
	
</head>
<body>
<div class="content">
	<div class="header">
		<a href="index.php"><img src="images/Linkvee.png" alt="Linkvee" /></a>
		<a style="position:relative;left:60%" href="index.php">Home</a>
	</div>
	<div id="secondborder"></div>
<?php
 if(!isset($_POST['submit'])) { 
?>
	<div class="center">
		<h3>Register</h3>
	</div>
	<br /><br /><br />
	<div class="registration">
		<form name="registration" action="register.php" method="POST">
			<ul>
				<li>First Name: <input type="text" id="first_name" name="first_name" onkeyup='Javascript:passwordstrength()'></input>&nbsp&nbsp<div class="checker" id="first_name_check"></div></li>
				<li>Last Name: <input type="text" id="last_name" name="last_name" onkeyup='Javascript:passwordstrength()'></input>&nbsp&nbsp<div class="checker" id="last_name_check"></div></li>
				<li>Desired Screenname: <input type="text" id="screenname" name="screenname" onkeyup='Javascript:passwordstrength()'></input>&nbsp&nbsp<div class="checker" id="screenname_check">Screenname must be at least 3 characters</div></li>
				<li>Password: <input type="password" id="pass" name="pass" onkeyup='Javascript:passwordstrength()'></input>&nbsp&nbsp<div class="checker" id="password_check">Password must be at least 5 characters</div></li>
				<li>Email: <input type="text" id="email" name="email"></input></li>
			</ul>
			<div style="margin-left:200px">
				<input type="submit" name="submit" value="Register"></input>
			</div>

		</form>
	</div>
<?php } 
	else { 
		registerUser($_POST['screenname'],$_POST['pass'],$_POST['first_name'],$_POST['last_name'],$_POST['email']);
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