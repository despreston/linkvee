<?php
error_reporting(0);
//CONNECT TO DB 
$con = mysql_connect("localhost","root","117671");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

	mysql_select_db("linkvee", $con);
 
//RETRIEVE FIRST NAME FROM DATABASE, BASED ON USERNAME GIVEN
function getFirstName($username)
{
	$name = mysql_query("SELECT firstname FROM user WHERE username='$username'");
	$name_result = mysql_fetch_array($name);
	echo $name_result['firstname'];
}

//LOGIN SEQUENCE. TEST PASSWORD AND USERNAME TO THE MATCHING PAIR IN THE DATABASE
function login($username)
{
	$result = mysql_query("SELECT password FROM user
	WHERE username='$username'");
	
	$row = mysql_fetch_array($result);
	return $row['password'];	
}

//COUNTS NUMBER OF SUCCESSFUL LOGINS, SAVES NUMBER TO TEXT FILE COUNT.TXT
function addUserCount()
{
	$fp = fopen("count.txt", "r"); 
	$count = fread($fp, 1024); 
	fclose($fp); 
	$count = $count + 1; 
	$fp = fopen("count.txt", "w"); 
	fwrite($fp, $count); 
	fclose($fp); 
}	
	
//REGISTER USER SEQUENCE
function registerUser($screenname,$pass,$first_name,$last_name,$email)
{
if($_POST['first_name'] == NULL || $_POST['last_name'] == NULL || strlen($_POST['screenname']) < 3 || strlen($_POST['pass']) < 5)
{
	echo("Please make sure all fields are filled");
}
else
{
	$check_doubles = mysql_query("SELECT * FROM user");
	$taken=false;
	//CHECK FOR DUPLICATE REGISTERED NAMES
	while($row = mysql_fetch_array($check_doubles))
	{
		if($screenname == $row['username'])
		{
			echo("Sorry, username taken.");
			echo "<br /><a href=\"register.php\">Back</a>";
			$taken=true;
		}
	}
	//IF NO DUPLICATES, REGISTER USER
	if($taken == false)
	{			
		$salt = 's+(_a*';
		$hash = md5($pass.$salt);
		$result = mysql_query("INSERT INTO user (username,password,firstname,lastname,email) VALUES ('$screenname','$hash','$first_name','$last_name','$email')");
		
		//THIS IS WHERE THE MAIL FUNCTION WOULD BE CALLED. BUT IT DOES NOT WORK ON OUR SERVERS
		//$getsubject = mysql_query("SELECT subject FROM email_content");
		//$createsubject = mysql_fetch_array($getsubject);
		//$getmessage = mysql_query("SELECT message FROM email_content");
		//$createmessage = mysql_fetch_array($getmessage);
		//$to = $email;
		//$subject = $createsubject;
		//$message = $createmessage;
		//$from = "no-reply@linkvee.com";
		//$mail($to,$subject,$message);
		
		$result2 = mysql_query("SELECT firstname FROM user WHERE username ='$screenname'");
		$row = mysql_fetch_array($result2);
		echo 'Thanks for registering '.$row['firstname'];
		echo "<br /><a href=\"index.php\">Continue</a>";
	}
}
}

//ADDS USER TO CONTACTS
function addUser($first_name,$last_name,$email,$twitter,$facebook,$youtube,$yahoo,$windows,$aim,$skype,$wave,$digg,$phone,$screenname)
{
	$getid = mysql_query("SELECT id FROM user WHERE username='$screenname'");
	$row = mysql_fetch_array($getid);
	$correct_id = $row['id'];
	$adduserinfo = mysql_query("INSERT INTO userinfo (twitter,facebook,youtube,yahoo,windows,aim,skype,wave,phone,digg,firstname,lastname,email,contact_id) VALUES ('$twitter','$facebook','$youtube','$yahoo','$windows','$aim','$skype','$wave','$phone','$digg','$first_name','$last_name','$email','$correct_id')");
	unset($_POST['submit']);

}

//RETRIEVE WELCOME MESSAGE FROM DATABASE
function getWelcomeMsg()
{
	$getmsg = mysql_query("SELECT welcome FROM admin_msg");
	$showmsg = mysql_fetch_array($getmsg);
	echo ($showmsg['welcome']);
}

//RETRIEVE MESSAGE OF THE DAY FROM DATABASE
function getMOTD()
{
	$getmsg = mysql_query("SELECT motd FROM admin_msg");
	$showmsg = mysql_fetch_array($getmsg);
	echo ($showmsg['motd']);
}

//FUNCTION ON ADMIN PAGE TO CHANGE WELCOME MESSAGE
function change_welcome_msg($newmsg)
{
	$changemsg = mysql_query("UPDATE admin_msg SET welcome='$newmsg' WHERE id='1'");
}

//FUNCTION ON ADMIN PAGE TO CHANGE MESSAGE OF THE DAY
function change_motd_msg($newmotd)
{
	$changemsg = mysql_query("UPDATE admin_msg SET motd='$newmotd' WHERE id='1'");
}

//GET PROFILE INFORMATION FOR EDIT PROFILE PAGE
function updateProfile($username, $firstname, $lastname, $email)
{
	$change_pass = mysql_query("UPDATE user SET firstname='$firstname', lastname='$lastname', email='$email' WHERE username='$username'");
	echo("Profile Updated");
}

function updatePicture($screenname,$picture)
{	
	$picture["name"] = strtolower($picture["name"]) ; 
	$ext = split("[/\\.]", $picture["name"]) ; 
	$n = count($ext)-1; 
	$exts = $ext[$n]; 
	
	if ((($picture["type"] == "image/gif")
		|| ($picture["type"] == "image/jpeg")
		|| ($picture["type"] == "image/pjpeg"))
		&& ($picture["size"] < 60000))
	{
		if ($picture["error"] > 0)
		{
			echo "Error: " . $picture["error"] . "<br />";
		}
		else
		{
			$name = $screenname .'.'. $exts;
			move_uploaded_file($picture["tmp_name"], "uploads/" . $screenname . '.' . $exts);
			$result = mysql_query("SELECT id FROM user WHERE username='$screenname'");
			$getid = mysql_fetch_array($result);
			$pictureid = $getid['id'];
			$deleteold = mysql_query("DELETE FROM profile_picture WHERE contact_picture='$pictureid'");
			$trypictureupdate = mysql_query("INSERT INTO profile_picture (url, contact_picture) VALUES ('$name','$pictureid')");	
		}
	}
	else
	{
		echo "Invalid file";
	}
}

function getPicture($screenname)
{
	$result = mysql_query("SELECT id FROM user WHERE username='$screenname'");
	$getid = mysql_fetch_array($result);
	$pictureid = $getid['id'];
	$getpictureurl = mysql_query("SELECT url FROM profile_picture WHERE contact_picture ='$pictureid'");
	$convert = mysql_fetch_array($getpictureurl);
			
	echo("<img height='100px' width='100px' src='uploads/". $convert['url'] ."'/>");	
}
?>