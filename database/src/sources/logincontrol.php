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

echo "Connected";

$user = $_POST['email'];
$pass = md5($_POST['password']);

$sql= "SELECT * FROM users WHERE email='".$user."' and password='".$pass."'";

$login_stmt = oci_parse($conn, $sql);

if(!$login_stmt)
{
    echo "An error occurred in parsing the sql string.\n"; 
    exit; 
}

oci_execute($login_stmt);

$row = oci_fetch_array($login_stmt, OCI_ASSOC);

$sql2= "SELECT * FROM user2 WHERE email='".$user."'";

$whichuser = oci_parse($conn, $sql2);

oci_execute($whichuser);

$row2 = oci_fetch_array($whichuser, OCI_ASSOC);

if(oci_num_rows($login_stmt))  {
	session_start();

    	$_SESSION["login"] = "true";
    	$_SESSION["email"] = $user;
	if(oci_num_rows($whichuser)){
		$_SESSION["user2"] = "true";
	}
	else{
		$_SESSION["user2"] = "false";
	}
	oci_close($conn);
	header("Location:home.php");
}
else {
	$_SESSION["login"] = "false";
	oci_close($conn);
	header("Location:login.php");
}
?>