<?php
	session_start();
    	$_SESSION["selectedbook"] = "true";
	$_SESSION["selectedwallpaper"] = "false";
	$_SESSION["selectedcaricature"] = "false";
	header("Location:home.php");
?>