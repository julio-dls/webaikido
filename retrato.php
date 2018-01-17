<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<?php
  include_once ('inc/header.php');
  include_once ('inc/menu.php');
?>
  <!-- ==== Page Content ==== -->
  <div class="container">

    <h1>Retratos</h1>
    <hr>
    <div class="grid">
    <?php
    $path = 'images/Retratos/Varios';//'Web_Aikido\images\Retratos\Varios';.$rows['producto_id'];
    $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/' . $path;
    $count=0;
    if($dir = opendir($carpeta)){
      while(($archivo = readdir($dir)) !== false) {

        if($archivo != '.' && $archivo != '..' && stristr($archivo,'.jpg') !== false){
          $count++; ?>

            <div class="grid-item">
              <div class="thumbnail">
                <div id="img-repo<?=$count?>">
                  <a title="Image 1" href="#"><img class="thumb img-responsive selectorImg" id="image-1" data-toggle="modal" data-target=".bd-example-modal-lg" src="images/Retratos/Varios/<?=str_replace(' ','_',$archivo)?>"></a>
                </div>
                <div class="caption col-sx-3">
                  <h3>Thumbnail 1</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, eligendi.</p>
                  <p>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="U3D2T5YW6FBJE">
                    <input type="submit" class="btn btn-sm btn-primary" role="button" value="Donar" border="0" name="submit">
                    <a href="#" class="btn btn-sm btn-success" role="button" onclick="printDiv('img-repo<?=$count?>')">Imprimir</a>
                    </form>

                  </p>
                </div>
              </div>
            </div>

        <?php
        }
      }
      closedir($dir);
    }?>
    </div>
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

<?php include_once ('inc/footer.php'); ?>
