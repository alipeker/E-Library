<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Sign Up</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    body {
      background: url(https://dev.cs.hacettepe.edu.tr/~b21427291/images/library2.jpg) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      min-height: 100%;
      height: 100%;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1 class="well">Registration Form</h1>
	<div class="col-lg-12 well" style="background-color:white;">
		<div class="row">
				<form action="registration.php" method="post">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Email Address</label>
								<input type="text" name="email" placeholder="Enter Email Address" class="form-control" required>

							</div>
							<div class="col-sm-6 form-group">
								<label>Password</label>
								<input type="password" name="password" placeholder="Password" class="form-control" required>							</div>
						</div>	
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Name</label>
								<input type="text" name="name" placeholder="Enter Name" class="form-control" required>
							</div>
							<div class="col-sm-6 form-group">
								<label>Surname</label>
								<input type="text" name="surname" placeholder="Enter Surname" class="form-control" required>
							</div>
						</div>					
						<div class="form-group">
							<label>Address</label>
							<textarea placeholder="Enter Address" name="address" rows="3" class="form-control" required></textarea>
						</div>					
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" name="phonenumber" placeholder="Enter Phone Number Here.." class="form-control" required>
					</div>
					<div class="form-group">
						<label>TC</label>
						<input type="text" name="tc" placeholder="Enter TC" class="form-control" required>
					</div>
					<button type="submit" class="btn btn-lg btn-info">Submit</button>
					<?php	
						session_start();
						if(isset($_SESSION["emailcontrol"])){
							if($_SESSION["emailcontrol"]=="false"){
								echo '<h4 style="color:red;">This email already exist.</h4>';
							}
							$_SESSION["emailcontrol"]=="";
						}
					?>					
					</div>
				</form> 
		</div>
	</div>
	</div>
</body>

</html>