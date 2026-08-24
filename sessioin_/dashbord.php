<?php
session_start();

if(!isset($_SESSION['username'])){
	header("Location: login_secure.php?message=unauthorized");
	exit();
}

header("Location: secure_dashboard.php");
exit();
?>