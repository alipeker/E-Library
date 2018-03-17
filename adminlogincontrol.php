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


$user = $_POST['email'];
$pass = md5($_POST['password']);


$sql= "SELECT * FROM admin WHERE email='".$user."'";

$login_stmt = oci_parse($conn, $sql);


oci_execute($login_stmt);

$row = oci_fetch_array($login_stmt, OCI_ASSOC);
session_start();

if(oci_num_rows($login_stmt))  {
	echo $row['PASSWORD'];
	if($pass==$row['PASSWORD']){
    		$_SESSION["login"] = "true";
    		$_SESSION["email"] = $user;
		$_SESSION["admin"] = "true";
		oci_close($conn);
		header("Location:home.php");
	}
	else{
		$_SESSION["login"] = "false";
	}
}
else {
	$_SESSION["login"] = "false";

}

oci_close($conn);
header("Location:home.php");
?>