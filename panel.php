<?php
  session_start();

  include_once ('inc/conexion.php');
  include_once ('inc/panel.php');
  include_once ('inc/loginControllador.php');

  $ControlLogin = new LoginControllador($con);
  $ControlLogin->isLog($_POST);

  if (isset($_POST['form1']) && (!empty($_POST['form1']))) {
    if(!empty($_POST) && !empty($_FILES)) {
      $panelABMObj = new panelABM($con);
      $panelABMObj->Alta($_POST,$_FILES);
    }
  }
  if (isset($_POST['form2']) && (!empty($_POST['form2']))) {
    $panelABMObj = new panelABM($con);
    $panelABMObj->AltaVideos($_POST,$_FILES);
  }
  if (isset($_POST['form3']) && (!empty($_POST['form3']))) {
    $panelABMObj = new panelABM($con);
    $panelABMObj->AltaImagenProyectoCortometraje($_POST,$_FILES);
  }
?>
  <?php include_once ('inc/headerPanel.php'); ?>
  <?php include_once ('inc/menuPanel.php'); ?>

  <section id="subir-imagenes" class="wrapper">
    <div class="container">
      <div class="row">
        <h3 class="mb text-center"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Cargar Imagenes</h3>
        <div class="form-panel col-md-8 col-md-offset-2">
          <form class="form-horizontal tasi-form text-center" action="panel.php" method="post" enctype="multipart/form-data">
            <div class="form-group has-success">
              <div class="col-lg-6 col-md-6 col-sm-4 ">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre">
              </div>
            </div>
            <div class="form-group has-success">
              <div class="col-lg-6 col-md-6 col-sm-4">
              <select class="form-control" id="#" name="categoria" required>
              <option value="" class="text-success bg-warning">None</option>
              <?php $categoria = $con->query("SELECT `subcategoria` FROM `categoria` WHERE subcategoria!='' ORDER BY 1 ASC ");
              foreach ($categoria as $row) {?>
              <option value="<?=$row[0]?>" class="text-success bg-warning"><?=ucwords($row[0])?></option>
              <?php } ?>
              </select>
              </div>
            </div>
            <div class="form-group has-success">
              <div class="col-lg-6 col-md-6 col-sm-4 mutipleTrueOrFalse">
                <input id="input-image" type="file" class="form-control" name="ContenedorImg[]" accept="*.jpg" required>
              </div>
            </div>
            <div class="form-group has-success">
              <div class="col-lg-6 col-md-4 col-sm-4 ">
                <input type="hidden" name="form1" value="enviado">
                <button id="#" type="submit" class="btn btn-primary btn-lg btn-block">Aplicar</button>
              </div>
            </div>
            <div class="form-group has-success">
              <div class="col-lg-6 col-md-4 col-sm-4 ">
                <button id="#" type="reset" class="btn btn-warning btn-lg btn-block">Limpiar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section id="subir-videos" class="wrapper">
    <div class="container">
      <div class="row">
        <h3 class="mb text-center"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Cargar Videos</h3>
        <div class="form-panel col-md-8 col-md-offset-2">
          <form class="form-horizontal tasi-form text-center" action="panel.php" method="post" enctype="multipart/form-data">
          <div class="form-group has-success">
            <div class="col-lg-6 col-md-6 col-sm-4 ">
              <input type="text" class="form-control" name="titulo" placeholder="Titulo" required>
            </div>
          </div>
          <div class="form-group has-success">
            <div class="col-lg-6 col-md-6 col-sm-4 ">
              <textarea type="text" class="form-control" name="descripcion" placeholder="Descripcion" rows="5" style="resize: none" required></textarea>
            </div>
          </div>
          <div class="form-group has-success">
            <div class="col-lg-6 col-md-6 col-sm-4 ">
              <input type="text" class="form-control" name="url" placeholder="Url Video" required>
            </div>
          </div>
          <div class="form-group has-success">
            <div class="col-lg-6 col-md-4 col-sm-4 ">
              <input type="hidden" name="form2" value="enviar">
              <button id="#" type="submit" class="btn btn-primary btn-lg btn-block">Aplicar</button>
            </div>
          </div>
          <div class="form-group has-success">
            <div class="col-lg-6 col-md-4 col-sm-4 ">
              <button id="#" type="reset" class="btn btn-warning btn-lg btn-block">Limpiar</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section id="subir-imagen-proyectoCortometraje" class="wrapper">
    <div class="container">
      <div class="row">
        <h3 class="mb text-center"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Cargar Imagenes Proyecto Cortometraje</h3>
        <div class="form-panel col-md-8 col-md-offset-2">
          <form class="form-horizontal tasi-form text-center" action="panel.php" method="post" enctype="multipart/form-data">
            <div class="form-group has-success">
              <div class="col-lg-6 col-md-6 col-sm-4 ">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre">
              </div>
            </div>
            <div class="form-group has-success">
              <div class="col-lg-6 col-md-6 col-sm-4 ">
                <select class="form-control" id="#" name="categoria" required>
                  <option value="" class="text-success bg-warning">None</option>
                  <option value="proyectoCortometraje" class="text-success bg-warning">Proyecto Cortometraje</option>
                </select>
              </div>
            </div>
            <div class="form-group has-success">
              <div class="col-lg-6 col-md-6 col-sm-4 mutipleTrueOrFalse">
                <input id="#" type="file" class="form-control" name="proyectoCortometrajeImages[]" accept="*.jpg" required>
              </div>
            </div>
            <div class="form-group has-success">
              <div class="col-lg-6 col-md-4 col-sm-4 ">
                <input type="hidden" name="form3" value="cortometraje">
                <button id="#" type="submit" class="btn btn-primary btn-lg btn-block">Aplicar</button>
              </div>
            </div>
            <div class="form-group has-success">
              <div class="col-lg-6 col-md-4 col-sm-4 ">
                <button id="#" type="reset" class="btn btn-warning btn-lg btn-block">Limpiar</button>
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
