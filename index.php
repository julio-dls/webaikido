
<?php
  include_once ('inc/conexion.php');
  include_once ('inc/contadorVisitas.php');
  include_once ('inc/sendEmail.php');
  include_once ('inc/controlador_traduccion.php');

  $vistas = new contadorVisitas($con);
  $vistas->contarVisitas();

  if (!empty($_POST['formContacto'])) { $EnviarEmail = new SendEmail($con); $EnviarEmail->sendMail($_POST); }

?>
<!DOCTYPE html>
<html lang="<?=$_SESSION['idioma']?>">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Iwama Ryu Art</title>
  <link rel="icon" href="images/logo/logoIwama.png" type="image/png">
  <link rel="stylesheet" href="css/main.css" media="screen" type="text/css">
  <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/normalize.css">
</head>

<body onload="enroqueBandera()">

  <!-- ============ MENU ============ -->
  <?php include_once ('inc/menuHome.php'); ?>
  <!-- ============ FIN MENU ============ -->

  <!-- ============ BOTON IR ABAJO ============ -->
  <div id="top" class="starter_container bg">
    <div class="follow_container">
      <div class="col-md-6 col-md-offset-3">
          <h2 class="white second-title"><?php echo SUB_TITULO; ?></h2>
        <hr>
        <a class="btn btn-danger boton_personalizado" href="#bienvenidos" data-toggle="tooltip" data-placement="right" title="Bajar">
          <i class="fa fa-arrow-down" aria-hidden="true"></i>
        </a>
      </div>

    </div>
  </div>
  <!-- ============ FIN BOTON IR ABAJO ============ -->

  <!-- ============ SOBRE AIKIDO ============= -->
  <section class="description_content" id="bienvenidos">
    <div class="text-content container">
      <div>
        <h1 class="my-4 text-center text-lg-left"><?php echo TITULO_SOBRE_AIKIDO; ?></h1>
      </div>
      <div class="col-md-6">
        <div>
          <p class="desc-text"> <?php echo SOBRE_AIKIDO; ?>
          <tenetur class="lorem"></tenetur>
          </p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="img-section">
          <?php $sql = 'SELECT `id`,`categoria` FROM `imagenes` WHERE categoria!="moldes" and categoria!="tarjetas" and categoria!="varios" ORDER BY 1 DESC LIMIT 4';
          $imagenesUltimas = $con->query($sql);
          $contador=0;
          foreach ($imagenesUltimas as $rows):
            $contador++;?>
          <img class="img-rounded selectorImg" id="image-1" data-categoria="gallery.php?categoria=<?=$rows['categoria']?>" data-toggle="modal" data-target=".bd-example-modal-lg" src="images/<?=$rows['id']?>/img_0_small.jpg" width="250">
          <?php if ($contador == 2): ?>
          <div class="img-section-space"></div>
          <?php endif;
          endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- ============= MODAL SOBRE AIKIDO ============= -->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <img  id="imagen-modal-centrada" class="col-md-8 col-md-offset-2 col-sm-6 col-xs-12 selectorImgModal" src="" alt="imagene-seleccionada-modal">
      </div>
      <div class="col-md-8 col-md-offset-2 col-sm-8 col-xs-12 text-center">
      <hr>
        <button type="button" id="btnModal" class="btn btn-danger btn-sm " data-dismiss="modal"><?php echo BOTON_VOLVER; ?></button>
        <a id="btn-modal-galeria" href="" id="btnModal" class="btn btn-danger btn-sm "><?php echo BOTON_GALERIA; ?></a>
      </div>
    </div>
  </div>
  <!-- ============= FIN MODAL SOBRE AIKIDO ============= -->

  <!-- ============ VIDEOS ============= -->
  <section>
    <div id="videos" class="videos background_content">
      <h1><span><?php echo TITULO_VIDEO; ?></span></h1>
    </div>
    <div class="container">
      <?php
        include_once ('inc/videos.php');
        $sql = ('SELECT url,titulo,descripcion FROM `video` order by id desc LIMIT 1');
        $videoPrincipal = $con->query($sql);
      ?>
      <div class="row">
        <div class="col-md-6">
          <?php foreach ($videoPrincipal as $row) { ?>
            <iframe class="img-fluid iframePrindipal" width="560" height="315" src="<?=$row['url']?>" frameborder="0" allowfullscreen></iframe>
          <?php } ?>
        </div>

        <div class="col-md-6 desc-text">
          <blockquote>
            <h3><?php echo SEGUNDO_TITULO_VIDEOS; ?></h3>
            <p class="desc-text"> <?php echo VIDEO_FRASE; ?></p>
          </blockquote>
        </div>
      </div>

      <h2 class="text-center"><?php echo SUBTITULO_VIDEOS; ?></h2>
      <div class="row" id="videosDos">
        <?php
        $indice;
        $indice = isset($_POST['autoincremental']) ? $_POST['autoincremental'] : 4;
        sleep(5);
        $VideosObj = new VideosClass($con);
        $videosSecundario = $VideosObj->MostrarMas($indice);

        $resultado = $VideosObj->getTotalVideos();
        $numeroTotal = $resultado[0];

        foreach ($videosSecundario as $rows) { ?>
        <div class="col-md-3 col-sm-6 col-xs-12 grupoVideos">
          <a class="aIframeVideoSeleccionado" href="#">
            <iframe class="img-fluid iframeSeleccionado" src="<?=$rows['url']?>" frameborder="0" allowfullscreen></iframe>
          </a>
        </div>
        <?php } ?>
      </div>
      <div class="col-md-4 col-md-offset-4">
      <form  action="index.php#videosDos" method="post">
        <input type="hidden" name="autoincremental" value="<?=$indice+4?>">
        <?php if ($numeroTotal > $indice): ?>
          <button type="submit" class="btn btn-default btn-lg btn-block btn-ver-mas-menos"><?php echo BOTON_VER_MAS; ?></button>
        <?php else: ?>
          <input type="hidden" name="autoincremental" value="<?= 4 + ($indice-$indice)?>">
          <button type="submit" class="btn btn-default btn-lg btn-block btn-ver-mas-menos"><?php echo BOTON_VER_MENOS; ?></button>
        <?php endif; ?>
      </form>
      </div>
    </div>
  </section>
  <!-- ============ VIDEOS ============= -->

  <!-- ============ PROYECTOS  ============= -->
  <section id="proyectos" class=" description_content">
    <div class="bread  background_content text-center">
      <h1><span><?php echo TITULO_PROYECTO; ?></span></h1>
    </div>
    <div class="text-content container">
      <div class="col-md-12 text-center">
        <h1>¨ Uchideshi ¨</h1>
        <div class="text-fondo-gris">
          <p class="desc-text"><?php echo TEXTO_PROYECTO; ?></p>
        </div>
      </div>
    </div>
  </section>

  <div class="container bs-docs-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner text-center" role="listbox">

            <?php
            $sqlPro = ('SELECT `id`, `nombre` FROM `proyecto-cortometraje` WHERE 1');
            $totalImgPro = $con->query($sqlPro);
            $active="active";
            foreach ($totalImgPro as $rows) {

            $path ='Web_Aikido/images/proyectoCortometraje/'.$rows['id']; // 'images/proyectoCortometraje/'.$rows['id']; //
            trim($path);
            $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/' .$path;
            if($directorio = opendir($carpeta)){
              while(($archivo = readdir($directorio)) !== false) {
                if($archivo != '.' && $archivo != '..' && stristr($archivo,'.jpg') !== false){ ?>

                    <div class="item <?=$active?>">
                        <img src="images/proyectoCortometraje/<?=$rows['id']?>/<?=utf8_encode($archivo)?>" alt="...">
                        <div>
                          <?php
                            $nombres = basename($rows['nombre'], ".jpg");
                            $nombres = str_replace('_',' ',$nombres);
                            $nombres = str_replace('-',' ',$nombres);
                            $nombres = ucwords($nombres);
                            echo utf8_encode($nombres);
                           ?>
                        </div>
                    </div>
                <?php
                  $active="";
                  }
                }
              closedir($directorio);
              }
            }?>
            </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      </div>
    </div>
  </div>

  <!-- ============ FIN PROYECTOS  ============= -->

  <!-- ============ FORM CONTACTO ============ -->
  <section class="description_content">
    <div id="contacts" class="contact background_content">
      <h1><span><?php echo TITULO_CONTACTO; ?></span></h1>
    </div>
    <div class="text-content container">
      <div class="col-md-6">
        <!-- <h1>Lorem ipsum dolor sit amet!</h1> -->
        <p class="desc-text "><?php echo TEXTO_CONTACTO; ?></p>
      </div>
      <div class="col-md-6">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
           <ul class="image_box_story2">
            <div class="carousel-inner" role="listbox">

            <?php
            $path = 'Web_Aikido/images/contacto/'; //'images/contacto/'; //
            trim($path);
            $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/' .$path;
            if($directorio = opendir($carpeta)){
              $active="active";
              while(($archivo = readdir($directorio)) !== false) {
                if($archivo != '.' && $archivo != '..' && stristr($archivo,'.jpg') !== false){ ?>

                    <div class="item <?=$active?> ">
                        <img class="img-responsive img-slide-contacto" src="images/contacto/<?=utf8_encode($archivo)?>" alt="...">
                    </div>
              <?php
                $active="";
                }
              }
              closedir($directorio);
              } ?>
          </div>
        </ul>
      </div>
    </div>
    <!-- FORM CONTACTO -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner contact">
            <div class="contact-form">
              <form id="#" method="POST" action="index.php">
                <div class="col-md-6 ">
                  <input type="text" name="nombreContacto" id="name" required="required" class="form" placeholder="<?php echo INPUT_NOMBRE; ?>" />
                  <input type="email" name="emailContacto" id="email" required="required" class="form" placeholder="<?php echo INPUT_EMAIL; ?>" />
                  <input type="text" name="subjectContacto" id="subject" required="required" class="form" placeholder="<?php echo INPUT_ASUSNTO; ?>" />
                  <input type="hidden" name="formContacto" value="Enviado">
                </div>
                <div class="col-md-6">
                  <textarea name="messageContacto" id="#" class="form textarea" placeholder="<?php echo INPUT_MENSAJE; ?>"></textarea>
                </div>
                <div class="relative fullwidth col-xs-12">
                  <button type="submit" id="#" name="submit" class="form-btn"><?php echo BTN_ENVIAR; ?></button>
                </div>
                <div class="clear"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!-- FIN FORM CONTTACTO -->
  </section>
  <!-- ============ FIN FORM CONTACTO ============ -->

  <!-- ============ FOOTER  ============= -->

  <footer class="sub_footer">
    <div class="container">
      <div class="col-md-4"></div>
      <div class="col-md-4 text-center">
        <p class="sub-footer-text text-center">&copy; Iwama Ryu Art 2018, Theme by <a href="#">DeveloperWebMJ</a></p>
        <p class="sub-footer-text text-center">Adaptado: <a href="#">DevelopersWebMJ</a></p>
        <p class="sub-footer-text text-center">Email: <a href="#">developerwebmj@gmail.com</a></p>
      </div>
      <div class="col-md-4"></div>
    </div>
  </footer>
  <!-- ============ FIN FOOTER  ============= -->

  <!-- ============= SIDEBAR DE REDES SOCIALES ============= -->

  <?php include_once ('inc/sidebar.php'); ?>

  <!-- ============= FIN SIDEBAR DE REDES SOCIALES ============= -->

  <!-- ============ BOTON IR AL ARRIBA ============ -->
  <div>
    <a href="<?=$_SESSION['idioma']=='es'?'?idioma=en':'?idioma=es';?>" class="btn btn-danger btn-idioma" id="btn-idioma" data-toggle="tooltip" data-placement="right" title="Subir"></a>
  </div>
  <div>
    <a href="#" class="btn btn-danger btn-subir" data-toggle="tooltip" data-placement="right" title="Subir"><i class="fa fa-home"></i></a>
  </div>
  <!-- ============ FIN BOTON IR ARRIBA ============ -->

  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- <script type="text/javascript" src="js/slide-multi-item.js"></script> -->
  <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
  <script src="js/ui/selectoresYotros.js"></script>
  <script type="text/javascript">
  // BOTON IDIOMA
  function enroqueBandera() {
      var imagenes = new Array(['images/Home/española.png'],['images/Home/inglesa.png']);

      if ('<?php echo $_SESSION['idioma'] ?>' == 'es') {
        var imagenIdioma = 'images/Home/española.png';
      } else if ('<?php echo $_SESSION['idioma'] ?>' == 'en') {
        var imagenIdioma = 'images/Home/inglesa.png';
      } else {
        var imagenIdioma = 'images/Home/española.png';
      }
      var elemento = document.getElementById('btn-idioma');
      elemento.style.background = 'url("' + imagenIdioma + '") center';
      elemento.style.backgroundRepeat = 'no-reptea';
  }
  // FIN BOTON IDIOMA
  </script>
</body>

</html>
