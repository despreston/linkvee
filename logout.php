<?php
	error_reporting(0);
session_start();
if (isset($_SESSION['logged_in'])) {
   unset($_SESSION['logged_in']);
}
header('Location: index.php');
exit;
?>