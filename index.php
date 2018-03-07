<?php
  include_once ('inc/conexion.php');
  include_once ('inc/contadorVisitas.php');
  include_once ('inc/sendEmail.php');

  if (!empty($_POST['formContacto'])) {
    $EnviarEmail = new SendEmail($con);
    $EnviarEmail->sendMail($_POST);
  }

?>

<!DOCTYPE html>
<html lang="es">

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

<body onload="getTime()">

  <!-- ============ MENU ============ -->
  <?php include_once ('inc/menuHome.php'); ?>
  <!-- ============ FIN MENU ============ -->

  <!-- ============ BOTON IR ABAJO ============ -->
  <div id="top" class="starter_container bg">
    <div class="follow_container">
      <div class="col-md-6 col-md-offset-3">
        <h2 class="white second-title">"El progreso llega a aquellos que se adiestran ininterrumpidamente". <br>Morihei Ueshiba</h2>
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
        <h1 class="my-4 text-center text-lg-left">Acerca de Iwama Ryu Art.</h1>
      </div>
      <div class="col-md-6">
        <div>
          <p class="desc-text"> ¡Bienvenidos!!<br>
          Iwama Ryu Art es una página de arte independiente. Lo que usted verá a continuación son ilustraciones referidas al aikido y en particular a la escuela de Iwama Ryu. Mi practica de aikido en Iwama, Japón, fue en dic. 2012. ¡Mi estadía fue maravillosa!, casi diría mágica y mi agradecimiento es tan grande por lo vivido allí, que necesité expresarme de algún modo. De estos sentimientos nace IWAMA RYU ART, ilustraciones de los practicantes de la escuela de los diferentes países, a quienes  muchos, no los conozco, pero que el aikido me los acerca como Familia Iwama. Todos los dibujos están a su disposición, agradeciendo que mencione el origen de las mismas. ¡De a poco iré sumando más aikidokas, a los que algún día, los conoceré en persona, compartiendo Keiko!
          Soy Arquitecto, ilustrador y animador 2d tradicional. Partico aikido en Aiki Shuren Dojo Buenos Aires- Argentina.
          <br>¡Espero que sea de su agrado!!  gracias por su vista!
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
        <img class="col-md-8 col-md-offset-2 col-sm-6 col-xs-12 selectorImgModal" src="" alt="imagene-seleccionada-modal">
      </div>
      <div class="col-md-8 col-md-offset-2 col-sm-8 col-xs-12 text-center">
      <hr>
        <button type="button" id="btnModal" class="btn btn-danger btn-sm " data-dismiss="modal">Volver</button>
        <a id="btn-modal-galeria" href="" id="btnModal" class="btn btn-danger btn-sm ">Galeria</a>
      </div>
    </div>
  </div>
  <!-- ============= FIN MODAL SOBRE AIKIDO ============= -->

  <!-- ============= SIDEBAR DE REDES SOCIALES ============= -->

  <?php include_once ('inc/sidebar.php'); ?>

  <!-- ============= FIN SIDEBAR DE REDES SOCIALES ============= -->

  <!-- ============ BOTON IR AL ARRIBA ============ -->
  <div>
    <a href="#" class="btn btn-danger btn-subir" data-toggle="tooltip" data-placement="right" title="Subir"><i class="fa fa-home"></i></a>
  </div>
  <!-- ============ FIN BOTON IR ARRIBA ============ -->

  <!-- ============ VIDEOS ============= -->
  <?php include_once ('inc/videos.php'); ?>
  <section>
    <div id="videos" class="videos background_content">
      <h1><span>Videos</span></h1>
    </div>
    <div class="container">
      <?php
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
          <h3>Project titulo</h3>
          <blockquote>
            <p class="desc-text"> &quot;Tu corazón está lleno de semillas fértiles esperando brotar. Del mismo modo que una flor de loto surge del lodo para florecer en todo su esplendor, la interacción de la respiración cósmica hace florecer el espíritu para que dé fruto en este mundo.&quot; <br><cite> Morihei Ueshiba</cite></p>
          </blockquote>
        </div>
      </div>
      <!-- /.row -->

      <h2 class="text-center">Video Recientes</h2>
      <div class="row" id="videosDos">

        <?php
        $indice;
        $indice = isset($_POST['autoincremental']) ? $_POST['autoincremental'] : 4;

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
          <button type="submit" class="btn btn-default btn-lg btn-block btn-ver-mas-menos">Ver Mas ...</button>
        <?php else: ?>
          <input type="hidden" name="autoincremental" value="<?= 4 + ($indice-$indice)?>">
          <button type="submit" class="btn btn-default btn-lg btn-block btn-ver-mas-menos">Ver Menos ...</button>
        <?php endif; ?>
      </form>
      </div>
      </div>
    </div>
  </section>
  <!-- ============ VIDEOS ============= -->

  <!-- ============ PROYECTOS  ============= -->
  <section id="proyectos" class=" description_content">
    <div class="bread  background_content text-center">
      <h1><span>Proyecto</span></h1>
    </div>
    <div class="text-content container">
      <div class="col-md-12 text-center">
        <h1>¨ Uchideshi ¨</h1>
        <div class="text-fondo-gris">
          <p class="desc-text">Uchideshi es el titulo del cortometraje de dibujos animados que está en camino. Dado que el proceso es largo, quise ir compartiendo con ustedes la evolucion del proyecto. Proximamente subiré las pruebas de video y test de animacion.</p>
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

            $path = 'Web_Aikido/images/proyectoCortometraje/'.$rows['id']; //'images/proyectoCortometraje/'.$rows['id']; //
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
      <h1><span>Contacto</span></h1>
    </div>
    <div class="text-content container">
      <div class="col-md-6">
        <!-- <h1>Lorem ipsum dolor sit amet!</h1> -->
        <p class="desc-text ">¡Gracias por su Visita!<br>Si usted necesita algún archivo especial o algún formato particular o necesita algo de otros temas: espero su consulta. Su solicitud será atendida a la brevedad. <br>¡Gracias por comunicarse!</p>
      </div>
      <div class="col-md-6">
        <ul class="image_box_story2">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
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
                  <input type="text" name="nombreContacto" id="name" required="required" class="form" placeholder="Name" />
                  <input type="email" name="emailContacto" id="email" required="required" class="form" placeholder="Email" />
                  <input type="text" name="subjectContacto" id="subject" required="required" class="form" placeholder="Subject" />
                  <input type="hidden" name="formContacto" value="Enviado">
                </div>
                <div class="col-md-6">
                  <textarea name="messageContacto" id="#" class="form textarea" placeholder="Message"></textarea>
                </div>
                <div class="relative fullwidth col-xs-12">
                  <button type="submit" id="#" name="submit" class="form-btn">Send Message</button>
                </div>
                <div class="clear"></div>
              </form>
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
        <p class="sub-footer-text text-center">Adaptado: <a href="#">M & J Developers-Web</a></p>
        <p class="sub-footer-text text-center">Email: <a href="#">developerwebmj@gmail.com</a></p>
      </div>
      <div class="col-md-4"></div>
    </div>
  </footer>
  <!-- ============ FIN FOOTER  ============= -->
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/slide-multi-item.js"></script>
  <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
  <script src="js/ui/selectoresYotros.js"></script>
  <script type="text/javascript" src="js/ui/getTime.js" ></script>

</body>

</html>
