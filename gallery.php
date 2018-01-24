<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<?php
  include_once ('inc/header.php');
  include_once ('inc/menu.php');
?>
  <!-- ==== Page Content ==== -->
  <div class="container">
    <div class="col-xs-6">
      <h1>AIKIDOKAS</h1>
    </div>
    <!-- ucwords($nameGaleria) -->
    <hr>
    <div class="grid">
    <?php
    if(isset($_GET['categoria'])){
      $categoria = $_GET['categoria'];
    }

    $path = 'Web_Aikido/images/' .$categoria; //'images/'.$categoria; //
    trim($path);
    $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/' .$path;

    $count=0;

    if($directorio = opendir($carpeta)){
      while(($archivo = readdir($directorio)) !== false) {
        if($archivo != '.' && $archivo != '..' && stristr($archivo,'.jpg') !== false){
          $count++; ?>

            <div class="grid-item">
              <div class="thumbnail">
                <div id="img-repo<?=$count?>">
                  <a title="Image 1" href="#">
                    <img class="thumb img-responsive selectorImg" id="image-1" data-toggle="modal" data-target=".bd-example-modal-lg" src="images/<?=$categoria?>/<?=$archivo?>">
                  </a>
                </div>
                <div class="caption col-sx-3">
                  <h3>Thumbnail 1</h3>
                  <?php
                    list($width, $height, $type, $attr) = getimagesize("images/".$categoria."/".$archivo."");
                  ?>
                    <p>Ancho de imagen: <?=$width?>px <br> Alto de imagen: <?=$height?>px <br> Tipo de imagen:
                      <?=image_type_to_extension($type)?> <br> </p>

                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="U3D2T5YW6FBJE">
                    <?php if (($_GET['categoria'] != 'aikidokas/Varios') and ($_GET['categoria'] != 'aikidokas/Flia_saito')) {
                      ?>
                      <a class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Hacer una Donacion">
                            <i class="fa fa-heart" aria-hidden="true"></i></a>
                      <?php
                    } ?>

                    <a href="#" class="btn btn-sm btn-success" role="button" onclick="printDiv('img-repo<?=$count?>')">Imprimir</a>
                    </form>

                </div>
              </div>
            </div>

        <?php
        }
      }
      closedir($directorio);
    }?>
    </div>
    <?php include_once ('inc/sidebar.php'); ?>
  </div>

  <!-- ==== MODAL ==== -->

  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <img class="col-md-6 col-md-offset-2 col-sm-6 col-xs-12 selectorImgModal" src="" alt="">
      </div>
      <div class="col-md-6 col-md-offset-2 col-sm-6 col-xs-12">
          <button type="button" id="btnModal" class="btn btn-success btn-xs btn-block" data-dismiss="modal">Volver</button>
      </div>
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
          <h4 class="modal-title" id="exampleModalLabel">Buscar</h4>
        </div>
        <div class="modal-body">
          <form class="navbar-form" role="search">
            <div class="input-group">
              <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- ==== FIN DE BOTON BUSCAR ==== -->
<?php include_once ('inc/footer.php'); ?>
