<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	$user = 'b21427291';
	$pwd  = 'Alipeker1963';
	$host = 'dbs.cs.hacettepe.edu.tr';
	$port = '1521';
	$db   = 'dbs';
	
	$conn_str = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP) (HOST = ".$host.") (PORT = ".$port.")) )(CONNECT_DATA = (SID = ".$db.")))";

	$conn = oci_connect($user,$pwd,$conn_str);
	session_start();
	echo "Connected";

	echo $_SESSION['email'];
	
	$sql = "insert into superuserrequest values('".$_SESSION['email']."')";

	$request = oci_parse($conn, $sql);

	oci_execute($request);
	oci_close($conn);
	header("Location:profile.php");
?>