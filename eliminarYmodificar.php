<?php
  include_once ('inc/conexion.php');
  include_once ('inc/BM.php');

  $bajaModificacion = new BM($con);

  if (!empty($_POST)) { $bajaModificacion->Modificar($_POST); }
  if (!empty($_GET['id'])) { $bajaModificacion->Eliminar($_GET); }

?>

<?php include_once ('inc/menuPanel.php'); ?>

<section class="wrapper">
  <div class="container">
    <div class="row">
        <!-- COMIENZO ELIMINAR IMAGENES -->
         <div class="col-xs-6">
            <h1 class="text-center"> Eliminar o Modificar</1>
          </div>
          <hr>
         </div>
          <?php $resultadoSql = $con->query("SELECT * FROM `imagenes` ORDER BY 1 DESC"); ?>
          <div class="scrollable">
          <table id="tabla-md" class="table table-striped table-hover text-center" border="1">
            <thead>
              <tr class="success">
                  <td>#</td>
                  <td>Nombre</td>
                  <td>Categoria</td>
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
                  <td class="accion">
                      <a data-id="<?=$rows[0]?>" class="btn btn-eliminar btn-xs text-danger">Eliminar</a> |
                      <a data-id-modificar="<?=$rows[0]?>" class="btn btn-modificar btn-xs text-warning"
                        data-toggle="modal" data-target="#modificarImg">Modificar</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          </div>
      </div>
    <hr>
    </div>
</section>
<!-- FIN ELIMINAR IMAGENES -->

        <!--COMIENZO MODAL ESTAS SEGURO ELIMINAR-->
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
         <!--FIN MODAL ESTAS SEGURO ELIMINAR-->

      <!-- COMIENZON MODIFICAR IMAGENES -->
      <div class="modal fade" id="modificarImg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Modificar</h4>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group has-success">
                <label for="nombre" class="control-label" ></span>Nombre</label>
                <input type="text" class="form-control" id="nombre" required>
              </div>
              <div class="form-group has-success">
                <label class="control-label" for="Categoria">Categoria</label>
                <select class="form-control" id="categoria" name="categoria" required>
                <option value="" class="text-success bg-warning">None</option>
                <?php $categoria = $con->query("SELECT `subcategoria` FROM `categoria` WHERE subcategoria!='' ORDER BY 1 ASC ");
                foreach ($categoria as $row) {?>
                <option value="<?=$row[0]?>" class="text-success bg-warning"><?=ucwords($row[0])?></option>
                <?php } ?>
                </select>
              </div>
              </form>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" id="reset" onclick="desblock(true)">Limpiar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary modificar">Aceptar</button>
          </div>
        </div>
        </div>
      </div>
      <!-- FIN MODIFICAR IMAGENES -->
    </div>
  </section>

  <footer>

  </footer>
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/ui/eliminarYmodificar.js"></script>
  </script>
</body>


</html>
