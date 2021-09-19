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

  <title>Home</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    #rightside
    {
      padding-top: 45px;
    }

    #categori{
	border-right: 1px solid black;
	border-left: 1px solid black;
	border-top: 1px solid black;
	border-bottom: 1px solid black;
    }

    #rightside{
	border-right: 1px solid black;
	border-left: 1px solid black;
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

    #gizle{
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
      <nav class="col-sm-1" id="leftside">
	<div style="font-size:20px;color: #00547E;">Type</div>
	<div style="padding-top:6px;">
	<form method="post" action="showall.php">
			<input type="submit" class="btn btn-danger" value="Show All">
	</form>
	</div>
    	<div>
	<form method="post" action="selectbook.php">
			<input type="submit" class="btn btn-danger" value="Book">
	</form>
	</div>
	<div>
	<form method="post" action="selectwallpaper.php">
			<input type="submit" class="btn btn-danger" value="Wall Paper">
	</form>
	</div>
	<div>
	<form method="post" action="selectcaricature.php">
			<input type="submit" class="btn btn-danger" value="Caricature">
	</form>
	</div>

	<form method="post" action="filter.php">
	<div style="font-size:16px;color: #00547E;padding-top:6px;">Categories</div>
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
	$sql5= "select releaseyear from item group by releaseyear";

	$sql= "select SUBJECT from item group by SUBJECT";
	if(isset($_SESSION["selectedbook"])){
		if($_SESSION["selectedbook"]=="true"){
			$sql= "select subject from item i inner join book b on i.id=b.id group by subject";
			$sql5= "select releaseyear from item i inner join book b on i.id=b.id group by releaseyear";
		}
	}
	if(isset($_SESSION["selectedwallpaper"])){
		if($_SESSION["selectedwallpaper"]=="true"){
			$sql= "select subject from item i inner join wallpaper w on i.id=w.id group by subject";
			$sql5= "select releaseyear from item i inner join wallpaper b on i.id=b.id group by releaseyear";
		}
	}
	if(isset($_SESSION["selectedcaricature"])){
		if($_SESSION["selectedcaricature"]=="true"){
			$sql= "select subject from item i inner join caricature c on i.id=c.id group by subject";
			$sql5= "select releaseyear from item i inner join caricature b on i.id=b.id group by releaseyear";
		}
	}

	$items = oci_parse($conn, $sql);

	oci_execute($items);

	$row = oci_fetch_array($items , OCI_ASSOC);


	

	if(oci_num_rows($items)) {
		while($row!=null){
			echo '<label class="radio" style="left:20px;">
      				<input type="radio" name="optradio" value="'.$row['SUBJECT'].'">'.$row['SUBJECT'].'</label>';
			$row = oci_fetch_array($items , OCI_ASSOC);
		}
	}
	
	

	$years = oci_parse($conn, $sql5);

	oci_execute($years);

	$yearrow = oci_fetch_array($years , OCI_ASSOC);

	echo '
	<label for="sel1">Release Year</label>
      	<select class="form-control" name="year">
	<option>Select</option>';

	if(oci_num_rows($years)) {
		while($yearrow!=null){
		foreach ($yearrow as $result) {
			echo "<option>".$result."</option>";
		}
		  $yearrow = oci_fetch_array($years, OCI_ASSOC);
		}
	}
	echo  '</select>';

	echo '<br>
	<button type="submit" class="btn btn-success">Filter</button>
	</form>
      </nav>
      <main class="col-sm-9" role="main" id="rightside">
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

	  $sql2= "select * from item";

	  if(isset($_SESSION["selectedbook"])){
		if($_SESSION["selectedbook"]=="true"){
			$sql2= "select * from item i inner join book b on i.id=b.id";
		}
	  }
	  if(isset($_SESSION["selectedwallpaper"])){
		if($_SESSION["selectedwallpaper"]=="true"){
			$sql2= "select * from item i inner join wallpaper w on i.id=w.id";
		}
	  }
	  if(isset($_SESSION["selectedcaricature"])){
		if($_SESSION["selectedcaricature"]=="true"){
			$sql2= "select * from item i inner join caricature c on i.id=c.id";
		}
	  }

	  $count=0;
	  if(isset($_SESSION["filteryear"])){
		if($_SESSION["filteryear"]!="Select" && $_SESSION["filteryear"]!=""){
			$sql2.=' where releaseyear=';
			$sql2.=$_SESSION["filteryear"];
			$sql2.=' ';
			$count++;
		}
		$_SESSION["filteryear"]="";
	  }
	  if(isset($_SESSION["filtercategori"])){
		if($_SESSION["filtercategori"]!=""){
			if($count==0){
				$sql2.=" where subject='";
			}
			else{
				$sql2.=" and subject='";
			}
			$sql2.=$_SESSION["filtercategori"];
			$sql2.="' ";
		}
		$_SESSION["filtercategori"]="";
	  }

	  echo '</tr>
          	</thead>
          	<tbody>';

	  $items2 = oci_parse($conn, $sql2);
	
	  oci_execute($items2);

	  $row2 = oci_fetch_array($items2 , OCI_ASSOC);

	  if(oci_num_rows($items2)) {
		while($row2!=null){
			 echo '<tr>';
              			
                  		
				$result = $row2['DIRECTORY'];
				
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
						<form method="post" action="addfavorite.php">
							<input name="id" value="'.$row2['ID'].'" id="gizle"></input>
							<input type="submit" class="btn btn-success" value="Add Favorite">
							<a href="'.$row2['DIRECTORY'].'" target="_blank">Download</a>
						</form>
              				</td>
            			</tr>';
			        $row2 = oci_fetch_array($items2 , OCI_ASSOC);
		}
	  }
         
	
          echo '</tfoot>
        </table>
      </main>

      
      <div class="col-sm-2" id="rightside2">
      	<div style="font-size:20px;color: #00547E;">Popular</div>';

		$sql6= "select * from popularitem";

		$popular = oci_parse($conn, $sql6);

		oci_execute($popular);
		$sql7="select * from item where ";

		$popularrow = oci_fetch_array($popular , OCI_ASSOC);
	
		$dizi = array();		

		if(oci_num_rows($popular )) {
			$i=0;
			while($popularrow!=null && $i<3){
				$sql7.= "id=".$popularrow["ITEMID"]." or ";
				$dizi[] = $popularrow["COUNT"];
				$i++;
				$popularrow = oci_fetch_array($popular , OCI_ASSOC);
			}

		}
		$sql7=substr($sql7, 0, -4);
		$popular2 = oci_parse($conn, $sql7);

		


		oci_execute($popular2);

		$popularrow2 = oci_fetch_array($popular2 , OCI_ASSOC);
		echo '<table id="cart" class="table table-hover table-condensed">
					<thead>
            				<tr>
						<th>Name</th>
              					<th>Type</th>
              					<th>Number</th>
						<th></th>
					</tr>
          			</thead> <tbody>';
		$j=0;
		if(oci_num_rows($popular2)) {
			while($popularrow2!=null){
				$type = "";
				if(substr($popularrow2['DIRECTORY'], 6, 1)=="b"){
					$type = "Book";
				}
				else if(substr($popularrow2['DIRECTORY'], 6, 1)=="w"){
					$type = "Wall Paper";
				}
				else if(substr($popularrow2['DIRECTORY'], 6, 1)=="c"){
					$type = "Caricature";
				}

				echo '<tr>
				<td data-th="Subject">'.$popularrow2["NAME"].'</td>
				<td data-th="Subject">'.$type.'</td>
				<td data-th="Subject">'.$dizi[$j].'</td>
				<td data-th="Subject"><a href="'.$popularrow2['DIRECTORY'].'" target="_blank">Download</a></td></tr>';

				$popularrow2 = oci_fetch_array($popular2 , OCI_ASSOC);
				$j++;
			}
		}

     	echo '</tbody></table>
    	<div style="font-size:20px;color: #00547E;">Most Popular Book</div>';

		$sql6= "select * from popularbookquery";

		$popular = oci_parse($conn, $sql6);

		oci_execute($popular);

		$popularrow = oci_fetch_array($popular , OCI_ASSOC);

		echo '<table class="table table-hover table-condensed">
					<thead>
            				<tr>
						<th>Name</th>
              					<th>Type</th>
              					<th>Number</th>
						<th></th>
					</tr></thead> <tbody>';
		

		if(oci_num_rows($popular )) {
			$y=0;
			while($popularrow!=null && $y<3){
			echo '	<tr>
				<td data-th="Subject">'.$popularrow["NAME"].'</td>
				<td data-th="Subject">Book</td>
				<td data-th="Subject">'.$popularrow["COUNT"].'</td>
				<td data-th="Subject"><a href="'.$popularrow['DIRECTORY'].'" target="_blank">Download</a></td></tr>';
				$popularrow = oci_fetch_array($popular , OCI_ASSOC);
				$y++;
			}
		}
		echo '</tbody></table>';

	echo '
    	<div style="font-size:20px;color: #00547E;">Most Popular Caricature</div>';

		$sql6= "select * from popularcaricaturequery";

		$popular = oci_parse($conn, $sql6);

		oci_execute($popular);

		$popularrow = oci_fetch_array($popular , OCI_ASSOC);

		echo '<table class="table table-hover table-condensed">
					<thead>
            				<tr>
						<th>Name</th>
              					<th>Type</th>
              					<th>Number</th>
						<th></th>
					</tr></thead> <tbody>';
		

		if(oci_num_rows($popular )) {
			$y=0;
			while($popularrow!=null && $y<3){
			echo '	<tr>
				<td data-th="Subject">'.$popularrow["NAME"].'</td>
				<td data-th="Subject">Caricature</td>
				<td data-th="Subject">'.$popularrow["COUNT"].'</td>
				<td data-th="Subject"><a href="'.$popularrow['DIRECTORY'].'" target="_blank">Download</a></td></tr>';
				$popularrow = oci_fetch_array($popular , OCI_ASSOC);
				$y++;
			}
		}
		echo '</tbody></table>';

	echo '
    	<div style="font-size:20px;color: #00547E;">Most Wall Paper';

		$sql6= "select * from popularwallpaperquery";

		$popular = oci_parse($conn, $sql6);

		oci_execute($popular);

		$popularrow = oci_fetch_array($popular , OCI_ASSOC);

		echo '<table class="table table-hover table-condensed">
					<thead>
            				<tr>
						<th>Name</th>
              					<th>Type</th>
              					<th>Number</th>
						<th></th>
					</tr></thead> <tbody>';
		

		if(oci_num_rows($popular )) {
			$t=0;
			while($popularrow!=null && $t<3){
			echo '	<tr>
				<td data-th="Subject">'.$popularrow["NAME"].'</td>
				<td data-th="Subject">Wallpaper</td>
				<td data-th="Subject">'.$popularrow["COUNT"].'</td>
				<td data-th="Subject"><a href="'.$popularrow['DIRECTORY'].'" target="_blank">Download</a></td></tr>';
				$popularrow = oci_fetch_array($popular , OCI_ASSOC);
				$t++;
			}
		}
		echo '</tbody></table></div>';


	oci_close($conn);
      ?>
  </div>
</body>

</html>