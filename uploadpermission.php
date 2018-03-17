<?php
	session_start();
	if($_SESSION["login"]!="true"){
		header("Location:login.php");
	}
?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="https://dev.cs.hacettepe.edu.tr/~b21427291/images/book.png">

  <title>Upload Permission</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    #rightside
    {
      padding-top: 45px;
    }


    #leftside,
    #rightside2 {
	padding-top: 55px;
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

    }

    .navbar-header>a {
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

    #gizle1,#gizle2,#gizle3,#gizle4{
	display: none;
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
	<?php
	if(isset($_SESSION["admin"])){
	if($_SESSION["admin"] == "true"){
		echo '<li background-color>
          <a href="/~b21427291/uploadpermission.php">
            <span class="glyphicon glyphicon-ok"></span> Upload Permission</a>
        </li>';
	}
	}
	if(isset($_SESSION["admin"])){
	if($_SESSION["admin"] == "true"){
		echo '<li background-color>
          <a href="/~b21427291/superuserpermission.php">
            <span class="glyphicon glyphicon-user"></span> Upload Permission</a>
        </li>';
	}
	}
	?>
	<?php
	if(isset($_SESSION["admin"])){
	if($_SESSION["admin"] != "true"){
		echo '<li background-color>
          <a href="/~b21427291/profile.php">
            <span class="glyphicon glyphicon-user"></span> Profile</a>
        </li>';
	}
	}
	else{
		echo '<li background-color>
          <a href="/~b21427291/profile.php">
            <span class="glyphicon glyphicon-user"></span> Profile</a>
        </li>';
	}
	?>

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

	echo '
      <main class="col-sm-12" role="main" id="rightside">
        <table id="cart" class="table table-hover table-condensed">
          <thead>
            <tr>
	    	<th></th>
		<th>Name</th>
              	<th>Type</th>
              	<th>Subject</th>
              	<th>Upload Date</th>
              	<th>Release Year</th>
              	<th></th>
		</tr>
          	</thead>
          	<tbody>';

	  $sql2= "select * from upload_item";
	  
	  echo '</tr>
          	</thead>
          	<tbody>';

	  $items2 = oci_parse($conn, $sql2);
	
	  oci_execute($items2);

	  $row2 = oci_fetch_array($items2 , OCI_ASSOC);

	  if(oci_num_rows($items2)) {
		while($row2!=null){
			 echo '<tr>';
              			
				$result = $row2['ITEMDIRECTORY'];
				
				$result2 = "";
				if(substr($result, 6, 1)=="b"){
					$result2="Book";
					echo '<td data-th="image">
                    			<img src="https://dev.cs.hacettepe.edu.tr/~b21427291/images/book.png" height="80" width="80">';
				}
				else if(substr($result, 6, 1)=="c"){
					$result2="Caricature";
					echo '<td data-th="image">
                    			<img src="https://dev.cs.hacettepe.edu.tr/~b21427291/images/caricature.png" height="80" width="80">';
				}
				else if(substr($result, 6, 1)=="w"){
					$result2="Wallpaper";
					echo '<td data-th="image">
                    			<img src="https://dev.cs.hacettepe.edu.tr/~b21427291/images/wallpaper.png" height="80" width="80">';
				}

              			echo	'</td><td data-th="name">
                    			<h4>'.$row2['NAME'].'</h4>
              			</td><td data-th="Type">'.$result2.'</td>';
              				
				echo '<td data-th="Subject">'.$row2['SUBJECT'].'</td>
              				<td data-th="UploadDate">'.$row2['UPLOADDATE'].'</td>
              				<td data-th="ReleaseYear">'.$row2['RELEASEYEAR'].'</td>
              				<td class="actions" data-th="">
						<a href="'.$row2['ITEMDIRECTORY'].'" target="_blank">Download</a>
						<form action="onay.php" method="post">
							<input type="text" value="'.$row2['USEREMAIL'].'" id="gizle1" name="id2">
							<input type="text" value="'.$row2['UPLOADID'].'" id="gizle2" name="id">
							<input class="btn-success" type="submit" value="approve">
						</form>
						<form action="red.php" method="post">
							<input type="text" value="'.$row2['USEREMAIL'].'" id="gizle3" name="id2">
							<input type="text" value="'.$row2['UPLOADID'].'" id="gizle4" name="id">
							<input class="btn-danger" type="submit" value="disapprove">
						</form>
              				</td>
					
            			</tr>';
			        $row2 = oci_fetch_array($items2 , OCI_ASSOC);
		}
	  }
         
	
          echo '</tfoot>
        </table>
      </main>';

      oci_close($conn);
      ?>

    </div>
  </div>
</body>

</html>