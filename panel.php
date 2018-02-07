<?php
  include_once ('inc/conexion.php');
  include_once ('inc/panel.php');

  $panelABMObj = new panelABM($con);

  if(!empty($_POST) && !empty($_FILES)) {
    $panelABMObj->alta($_POST,$_FILES);
  }

?>
  <?php include_once ('inc/menuPanel.php'); ?>

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
              <select class="form-control" id="categoria" name="categoria" required>
              <option value="" class="text-success bg-warning">None</option>
              <?php $categoria = $con->query("SELECT `subcategoria` FROM `categoria` WHERE subcategoria!='' ORDER BY 1 ASC ");
              foreach ($categoria as $row) {?>
              <option value="<?=$row[0]?>" class="text-success bg-warning"><?=ucwords($row[0])?></option>
              <?php } ?>
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
