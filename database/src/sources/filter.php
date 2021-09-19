<?php
	session_start();

	if(isset( $_POST['optradio'])){
		$_SESSION["filtercategori"]=$_POST['optradio'];
	}
	if(isset( $_POST['year'])){
		$_SESSION["filteryear"]=$_POST['year'];
	}
	
	header("Location:home.php");
?>