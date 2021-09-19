<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Login User</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    #loginpanel {
        padding: 10% 2%;
        min-height: 100%;
        height: 100%;
    }

    #imagepanel {
      background: url(https://dev.cs.hacettepe.edu.tr/~b21427291/images/library.jpg) no-repeat center center fixed;
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
    <div class="col-sm-4" id="loginpanel" style="background-color:white;">
      <div class="row">
	<div class="col-sm-6" style="padding: 1% 10%;">
		<button class="btn btn-info" onclick="location.href = '/~b21427291/adminlogin.php';">Admin Panel</button>
	</div>
	<div class="col-sm-6" style="padding: 1% 20%;">
		<button class="btn btn-danger"  onclick="location.href = '/~b21427291/signup.php';">Sign Up</button>
	</div>
      </div>
      <h1 class="cover-heading" style="color:#007bff;" align="center">User Login</h1>
 
      <br>
      <form class="form-signin" action="logincontrol.php" method="post">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <br>
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <br>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      </form>
    </div>
    <div class="col-sm-8" id="imagepanel">

    </div>
</body>

</html>