<?php include_once ('inc/conexion.php'); ?>
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
            <a href="#">  <i class="fa fa-users fa-lg"></i> Users<span class="arrow"></span></a>
          </li>
          <ul class="sub-menu collapse" id="service">
            <li><a href="login.php">Login</a></li>
            <li><a href="bmUsuario.php">Modificar o Eliminar Usuarios</li>
          </ul>
          <!-- <li data-toggle="collapse" data-target="#new" class="collapsed">
            <a href="#"><i class="fa fa-car fa-lg"></i> Home <span class="arrow"></span></a>
          </li>
          <ul class="sub-menu collapse" id="new">
            <li>#</li>
            <li>Proyecto</li>
            <li>Contacto</li>
          </ul> -->
          <li data-toggle="collapse" data-target="#visitas" class="collapsed">
            <a href="#"><i class="fa fa-car fa-lg"></i> Visitas <span class="arrow"></span></a>
          </li>
          <ul class="sub-menu collapse" id="visitas">
            <li>
              <h3>Total:</h3>
              <?php $totalVisitas = $con->query("SELECT count(1) as total FROM `iwama_ryu_art_vistitas` WHERE 1")->fetch(); ?>
              <div id="showtime"><?=$totalVisitas[0]?></div>
            </li>
            <li>
              <h3>Mas de una vez:</h3>
              <?php $totalVisitasRepetidas = $con->query("SELECT COUNT(1) as total FROM (SELECT COUNT(1) AS total FROM `iwama_ryu_art_vistitas` GROUP BY ip HAVING COUNT(1) > 1) t")->fetch(); ?>
              <div id="showtime"><?=$totalVisitasRepetidas[0]?></div>
            </li>
          </ul>
          <li>
            <a id="logout" href="login.php?logout" class="btn btn-success btn-lg btn-block">logout</a>
          </li>
        </ul>
      </div>
    </div>
</header>
