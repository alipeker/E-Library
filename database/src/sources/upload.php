<?php
	session_start();
	if(isset($_SESSION["user2"])){
	if($_SESSION["login"]!="true" || $_SESSION["user2"] == "false"){
		header("Location:login.php");
	}
	
		if($_SESSION["user2"] == "false"){
			header("Location:login.php");
		}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="https://dev.cs.hacettepe.edu.tr/~b21427291/images/book.png">

  <title>Upload</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    #rightside {
      min-height: 100%;
      height: 100%;
      padding-top: 100px;
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
        
        <li background-color>
          <a href="/~b21427291/favorite.php">
            <span class="glyphicon glyphicon-heart"></span> Favorite</a>
        </li>
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
    <div class="row" id="rightside">
	<div id="Upload" class="col-sm-4" style="border-right: 1px solid black;">
		<form class="form-inline" method="post" action="https://dev.cs.hacettepe.edu.tr/~b21427291/uploadbook.php" enctype="multipart/form-data">
			<h4><a style="color:#006699;">Upload Book</a>(.pdf format)</h4>
			<input type="text" name="bookname" placeholder="Book Name" class="form-control" required>
			<input type="text" name="booksubject" placeholder="Subject" class="form-control" required>
			<input type="number" name="bookrelease" placeholder="Release Year" id="release" class="form-control" required>
			<input type="number" name="booknumberofpages" placeholder="Number of Pages" id="numberofpages" class="form-control" required>
			<input type="text" name="booklanguage" placeholder="Language" class="form-control" required>
			<input type="text" name="authorname" placeholder="Author Name" class="form-control" required>
			<input type="text" name="authoremail" placeholder="Author Email" class="form-control" required>
			<input type="text" name="publishername" placeholder="Publisher Name" class="form-control" required>
			<input type="text" name="publisheremail" placeholder="Publisher Email" class="form-control" required><br><br>
			<input type="file" name="file">
			<br>
			<input type="submit" class="btn btn-success" value="Upload"><br><br>
			<?php
				
				if(isset($_SESSION["addbook"])){

				if($_SESSION['addbook']=="true"){
					echo '<h4 style="color:green;">Book Add Successful</h4>';
				}
				else if($_SESSION['addbook']==" "){
					
				}
				else{
					echo '<h4 style="color:red;">Installation failed.</h4>';
				}
				$_SESSION['addbook']=" ";
				}
			?>
		</form>
	</div>
	<div id="Upload" class="col-sm-4">
		<form class="form-inline" method="post" action="https://dev.cs.hacettepe.edu.tr/~b21427291/uploadwallpaper.php" enctype="multipart/form-data">
			<h4><a style="color:#006699;">Upload Wallpaper</a>(.png,.jpeg format)</h4>
			<input type="text" name="name" placeholder="Wallpaper Name" class="form-control" required >
			<input type="text" name="subject" placeholder="Subject" class="form-control" required>
			<input type="number" name="release" placeholder="Release Year" class="form-control" required>
			<input type="text" name="photographername" placeholder="Photographer Name" class="form-control" required>
			<input type="text" name="photographeremail" placeholder="Photographer Email" class="form-control" required><br><br>
			<input type="file" name="file">
			<br>
			<input type="submit" class="btn btn-success" value="Upload"><br><br>
			<?php
				
				if(isset($_SESSION["addwallpaper"])){

				if($_SESSION['addwallpaper']=="true"){
					echo '<h4 style="color:green;">Wall Paper Add Successful</h4>';
				}
				else if($_SESSION['addwallpaper']==""){
					
				}
				else{
					echo '<h4 style="color:red;">Installation failed.</h4>';
				}
				$_SESSION['addwallpaper']="";
				}
			?>
		</form>
	</div>
	<div id="Upload" class="col-sm-4" style="border-left: 1px solid black;">
		<form class="form-inline" method="post" action="https://dev.cs.hacettepe.edu.tr/~b21427291/uploadcaricature.php" enctype="multipart/form-data">
			<h4><a style="color:#006699;">Upload Caricature</a>(.png,.jpeg format)</h4>
			<input type="text" name="name" placeholder="Caricature Name" class="form-control" required>
			<input type="text" name="subject" placeholder="Subject" class="form-control" required>
			<input type="number" name="release" placeholder="Release Year" class="form-control" required>
			<input type="text" name="language" placeholder="Language" class="form-control" required>
			<input type="text" name="uploadername" placeholder="Uploader Name" class="form-control" required>
			<input type="text" name="uploaderemail" placeholder="Uploader Email" class="form-control" required>
			<input type="text" name="caricaturistname" placeholder="Caricaturist Name" class="form-control" required>
			<input type="text" name="caricaturistemail" placeholder="Caricaturist Email" class="form-control" required><br><br>
			<input type="file" name="file">
			<br>
			<input type="submit" class="btn btn-success" value="Upload"><br><br>
			<?php
				if(isset($_SESSION["addcaricature"])){

				if($_SESSION['addcaricature']=="true"){
					echo '<h4 style="color:green;">Caricature Add Successful</h4>';
				}
				else if($_SESSION['addcaricature']==" "){
					
				}
				else{
					echo '<h4 style="color:red;">Installation failed.</h4>';
				}
				$_SESSION['addcaricature']=" ";
				}
			?>
		</form>
	</div>
    </div>
  </div>
</body>

</html>