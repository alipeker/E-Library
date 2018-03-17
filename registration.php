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

	$sql2= "SELECT * FROM users WHERE email='".$_POST['email']."'";

	$whichuser = oci_parse($conn, $sql2);

	oci_execute($whichuser);

	$row = oci_fetch_array($whichuser, OCI_ASSOC);
	session_start();
	if(!oci_num_rows($whichuser))  {
		$pass = md5($_POST['password']);
		
		$sql = "BEGIN INSERT_USER1('".$_POST['tc']."','".$pass."','".$_POST['name']."','".$_POST['surname']."','".$_POST['phonenumber']."','".$_POST['email']."','".$_POST['address']."'); END;";

		$register = oci_parse($conn, $sql);

		echo '<h4 style="color:green;">You are successfully registered.</h4>';
		oci_execute($register);
		oci_close($conn);
		header("Location:login.php");
	}
	else{
		$_SESSION["emailcontrol"]="false";
		oci_execute($register);
		oci_close($conn);
		header("Location:signup.php");
	}
	
?>