<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Admin Login</title>
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
      <button class="btn btn-info" style="padding: 1% 10%;" onclick="location.href = '/~b21427291/login.php';">User Panel</button>
      <h1 class="cover-heading" style="color:#0052cc;" align="center">Admin Login</h1>
      <br>

      <form class="form-signin" action="adminlogincontrol.php" method="post">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <br>
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <br>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <span></span>
      </form>
      <h4 style="color:green">Test admin e-mail: admin1@hotmail.com</h4> 
      <h4 style="color:green">Test admin e-mail: 123</h4>
    </div>
    <div class="col-sm-8" id="imagepanel">

    </div>
 
</body>

</html>
