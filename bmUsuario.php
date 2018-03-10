<?php
  session_start();
  include_once ('inc/conexion.php');
  include_once ('inc/loginControllador.php');
  include_once ('inc/ambUsuarios.php');

  $ControlLogin = new LoginControllador($con);
  $ControlLogin->isLog($_POST);

  if (isset($_POST['formRegistrar'])) { $AbmUsuarios = new AbmUsuarios($con); $AbmUsuarios->NuevoUsuario($_POST); }
  if (isset($_POST['eliminar_usuario'])) { $AbmUsuarios = new AbmUsuarios($con); $AbmUsuarios->Eliminar($_POST); }
  if (isset($_POST['formModificarUsuario'])) { $AbmUsuarios = new AbmUsuarios($con); $AbmUsuarios->Modificar($_POST); }

?>
<?php include_once ('inc/headerPanel.php'); ?>
<?php include_once ('inc/menuPanel.php'); ?>
  <!-- COMIENZO TABLA -->
  <section class="wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-6 col-xs-12">
          <h1 class="text-center"> Administracion de Usuarios </1>
        </div>
        <div class="col-md-6 ">
          <div class="registration">
            <a class="btn btn-success btn-register" data-toggle="modal"  href="bmUsuario.php#modal-register">
              Create an account
            </a>
          </div>
        </div>
      </div>
      <hr>
      <?php
      $resultadoSql = "";
      $total=1;
      $resultadoSql = $con->query("SELECT `id`, `nombre`, `email`, `password`,`permiso` FROM `iwama-ryu-art-usuarios` ORDER BY 1 DESC");
      $sqlTotalFilas = $con->query("SELECT count(1) as total FROM `iwama-ryu-art-usuarios` ORDER BY 1 DESC")->fetch();
      $total = $sqlTotalFilas['total'];

      if ($total== 0) {
        echo "No hay Registros";
      } ?>
      <div class="table-responsive">
      <table id="tabla-md" class="table table-striped table-hover text-center" border="1">
        <thead class="thead-dark">
          <tr class="success">
              <td>#</td>
              <td>Nombre</td>
              <td>Email</td>
              <td>Password</td>
              <td>Privilegios</td>
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
              <td class="maxMedida text-primary"><?=$rows[4]?></td>
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

  <!--COMIENZO MODAL ELIMINAR USUARIOS-->
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
           <form class="form-group has-success" action="" method="post">
             <input type="hidden" id="eliminar_usuario" name="eliminar_usuario" value="">
             <button type="button" id="btn-cancelar"class="btn btn-default" data-dismiss="modal">Cancelar</button>
             <button type="submit" id="btn-eliminar-modal" class="btn btn-primary">Eliminar</button>
           </form>
         </div>
     </div>
    </div>
   </div>
   <!--FIN MODAL ELIMINAR USUARIOS-->

  <!-- COMIENZON MODIFICAR USUARIOS -->
  <div class="modal fade" id="modificarImg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">Modificar</h4>
        </div>
        <div class="modal-body">
          <form role="form" action="" method="POST">
            <div class="form-group">
              <label for="nombre" class="control-label" ></span>Nombre</label>
              <input type="text" id="nombre-modificar" name="nombre_usuario_mod" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="nombre" class="control-label" ></span>Email</label>
              <input type="text" class="form-control" name="email_usuario_mod">
            </div>
            <div class="form-group">
              <label for="nombre" class="control-label" ></span>Password</label>
              <input type="password" class="form-control" name="password_usuario_mod">
            </div>
            <div class="form-group">
              <label for="nombre" class="control-label" ></span>Permiso</label>
              <select class="form-control" name="permiso_usuario_mod" required>
              <option value="" class="text-success bg-warning"></option>
              <?php $categoria = $con->query("SELECT `permiso` FROM `iwama-ryu-art-privilegios` WHERE permiso != '' ORDER BY 1 ASC ");
              foreach ($categoria as $row) {?>
              <option value="<?=$row[0]?>" class="text-success bg-warning"><?=ucwords($row[0])?></option>
              <?php } ?>
              </select>
              <input type="hidden" id="id_mod" name="id_mod" value="">
              <input type="hidden" name="formModificarUsuario" value="ModificarUsuario">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-success">Aceptar</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  <!-- FIN MODIFICAR USUARIOS -->

  <!-- MODAL REGISTRAR USUARIOS-->
  <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
          </button>
          <h3 class="modal-title" id="modal-register-label">Registrar usuario ahora</h3>
          <p>Necesita privilegios de administrador para realizar esta accion:</p>
        </div>

        <div class="modal-body">
          <form role="form" action="" method="post" class="registration-form">
            <div class="form-group">
            <label class="sr-only" for="nombre_usuario">Nombre</label>
              <input type="text" name="nombre_usuario" placeholder="nombre..." class="form-first-name form-control">
            </div>
            <div class="form-group">
              <label class="sr-only" for="password_usuario">Password</label>
              <input type="password" name="password_usuario" placeholder="Password..." class="form-last-name form-control">
            </div>
            <div class="form-group">
              <label class="sr-only" for="email_usuario">Email</label>
              <input type="text" name="email_usuario" placeholder="Email..." class="form-email form-control">
            </div>
            <div class="form-group">
              <select class="form-control" name="permiso_usuario" required>
              <option value="" class="text-success bg-warning"></option>
              <?php $categoria = $con->query("SELECT `permiso` FROM `iwama-ryu-art-privilegios` WHERE permiso != '' ORDER BY 1 ASC ");
              foreach ($categoria as $row) {?>
              <option value="<?=$row[0]?>" class="text-success bg-warning"><?=ucwords($row[0])?></option>
              <?php } ?>
              </select>
            </div>
            <input type="hidden" name="formRegistrar" value="registrar">
            <button type="submit" class="btn-modal2">Sign me up!</button>
          </form>
        </div>

      </div>
    </div>
  </div>
  <!-- FIN MODAL REGISTRAR USUARIOS-->
  <footer>
  </footer>
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/ui/bmUsuario.js"></script>
  </script>
</body>


</html>
