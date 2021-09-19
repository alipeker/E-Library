<!DOCTYPE html>
<?php
	session_start();
	if($_SESSION["login"]!="true"){
		header("Location:login.php");
	}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="https://dev.cs.hacettepe.edu.tr/~b21427291/images/book.png">

  <title>Profile</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    #leftside,
    #rightside {
      min-height: 100%;
      height: 100%;
      padding-top: 50px;
    }

    #leftside {
      background-color: rgba(0, 126, 243, 0.200)
    }

    #cart {
      left: 10px;
    }

    .menu {
      background-color: #00547E;
      width: 100%;
      height: auto;
      padding: 0 10px;
      position: fixed;
      margin: 0px;
      z-index: 1;
    }

    .menu .navbar-nav>.active>a {
      background-color: #04A3ED;
      color: white;
      font-weight: bold;
    }

    .menu .navbar-nav>li>a {
      font-size: 13px;
      color: white;
      padding: 10px 40px;

    }

    .menu .navbar-nav>li>a:hover {
      background-color: #04A3ED;
    }

    .navbar-header>a {
      font-family: 'Ubuntu Condensed', sans-serif;
      padding-right: 10px;
      margin: 0px;
      text-decoration: none;
      color: white;
      font-size: 25px;
    }

    .navbar-header>a:hover {
      text-decoration: none;
      color: #04A3ED;
    }
  </style>
</head>

<body>
  <div class="menu">
    <div class="navbar-header">
      <a>E-Library</a>
    </div>
    <div>
      <ul class="nav navbar-nav navbar-left">
        <li background-color>
          <a href="/~b21427291/home.php">
            <span class="glyphicon glyphicon-home"></span> Home</a>
        </li>
        <li background-color>
          <a href="/~b21427291/profile.php">
            <span class="glyphicon glyphicon-user"></span> Profile</a>
        </li>
        <?php
	if(isset($_SESSION["user2"])){
	if($_SESSION["user2"] == "true"){
		echo '<li background-color>
          		<a href="/~b21427291/upload.php">
            		<span class="glyphicon glyphicon-upload"></span> Upload</a>
       	 	     </li>';
	}
	}
	?>
	<?php
	if(isset($_SESSION["admin"])){
	if($_SESSION["admin"] != "true"){
		echo '<li background-color>
          <a href="/~b21427291/favorite.php">
            <span class="glyphicon glyphicon-heart"></span> Favorite</a>
        </li>';
	}
	}
	else{
		echo '<li background-color>
          <a href="/~b21427291/favorite.php">
            <span class="glyphicon glyphicon-heart"></span> Favorite</a>
        </li>';
	}
	?>
      </ul>
    </div>
    <div>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="logout.php">
            <span class="glyphicon glyphicon-log-out"></span> Logout</a>
        </li>
      </ul>
    </div>
  </div>


  <div class="container-fluid">
    <div class="row">
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


	$sql= "SELECT * FROM users WHERE email='".$_SESSION["email"]."'";

	$whichuser = oci_parse($conn, $sql);

	oci_execute($whichuser);

	$row = oci_fetch_array($whichuser, OCI_ASSOC);

	if(oci_num_rows($whichuser))  {
		echo $row['PHONENUMBER'];
		echo '<main class="col-sm-12" role="main" id="rightside">
		<form class="container" novalidate style="font-size:16px;" action="updatephonenumber.php" method="post">
    		    <div class="row">
		    <div class="col-md-6 mb-3"><label for="validationCustom01">First name</label>
    		      <p class="form-control-static">'.$row['NAME'].'</p></div>
    		    <div class="col-md-6 mb-3"><label for="validationCustom02">Last name</label>
		      <p class="form-control-static">'.$row['SURNAME'].'</p>
    		    </div></div>
		    <br>
    		    <div class="row">
		    <div class="col-md-12 mb-6"><label for="validationCustom03">Address</label>
    		      <p class="form-control-static">'.$row['ADDRESS'].'</p>
    		    </div>
    		    <div class="col-md-6 mb-6"><br><label for="validationCustom04">Phone Number</label>
    		      <input type="text" name="telephone" value="'.$row['PHONENUMBER'].'" class="form-control" required></div>
		    <div class="col-md-6 mb-6"><br><label for="validationCustom04">Email</label>
		      <p class="form-control-static">'.$row['EMAIL'].'</p>
    		    </div>
    		    </div><br><button class="btn btn-primary" type="submit">Change Phone Number</button>';
		    
			if(isset($_SESSION["phonenumbersuccess"])){
			if($_SESSION["phonenumbersuccess"]=="true"){
				echo '<h5 style="color:green;">Phone number changed.</h5>';
			}
			else if($_SESSION["phonenumbersuccess"]=="false"){
				echo '<h5 style="color:red;">Phone number couldnt change</h5>';
			}
			}
			$_SESSION['phonenumbersuccess']="";
		    
		echo '</div><br>
    	  	</form>
		<form class="container" novalidate style="font-size:16px;" action="updatepassword.php" method="post">
    		    <div class="row">
    		    <div class="col-md-6 mb-6"><br><label for="validationCustom04">Old Password</label>
    		      <input type="password" name="oldpassword" value="" class="form-control" required></div>
		    <div class="col-md-6 mb-6"><br><label for="validationCustom04">New Password</label>
    		      <input type="password" name="newpassword" value="" class="form-control" required></div>
    		    </div><br><button class="btn btn-primary" type="submit">Change Password</button></div>';
		if(isset($_SESSION["passwordsuccess"])){

		    if($_SESSION["passwordsuccess"]=="true"){
				echo '<h5 style="color:green;">Password changed.</h5>';
			}
			else if($_SESSION["passwordsuccess"]=="false"){
				echo '<h5 style="color:red;">Old password did not match!</h5>';
			}
			else if($_SESSION["passwordsuccess"]=="false2"){
				echo '<h5 style="color:red;">Password could not change!</h5>';
			}
			$_SESSION["passwordsuccess"]="";
		}
    	  	echo '</div><br></form></main>';


		if(isset($_SESSION["user2"])){
			if($_SESSION["user2"] == "false"){
				echo '<form action="superuserrequest.php" method="post">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-success" value="Super User Request"></form>';
			}
		}
		
		
	}
	oci_close($conn);
      ?>
      
    </div>
  </div>
</body>

</html>