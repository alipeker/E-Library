<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	$user = 'b21427291';
	$pwd  = 'Alipeker1963';
	$host = 'dbs.cs.hacettepe.edu.tr';
	$port = '1521';
	$db   = 'dbs';
	session_start();
	$conn_str = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP) (HOST = ".$host.") (PORT = ".$port.")) )(CONNECT_DATA = (SID = ".$db.")))";

	$conn = oci_connect($user,$pwd,$conn_str);

	$sql2= "SELECT * FROM users WHERE email='".$_SESSION['email']."'";

	$whichuser = oci_parse($conn, $sql2);

	oci_execute($whichuser);

	$row = oci_fetch_array($whichuser, OCI_ASSOC);

	if(oci_num_rows($whichuser))  {
		$pass = md5($_POST['oldpassword']);
		if($row['PASSWORD']==$pass){
			$newpass = md5($_POST['newpassword']);
			$sql = "BEGIN UPDATE_PASSWORDUSER('".$_SESSION['email']."','".$newpass."'); END;";

			$updatephone = oci_parse($conn, $sql);

			oci_execute($updatephone );
			$_SESSION['passwordsuccess']="true";
			header("Location:profile.php");
		}
		else{
			$_SESSION['passwordsuccess']="false";
		}
	}
	else{
		$_SESSION['passwordsuccess']="false2";
	}
	
	header("Location:profile.php");
	oci_close($conn);
?>