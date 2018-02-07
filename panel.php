<?php
  include_once ('inc/conexion.php');
  include_once ('inc/panel.php');

  $panelABMObj = new panelABM($con);

  if(!empty($_POST) && !empty($_FILES)) {
    $panelABMObj->alta($_POST,$_FILES);
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Iwama Ryu Art</title>
  <link rel="icon" href="images/logo/logo.png" type="image/png">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css" media="screen" type="text/css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/panel.css">
</head>

<body>
  <header>
    <div class="nav-side-menu">
      <div class="brand">Menu</div>
      <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

      <div class="menu-list">

        <ul id="menu-content" class="menu-content collapse out">
          <li>
            <a href="#"><i class="fa fa-dashboard fa-lg"></i> Principal</a>
          </li>
          <li data-toggle="collapse" data-target="#products" class="collapsed active">
            <a href="#"><i class="fa fa-gift fa-lg"></i> Galeria <span class="arrow"></span></a>
          </li>
          <ul class="sub-menu collapse" id="products">
            <li class="active"><a href="#">Subir imagenes</a></li>
            <li><a href="#">Eliminar o Modificar</a></li>
            <li><a href="#">Buttons</a></li>
          </ul>
          <li data-toggle="collapse" data-target="#service" class="collapsed">
            <a href="#">  <i class="fa fa-users fa-lg"></i> Users</a></a>
          </li>
          <ul class="sub-menu collapse" id="service">
            <li>Nuevo Usuario</li>
            <li>Login</li>
            <li>Modificar o Eliminar</li>
          </ul>
          <li data-toggle="collapse" data-target="#new" class="collapsed">
            <a href="#"><i class="fa fa-car fa-lg"></i> Home <span class="arrow"></span></a>
          </li>
          <ul class="sub-menu collapse" id="new">
            <li>Videos</li>
            <li>Proyecto</li>
            <li>Contacto</li>
          </ul>
        </ul>
      </div>
    </div>

  </header>

  <section class="wrapper">
    <div class="container">
      <div class="row">
        <div class="form-panel col-md-8 col-md-offset-2">
          <h3 class="mb"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Cargar Imagens</h3>
          <form class="form-horizontal tasi-form text-center" action="panel.php" method="post" enctype="multipart/form-data">
            <div class="form-group has-success">
              <div class="col-lg-6 col-md-6 col-sm-4 ">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre">
              </div>
            </div>
            <div class="form-group has-success">
              <div class="col-lg-6 col-md-6 col-sm-4 ">
                <select class="form-control" name="categoria" required>
                  <option value="">None</option>
                  <option value="aikidokas">Aikidokas</option>
                  <option value="flia_saito">Flia Saito</option>
                  <option value="kamidanas">Kamidana</option>
                  <option value="hamni">Hamni</option>
                  <option value="manos">Manos</option>
                  <option value="pareja">Pareja</option>
                  <option value="modelo">Modelo</option>
                  <option value="targeta">Targeta</option>
                  <option value="varios">Varios</option>
                </select>
              </div>
            </div>
            <div class="form-group has-success">
              <div class="col-lg-6 col-md-6 col-sm-4 ">
                <input type="file" class="form-control" name="ContenedorImg[]" accept="*.jpg">
              </div>
            </div>
            <div class="form-group has-success">
              <div class="col-lg-6 col-md-4 col-sm-4 ">
                <button id="inputSuccess" type="submit" class="btn btn-primary btn-lg btn-block">Aplicar</button>
              </div>
            </div>
            <div class="form-group has-success">
              <div class="col-lg-6 col-md-4 col-sm-4 ">
                <button id="inputSuccess" type="reset" class="btn btn-warning btn-lg btn-block" onclick="desblock(true)">Limpiar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <footer>

  </footer>
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/ui/panel.js"></script>
  </script>
</body>


</html>
