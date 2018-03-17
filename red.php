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
 
	echo "Connected";
	echo $_POST['id'];
	session_start();
	$sql = "BEGIN DELETE_UPLOADITEM('".$_POST['id2']."','".$_POST['id']."'); END;";

	$addfavorite = oci_parse($conn, $sql);

	oci_execute($addfavorite );

	$sql = "BEGIN DELETE_UPLOADITEM('".$_POST['id2']."','".$_POST['id']."'); END;";

	$addfavorite = oci_parse($conn, $sql);

	oci_execute($addfavorite );

	$sql = "BEGIN DELETE_UPLOADITEM('".$_POST['id2']."','".$_POST['id']."'); END;";

	$addfavorite = oci_parse($conn, $sql);

	oci_execute($addfavorite );
	oci_close($conn);
	header("Location:uploadpermission.php");

?>