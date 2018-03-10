<?php
  session_start();
  include_once ('inc/conexion.php');
  include_once ('inc/bmVideos.php');
  include_once ('inc/loginControllador.php');

  $ControlLogin = new LoginControllador($con);
  $ControlLogin->isLog($_POST);

  if (!empty($_POST)) { $bajaModificacion = new BM($con); $bajaModificacion->Modificar($_POST); }
  if (!empty($_GET['id'])) { $bajaModificacion = new BM($con); $bajaModificacion->Eliminar($_GET); }

?>
<?php include_once ('inc/headerPanel.php'); ?>
<?php include_once ('inc/menuPanel.php'); ?>
  <!-- COMIENZO TABLA -->
  <section class="wrapper">
    <div class="container">
      <div class="row">
      <!-- COMIENZO ELIMINAR IMAGENES -->
       <div class="col-md-6 col-lg-6 col-xs-12">
          <h1 class="text-center"> Videos </1>
        </div>
      </div>
      <hr>
      <?php
      $resultadoSql = "";
      $total=1;
      if (isset($_GET['titulo']) && !empty($_GET['titulo'])) {
         $resultadoSql = $con->query("SELECT * FROM `video` WHERE titulo like '%".$_GET['titulo']."%' ORDER BY 1 DESC");
         $sqlTotalFilas = $con->query("SELECT count(1) as total FROM `video` WHERE titulo = '".$_GET['titulo']."' ORDER BY 1 DESC")->fetch();
         $total = $sqlTotalFilas['total'];
      } else {
        $resultadoSql = $con->query("SELECT * FROM `video` ORDER BY 1 DESC");
      }
      if ($total== 0) {
        echo "No hay Registros";
      } ?>
      <div class="table-responsive">
      <table class="table table-striped table-hover text-center" border="1">
        <thead class="thead-dark">
          <tr class="success">
              <td>#</td>
              <td>Titulo</td>
              <td>Descripcion</td>
              <td>Url</td>
              <td>Accion</td>
          </tr>
        </thead>
        <tbody>
          <?php
          $col = 1;
          foreach ($resultadoSql as $rows) {?>
            <tr>
              <td><?=$col++?></td>
              <td class="maxMedida text-primary"><?=$rows[1]?></td>
              <td class="maxMedida text-primary"><?=$rows[2]?></td>
              <td class="maxMedida text-primary"><?=$rows[3]?></td>
              <td class="accion">
                  <a data-id="<?=$rows[0]?>" class="btn btn-eliminar btn-xs text-danger">Eliminar</a> |
                  <a data-id-modificar="<?=$rows[0]?>" data-nombre="<?=$rows[1]?>" class="btn btn-modificar btn-xs text-warning"
                    data-toggle="modal" data-target="#modificarImg">Modificar</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
  <!-- FIN TABLA -->

  <!--COMIENZO MODAL ELIMINAR IMAGENES-->
  <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span></button>
             <h4 class="modal-title text-center">Eliminar</h4>
         </div>
         <div class="modal-body">
             <p class="text-center">¿Seguro desea eliminar esta imagen?&hellip;</p>
         </div>
         <div class="modal-footer">
             <button type="button" id="btn-cancelar"class="btn btn-default" data-dismiss="modal">Cancelar</button>
             <button type="button" id="btn-aceptar" values="eliminar" class="btn btn-primary">Eliminar</button>
         </div>
     </div>
    </div>
   </div>
   <!--FIN MODAL ELIMINAR VIDEOS-->

  <!-- COMIENZON MODIFICAR VIDEO -->
  <div class="modal fade" id="modificarImg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">Modificar</h4>
        </div>
        <div class="modal-body">
          <form action="BM.php">
            <div class="form-group has-success">
              <label for="nombre" class="control-label" ></span>Nombre</label>
              <input type="text" class="form-control" id="nombreModal" required>
            </div>
            <div class="form-group has-success">
              <label for="nombre" class="control-label" ></span>Descripcion</label>
              <textarea type="text" class="form-control" id="descripcion" resize:"none" required></textarea>
            </div>
            <div class="form-group has-success">
              <label for="nombre" class="control-label" ></span>URL</label>
              <input type="text" class="form-control" id="url" required>
            </div>
            </form>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary modificar">Aceptar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- FIN MODIFICAR VEDEOS -->
  <footer>
  </footer>
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/ui/eliminarYmodificarVideos.js"></script>
  </script>
</body>


</html>
