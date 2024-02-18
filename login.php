<?php
include_once 'lib/config.php';

$config = new Config();
$db = $config->getConnection();

if($_POST){

	include_once 'lib/login.inc.php';
	$login = new Login($db);

	$login->userid = $_POST['username'];
	$login->passid = md5($_POST['password']);

	if($login->login()){
		echo "<script>location.href='index.php'</script>";
	}

	else{
		echo "<script>alert('Gagal Total')</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Metode SAW (Simple Additive Weighting) : Sistem Pendukung Keputusan</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="stats" >
    <div class="container">
		<div class="row">
		  <div class="col-xs-12 col-sm-8 col-md-8">
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-12">
                <img src="assets/img/logo.png" style="margin-left: 35%;" width="200" alt="" />

                </div>
                <div class="col-md-12">
                <h1 style="color: #FFF;text-transform: uppercase;font-size:2em" class="text-center">
                Aplikasi Sistem Pendukung Keputusan pemilihan guru terbaik pada sdn pondok labu 12 dengan Metode <i>Simple Additive Weighting</i> (saw)
                </h1>
                </div>

            </div>

          </div>
		  <div class="col-xs-12 col-sm-4 col-md-4">

		  	<div style="margin-top: 100px;" class="panel panel-default"><div class="panel-body">
		  		<div class="text-center"><h4>Login Admin</h4></div>
		  		<form method="post">
				  <div class="form-group">
				    <label for="InputUsername1">Username</label>
				    <input type="text" class="form-control" name="username"  id="InputUsername1" placeholder="Username">
				  </div>
				  <div class="form-group">
				    <label for="InputPassword1">Password</label>
				    <input type="password" class="form-control" name="password" id="InputPassword1" placeholder="Password">
				  </div>
				  <p><small style="color:#999;">Username: admin dan Password: admin</small></p>
				  <button type="submit" class="btn btn-primary">Login</button>
				</form>
		  	</div></div>

		  </div>
		</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>