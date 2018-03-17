<?php
	session_start();
    	$_SESSION["selectedbook"] = "false";
	$_SESSION["selectedwallpaper"] = "false";
	$_SESSION["selectedcaricature"] = "true";
	header("Location:home.php");
?>