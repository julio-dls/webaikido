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
        <!-- COMIENZO ELIMINAR IMAGENES -->
  <section class="wrapper">
   <div class="container">
       <div class="row">
            <div class="col-lg-8">
            <h1 style="margin-left:100px"> Galeria: Eliminar o Modificar Imagenes</h1>
            </div>
       </div>
   </div>
    <?php $resultadoSql = $con->query("SELECT * FROM productos order by 1 desc"); ?>
    <div class="scrollable">
    <table id="tabla-md" class="table table-striped table-hover text-center" border="1">
      <thead>
        <tr class="success">
            <td>#</td>
            <td>Nombre</td>
            <td>Descripcion</td>
            <td>Nombre Ingles</td>
            <td>Descripcion Ingles</td>
            <td>Categoria</td>
            <td>Estacion</td>
            <td>Accesorios</td>
            <td>Accion</td>
        </tr>
      </thead>
      <tbody>
        <?php
        $col = 1;
        foreach ($resultadoSql as $rows) {?>
          <tr>
            <td><?=$col++?></td>
            <td><?=$rows[1]?></td>
            <td class="maxMedida"><?=$rows[2]?></td>
            <td><?=$rows[3]?></td>
            <td class="maxMedida"><?=$rows[4]?></td>
            <?php $categoria = $con->query("SELECT nombre FROM categorias WHERE categoria_id=".$rows[5]." ")->fetch(); ?>
            <td><?=$categoria['nombre']?></td>
            <?php $estacion = $con->query("SELECT nombre FROM estacion WHERE estacion_id=".$rows[6]." ")->fetch(); ?>
            <td><?=$estacion['nombre']?></td>
            <?php $accesorios = $con->query("SELECT nombre FROM accesorios WHERE accesorios_id=".$rows[7]." ")->fetch(); ?>
            <td><?=$accesorios['nombre']?></td>
            <td class="accion">
                <a href="#" data-id="<?=$rows[0]?>" class="btn btn-eliminar">Eliminar</a> |
                <a href="#" data-id-modificar="<?=$rows[0]?>" class="btn btn-modificar" data-toggle="modal" data-target="#modificarImg">Modificar</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
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
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="exampleModalLabel">Modificar</h4>
    </div>
    <div class="modal-body">
      <form>
        <div class="form-group">
          <label for="nombre" class="control-label" >
            <span class="glyphicon glyphicon glyphicon-asterisk" aria-hidden="true" style="color:red"></span>Nombre</label>
          <input type="text" class="form-control" id="nombre" required>
        </div>
        <div class="form-group">
          <label for="descripcion" class="control-label">Descripcion</label>
          <textarea class="form-control" id="descripcion"></textarea>
        </div>
        <div class="form-group">
          <label for="nombre-ingles" class="control-label">Nombre Ingles</label>
          <input type="text" class="form-control" id="nombre-ingles">
        </div>
        <div class="form-group">
          <label for="descripcion-ingles" class="control-label">Descripcion Ingles</label>
          <textarea class="form-control" id="descripcion-ingles"></textarea>
        </div>
        <div class="form-group">
          <label class="control-label" for="Categoria">Categoria</label>
          <select class="form-control" id="categoria" name="categoria" onfocus="detectionFocus(0)">
          <?php $categoria = $con->query("SELECT categoria_id,nombre FROM categorias");
          foreach ($categoria as $row) {?>
          <option value="<?=$row[0]?>"><?=$row[1]?></option>
          <?php } ?>
        </select>
        </div>
        <div class="form-group">
          <label class="control-label" for="Categoria">Accesorios</label>
          <select class="form-control" id="accesorio" name="accesorios" onfocus="detectionFocus(1)">
          <?php $accesorios = $con->query("SELECT accesorios_id,nombre FROM accesorios");
          foreach ($accesorios as $row) {?>
          <option value="<?=$row[0]?>"><?=$row[1]?></option>
          <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label class="control-label" for="Categoria">Estacion</label>
          <select class="form-control" id="estacion" name="estacion" onfocus="detectionFocus(0)">
          <?php $estacion = $con->query("SELECT estacion_id,nombre FROM estacion");
          foreach ($estacion as $row) {?>
          <option value="<?=$row[0]?>"><?=$row[1]?></option>
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
  <script type="text/javascript" src="js/ui/panel.js"></script>
  </script>
</body>


</html>
