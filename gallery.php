<?php
  include_once ('inc/header.php');
  include_once ('inc/menu.php');
  include_once ('inc/conexion.php');
  include_once ('inc/search.php');
  include_once ('inc/funcionesUtiles.php');
?>
  <!-- ==== Page Content ==== -->
  <div class="container">
    <div class="col-xs-12">
      <?php if(isset($_GET['categoria'])) {
              if (isset($_SESSION['idioma']) && !empty($_SESSION['idioma'])) {
                $idioma = strtolower($_SESSION['idioma']);
                $sql = ("SELECT `ingles` FROM `categoria` WHERE español like '%".$_GET['categoria']."%'");
                $traducido = $con->query($sql)->fetch();
                $tituloGaleria = $traducido[0];
                $titulo = str_replace('_',' ',$tituloGaleria);
                $titulo = str_replace('-',' ',$titulo);
                $titulo = strtoupper($titulo);
                ?><h1 class="text-center"><?=utf8_encode($titulo)?></h1><?php
              } else {
                $tituloGaleria = $_GET['categoria'];
                $titulo = str_replace('_',' ',$tituloGaleria);
                $titulo = str_replace('-',' ',$titulo);
                $titulo = strtoupper($titulo);
                ?><h1 class="text-center"><?=utf8_encode($titulo)?></h1><?php
              }
      } ?>
      <hr>
    </div>

    <div class="grid">
    <?php

    $limite = 40;

    if(isset($_GET['page'])){
      $pagina = $_GET['page'];
    } else {
      $pagina = 0;
    }
    if(isset($_GET['categoria'])) {

      $sql = 'SELECT `id`, `nombre`, `categoria` FROM `imagenes` WHERE 1 ';
      $sqlTatalFilas = 'SELECT count(1) as total FROM `imagenes` WHERE 1 ';

      if (isset($_GET['formCategria']) && !empty($_GET['formCategria'])) {
        $search = new Search($con);
        $sql .= $search->BuscarPorNombre($_GET);
        $sqlTatalFilas .= $search->TotalFilasBuscarPorNombre ($_GET);
      } else
      if(isset($_GET['categoria'])) {
        $categoria = $_GET['categoria'];
        $sql .= 'and categoria="'.$categoria.'" ';
        $sqlTatalFilas .= 'and categoria="'.$categoria.'" ';
      }
      $tatalFilas = $con->query($sqlTatalFilas)->fetch();
      $cantidad = $tatalFilas['total'];

      $sql .= ' ORDER BY 1 DESC LIMIT '.$limite.' OFFSET '.($pagina*$limite);

      $galleriaImg = $con->query($sql);
      if(!empty($galleriaImg)){
      $indice=0;
      foreach ($galleriaImg as $rows) {

        $path = 'Web_Aikido/images/'.$rows['id']; //'images/'.$rows['id']; //
        trim($path);
        $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/' .$path;

        if($directorio = opendir($carpeta)) {
          while(($archivo = readdir($directorio)) !== false) {
            if($archivo != '.' && $archivo != '..' && stristr($archivo,'_small') !== false) {
              $indice++;
              list($width, $height, $type, $attr) = getimagesize("images/".$rows['id']."/".str_replace('small','big',$archivo));
              $atributos = "Ancho: ".$width."px - Alto: ".$height."px"; ?>
                <div class="grid-item">
                  <div class="thumbnail">
                    <div id="img-repo<?=$indice?>">
                      <a title="Image 1" href="#">
                        <img data-medidas="<?=$atributos?>" class="thumb img-responsive selectorImg" id="image-1"
                        data-toggle="modal" data-target=".bd-example-modal-lg" src="images/<?=$rows['id']?>/<?=utf8_encode($archivo)?>">
                      </a>
                    </div>

                    <div class="caption col-sx-3">
                      <p>
                        <?php $funcionesUltimes = new FuncionesUtiles(); ?>
                        <h3><?=$funcionesUltimes->eliminar_tildes($rows['nombre'])?></h3>
                      </p>
                      <p>
                        <?php if (($rows['categoria'] != 'aikidokas')): ?>
                        <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=95RJ53TE8DTAL"
                        class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Hacer una Donacion">
                          <i class="fa fa-heart" aria-hidden="true"></i></a>
                        <?php endif; ?>
                        <a class="btn btn-sm btn-sm btn-success" role="button" id="btn-imprimir" onclick="printDiv('images/<?=$rows['id']?>/<?=utf8_encode($archivo)?>');"><?php echo BOTON_IMPRIMIR; ?></a>
                      </p>
                    </div>
                  </div>
                </div>
              <?php
              }
            }
            closedir($directorio);
          }
        }
      }
    } ?>
    </div>

  </div>

  <!-- ==== MODAL ==== -->

  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <img id="imagen-modal-centrada" class="col-md-8 col-md-offset-2 col-sm-6 col-xs-12 selectorImgModal img-responsive" src="" alt="Imagenes de modal">
      </div>
      <div class="col-md-4 col-md-offset-4 col-sm-6 col-xs-12">
        <label id="label-modal" or="#"></label>
          <button type="button" id="btnModal" class="btn btn-danger btn-xs btn-block" data-dismiss="modal"><?php echo BOTON_VOLVER; ?></button>
      </div>
    </div>
  </div>

  <!-- ==== FIN DE MODAL ==== -->

  <!-- ==== BOTON BUSCAR ==== -->
  <div>
    <a class="btn btn-danger btn-buscar" data-toggle="modal" data-target="#boton-buscar">
      <i class="fa fa-search" aria-hidden="true"></i></a>
  </div>

  <div class="modal fade" id="boton-buscar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content text-center">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel"><?php echo TITULO_BUSCAR; ?></h4>
        </div>
        <div class="modal-body">
          <form class="navbar-form" role="search" action="gallery.php" method="GET">
            <div class="input-group">
              <input class="form-control" placeholder="<?php echo BUSCAR_NOMBRE; ?>" name="srch-nombre" id="srch-term" type="text" required>
              <div class="input-group-btn">
                <input type="hidden" name="formCategria" value="<?=$tituloGaleria  ? $tituloGaleria : $categoria;?>">
                <input type="hidden" name="categoria" value="<?=$tituloGaleria  ? $tituloGaleria : $categoria;?>">
                <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo BOTON_CERRAR; ?></button>
        </div>
      </div>
    </div>
  </div>
  <!-- ==== FIN DE BOTON BUSCAR ==== -->
<?php include_once ('inc/sidebar.php'); ?>
<?php include_once ('inc/footer.php'); ?>
