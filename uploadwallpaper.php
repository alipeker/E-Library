<?php
session_start();
$target_dir = "uploadwallpaper/";
$target_file = $target_dir . $_FILES['file']['name'];
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    header("Location:upload.php");
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    header("Location:upload.php");
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    header("Location:upload.php");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    header("Location:upload.php");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $_SESSION['addwallpaper']="The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";

	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	$user = 'b21427291';
	$pwd  = 'Alipeker1963';
	$host = 'dbs.cs.hacettepe.edu.tr';
	$port = '1521';
	$db   = 'dbs';
	
	$conn_str = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP) (HOST = ".$host.") (PORT = ".$port.")) )(CONNECT_DATA = (SID = ".$db.")))";

	$conn = oci_connect($user,$pwd,$conn_str);
 
	
	$sql = "BEGIN INSERT_UPLOADWALLPAPER('".$_POST['name']."','".$_POST['subject']."','".$_POST['release']."','".$_SESSION['email']."','".$_POST['photographername']."','".$_POST['photographeremail']."','".$target_dir.$_FILES['file']['name']."'); END;";
	
	$updatephone = oci_parse($conn, $sql);

	oci_execute($updatephone );
	oci_close($conn);
	$_SESSION['addwallpaper']="true";
	header("Location:upload.php");
		
    } else {
        echo "Sorry, there was an error uploading your file.";
	header("Location:upload.php");
    }
}
?>