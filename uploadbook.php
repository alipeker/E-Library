<?php
session_start();
$target_dir = "uploadbook/";
$target_file = $target_dir . $_FILES['file']['name'];
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file already exists
if (file_exists($target_file)) {
    $_SESSION['addbook']="Sorry, file already exists.";
    $uploadOk = 0;
    header("Location:upload.php");
}
// Check file size
if ($_FILES["file"]["size"] > 5000000) {
    $_SESSION['addbook']="Sorry, your file is too large.";
    $uploadOk = 0;
    header("Location:upload.php");
}
// Allow certain file formats
if($FileType != "pdf" && $FileType != "doc" && $FileType != "docx" && $FileType != "txt") {
    $_SESSION['addbook']="Sorry, only PDF, DOC, DOCX  & TXT files are allowed.";
    $uploadOk = 0;
    header("Location:upload.php");
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $_SESSION['addbook']="Sorry, your file was not uploaded.";
    header("Location:upload.php");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $_SESSION['addbook']="The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";

	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	$user = 'b21427291';
	$pwd  = 'Alipeker1963';
	$host = 'dbs.cs.hacettepe.edu.tr';
	$port = '1521';
	$db   = 'dbs';
	
	$conn_str = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP) (HOST = ".$host.") (PORT = ".$port.")) )(CONNECT_DATA = (SID = ".$db.")))";

	$conn = oci_connect($user,$pwd,$conn_str);
 
	
	$sql = "BEGIN INSERT_UPLOADBOOK('".$_POST['bookname']."','".$_POST['booksubject']."','".$_POST['bookrelease']."','".$_SESSION['email']."','".$_POST['booknumberofpages']."','".$_POST['booklanguage']."','".$_POST['authorname']."','".$_POST['authoremail']."','".$_POST['publishername']."','".$_POST['publisheremail']."','".$target_dir.$_FILES['file']['name']."'); END;";
	
	$updatephone = oci_parse($conn, $sql);

	oci_execute($updatephone );
	oci_close($conn);
	$_SESSION['addbook']="true";
	header("Location:upload.php");
	
    } else {
        $_SESSION['addbook']="Sorry, there was an error uploading your file.";
	header("Location:upload.php");
    }
}
?>