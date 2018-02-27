<?php
  session_start();
  include_once ('inc/conexion.php');
  include_once ('inc/loginControllador.php');

  if (isset($_POST)) { $ControlLogin = new LoginControllador($con); $ControlLogin->VerificarUsuario($_POST); }
  if (isset($_GET)) { $ControlLogin = new LoginControllador($con); $ControlLogin->logout($_GET); }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <title>Iwama Ryu Art</title>
    <link rel="icon" href="images/logo/logoIwama.png" type="image/png">
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
    <link href="css/panel.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
  </head>

  <body>

	<div id="login-page">
  	<div class="container">

      <form class="form-login" action="login.php" method="post">
        <h2 class="form-login-heading">sign in now</h2>
        <div class="login-wrap">
            <input type="text" name="nombre_usuario" class="form-control" placeholder="User ID" autofocus>
            <br>
            <input type="password" name="pass" class="form-control" placeholder="Password">
            <label class="checkbox">
                <span class="pull-right">
                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>

                </span>
            </label>
            <button class="btn btn-success btn-block" href="index.html" type="submit"><i class="fa fa-sign-out" aria-hidden="true"></i> SIGN IN</button>
            <hr>
        </div>
        <!-- Modal Forgot Password -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Forgot Password ?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Enter your e-mail address below to reset your password.</p>
                        <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button class="btn btn-success" type="button">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Forgot Password -->
      </form>
    </div>
	</div>

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>
