<nav class="navbar navbar-default navbar-fixed-top nav" role="navigation">
  <div class="container">
    <div class="row">
      <!-- LOGO -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
          <ul class="nav-titulo-icon">
            <li><a class="navbar-brand" href="index.php">Iwama Ryu Art</a></li>
            <li><img class="icon-personalizado" src="images/logo/logoIwama.png" alt="logo"></li>
            <li><a class="heart" href=""></a></li>
          </ul>
      </div>
      <!-- FIN LOGO -->
      <!-- MENU -->

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav main-nav  clear navbar-right">
          <li><a class="navactive color_animation scroll-lento" href="#bienvenidos"><?php echo MENU_BIENVENIDOS; ?></a></li>
          <li class="dropdown">
            <a href="#" class="navactive dropdown-toggle color_animation" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false"><?php echo MENU_TECNICAS; ?> <span class="caret"></span></a>
            <ul class="dropdown-menu dropdown-menu-left">
              <li><a href="gallery.php?categoria=manos"><?php echo SUBMENU_MANOS; ?></a></li>
              <li role="separator" class="divider"></li>
              <li><a href="gallery.php?categoria=solo"><?php echo SUBMENU_SOLO; ?></a></li>
              <li role="separator" class="divider"></li>
              <li><a href="gallery.php?categoria=parejas"><?php echo SUBMENU_PAREJAS; ?></a></li>
              <li role="separator" class="divider"></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="navactive dropdown-toggle color_animation" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false"><?php echo MENU_AIKIDOKAS; ?> <span class="caret"></span></a>
            <ul class="dropdown-menu dropdown-menu-left">
              <li><a href="gallery.php?categoria=flia_saito"><?php echo SUBMENU_FAMILIA_SAITO; ?></a></li>
              <li role="separator" class="divider"></li>
              <li><a href="gallery.php?categoria=aikidokas"><?php echo SUBMENU_AIKIDOKAS; ?></a></li>
              <li role="separator" class="divider"></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="navactive dropdown-toggle color_animation" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false"><?php echo MENU_EXTRAS; ?> <span class="caret"></span></a>
            <ul class="dropdown-menu dropdown-menu-left">
              <li><a href="gallery.php?categoria=moldes"><?php echo SUBMENU_MOLDES; ?></a></li>
              <li role="separator" class="divider"></li>
              <li><a href="gallery.php?categoria=tarjetas"><?php echo SUBMENU_TARJETAS; ?></a></li>
              <li role="separator" class="divider"></li>
              <li><a href="gallery.php?categoria=varios"><?php echo SUBMENU_VARIOS; ?></a></li>
              <li role="separator" class="divider"></li>
            </ul>
          </li>
          <li><a class="navactive color_animation" href="gallery.php?categoria=kamidana"><?php echo MENU_KAMIDANAS; ?></a></li>
          <li><a class="navactive color_animation " href="gallery.php?categoria=hanmi"><?php echo MENU_HANMI; ?></a></li>
          <li><a class="navactive color_animation scroll-lento" href="#videos"><?php echo MENU_VIDEOS; ?></a></li>
          <li><a class="navactive color_animation scroll-lento" href="#proyectos"><?php echo MENU_PROYECTO; ?></a></li>
          <li><a class="navactive color_animation scroll-lento" href="#contacts"><?php echo MENU_CONTACTO; ?></a></li>
        </ul>
      </div>
      <!-- FIN DE MENU -->
    </div>
  </div>
</nav>
