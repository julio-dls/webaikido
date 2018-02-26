<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Iwama Ryu </title>
  <link rel="icon" href="images/logo/logoIwama.png" type="image/png">
  <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/panel.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/normalize.css">
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
            <li class="active"><a href="panel.php">Subir Imagenes o Videos</a></li>
            <li><a href="bmImg.php">Eliminar o Modificar Imagenes</a></li>
            <li><a href="bmVideo.php">Eliminar Videos</a></li>
          </ul>
          <li data-toggle="collapse" data-target="#service" class="collapsed">
            <a href="#">  <i class="fa fa-users fa-lg"></i> Users</a></a>
          </li>
          <ul class="sub-menu collapse" id="service">
            <li><a href="login.php">Login</a></li>
            <li>Modificar o Eliminar</li>
          </ul>
          <li data-toggle="collapse" data-target="#new" class="collapsed">
            <a href="#"><i class="fa fa-car fa-lg"></i> Home <span class="arrow"></span></a>
          </li>
          <ul class="sub-menu collapse" id="new">
            <li>#</li>
            <li>Proyecto</li>
            <li>Contacto</li>
          </ul>
        </ul>
      </div>
    </div>
</header>
