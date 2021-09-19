<?php
	session_start();
    	$_SESSION["selectedbook"] = "false";
	$_SESSION["selectedwallpaper"] = "true";
	$_SESSION["selectedcaricature"] = "false";
	header("Location:home.php");
?>