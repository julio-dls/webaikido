<?php
session_start();
include_once ('inc/conexion.php');
include_once ('inc/loginControllador.php');

if (isset($_POST)) {
  $ControlLogin = new LoginControllador($con);
  $ControlLogin->VerificarUsuario($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <title>Iwama Ryu Art</title>
    <link rel="icon" href="images/logo/logoIwama.png" type="image/png">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
    <link href="css/panel.css" rel="stylesheet">
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

		            <div class="registration">
		                Don't have an account yet?<br/>
		                <a class="" data-toggle="modal"  href="login.html#modal-register">
		                    Create an account
		                </a>
		            </div>
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

            <!-- MODAL Register-->
            <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h3 class="modal-title" id="modal-register-label">Sign up now</h3>
                    <p>Fill in the form below to get instant access:</p>
                  </div>

                  <div class="modal-body">
                    <form role="form" action="" method="post" class="registration-form">
                      <div class="form-group">
                      <label class="sr-only" for="form-first-name">First name</label>
                        <input type="text" name="form-first-name" placeholder="First name..." class="form-first-name form-control" id="form-first-name">
                      </div>
                      <div class="form-group">
                        <label class="sr-only" for="form-last-name">Last name</label>
                        <input type="text" name="form-last-name" placeholder="Last name..." class="form-last-name form-control" id="form-last-name">
                      </div>
                      <div class="form-group">
                        <label class="sr-only" for="form-email">Email</label>
                        <input type="text" name="form-email" placeholder="Email..." class="form-email form-control" id="form-email">
                      </div>
                      <div class="form-group">
                        <label class="sr-only" for="form-about-yourself">About yourself</label>
                        <textarea name="form-about-yourself" placeholder="About yourself..." class="form-about-yourself form-control" id="form-about-yourself"></textarea>
                      </div>
                      <button type="submit" class="btn-modal2">Sign me up!</button>
                    </form>
                  </div>

                </div>
              </div>
		      </form>

	  	</div>
	  </div>

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>
