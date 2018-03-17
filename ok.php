<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	$user = '';
	$pwd  = '';
	$host = '';
	$port = '1521';
	$db   = 'dbs';
	
	$conn_str = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP) (HOST = ".$host.") (PORT = ".$port.")) )(CONNECT_DATA = (SID = ".$db.")))";

	$conn = oci_connect($user,$pwd,$conn_str);

	echo $_POST['email'];
	$sql = "BEGIN SUPERUSERPERMISSION('".$_POST['email']."'); END;";

	$request = oci_parse($conn, $sql);

	oci_execute($request);
	oci_close($conn);
	header("Location:superuserpermission.php");
?>