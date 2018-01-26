<!-- https://webaikido.herokuapp.com/home.php -->
<!-- boton donaciones https://www.youtube.com/watch?v=jXQmho-zxFY  -->
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Iwama Ryu Art</title>
  <link rel="icon" href="images/logo/logo.png" type="image/png">
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playball"> -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css" media="screen" type="text/css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">

</head>

<body>
  <!-- ============ MENU ============ -->
  <?php  include_once ('inc/menu.php'); ?>
  <!-- ============ FIN MENU ============ -->

  <!-- ============ BOTON IR ABAJO ============ -->
  <div id="top" class="starter_container bg">
    <div class="follow_container">
      <div class="col-md-6 col-md-offset-3">
        <h2 class="white second-title">"El progreso llega a aquellos que se adiestran ininterrumpidamente". <br>Morihei Ueshiba</h2>
        <hr>
        <a class="btn btn-danger boton_personalizado" href="#poses" data-toggle="tooltip" data-placement="right" title="Bajar">
          <i class="fa fa-arrow-down" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  </div>
  <!-- ============ FIN BOTON IR ABAJO ============ -->

  <!-- ============ SOBRE AIKIDO ============= -->
  <section class="description_content">
    <div class="text-content container">
      <div id="poses">
        <h1 class="my-4 text-center text-lg-left">Acerca de Iwama Ryu Art.</h1>
      </div>
      <div class="col-md-6">
        <div class="text-fondo-gris">
          <p class="desc-text">Bienvenidos!! Iwama Ryu Art es una pagina de arte independiente. Lo que usted verá a continuacion son ilustraciones referidas al aikido y en particular a la escuela de Iwama Ryu. Mi practica de aikido en Iwama, Japon, fue en el año 2013. Mi
            estadia fue maravillosa, casi diria magica y mi agradecimiento es tan grande por lo vivido allí, que necesité expresarme de algun modo. De estos sentimientos nace IWAMA RYU ART, ilustraciones de los practicantes de la escuela de los diferentes
            paises, a quienes muchos no los conozco, pero que el aikido me los acerca como Familia Iwama. Todos los dibujos estan a su disposicion , agradeciendo que mencione el origen de las mismas. De a poco iré sumando mas aikidokas A los que algun
            dia, los conoceré en persona ,compartiendo keiko!. Soy Arquitecto , ilustrador y animador 2d tradicional. Partico aikido en Aiki Shuren Dojo Buenos Aires - Argentina Espero que sea de su agrado!! <br> gracias por su vista! <br> ChinoYuen
            <tenetur class="lorem"></tenetur>
          </p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="img-section">
          <img class="img-rounded selectorImg" id="image-1" data-toggle="modal" data-target=".bd-example-modal-lg" src="images/poses/manosSimples/nikkio.jpg" width="250">
          <img class="img-rounded selectorImg" id="image-2" data-toggle="modal" data-target=".bd-example-modal-lg" src="images/poses/manosSimples/manos_enrico.jpg" width="250">
          <div class="img-section-space"></div>

          <img class="img-rounded selectorImg" id="image-3" data-toggle="modal" data-target=".bd-example-modal-lg" src="images/poses/manosSimples/manos_miru.jpg" width="250">
          <img class="img-rounded selectorImg" id="image-4" data-toggle="modal" data-target=".bd-example-modal-lg" src="images/poses/manosSimples/manos.jpg" width="250">

          <div class="img-section-space"></div>

        </div>
      </div>
    </div>
  </section>

  <!-- ============= MODAL POSES ============= -->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <img class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12 selectorImgModal" src="" alt="">
      </div>
      <div class="col-md-6 col-md-offset-3 col-sm-8 col-xs-12">
        <hr>
          <div class="col-md-4 col-md-offset-2">
            <button type="button" id="btnModal" class="btn btn-danger btn-xs btn-block" data-dismiss="modal">Volver</button>
          </div>
          <div class="col-md-4">
            <a href="gallery.php?categoria=poses/manosSimples" id="btnModal" class="btn btn-danger btn-xs btn-block">Galeria</a>
          </div>
      </div>
    </div>
  </div>
  <!-- ============= FIN MODAL POSES ============= -->

  <!-- ============= SIDEBAR DE REDES SOCIALES ============= -->

  <?php include_once ('inc/sidebar.php'); ?>

  <!-- ============= FIN SIDEBAR DE REDES SOCIALES ============= -->

  <!-- ============ BOTON IR AL ARRIBA ============ -->
  <div>
    <a href="#" class="btn btn-danger btn-subir" data-toggle="tooltip" data-placement="right" title="Subir"><i class="fa fa-home"></i></a>
  </div>
  <!-- ============ FIN BOTON IR ARRIBA ============ -->

  <!-- ============ VIDEOS ============= -->
  <section>
    <div id="videos" class="videos background_content">
      <h1><span>Videos</span></h1>
    </div>
    <div class="container text-center">
      <!-- <h1 class="text-center">Ultimos Videos<small></small></h1> -->
      <div class="row">
        <div class="col-md-6">
          <iframe class="img-fluid iframePrindipal" width="560" height="315" src="https://www.youtube.com/embed/SjM6x-BMemM" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="col-md-6">
          <h3 class="">Project Description</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.
          </p>
          <h3 class="fa-2x">Project Details</h3>
          <ul>
            <li>Lorem Ipsum</li>
            <li>Dolor Sit Amet</li>
            <li>Consectetur</li>
            <li>Adipiscing Elit</li>
          </ul>
        </div>

      </div>
      <!-- /.row -->

      <h3 class="my-4">Video Recientes</h3>
      <div class="description_content">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a class="aIframeVideoSeleccionado" href="#">
              <iframe class="img-fluid iframeSeleccionado" src="https://www.youtube.com/embed/7K3AnXfz5AY?rel=0&showinfo=0&controls=1" frameborder="1" gesture="media" allow="encrypted-media" scrolling="no"></iframe>
            </a>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="#">
              <iframe class="img-fluid iframeSeleccionado" src="https://www.youtube.com/embed/H0VU2b0hLcM?rel=0&showinfo=0&controls=1" frameborder="1" gesture="media" allow="encrypted-media" scrolling="no"></iframe>
            </a>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12 iframeSeleccionado">
          <a href="#">
            <iframe class="img-fluid iframe-secundario" src="https://www.youtube.com/embed/7K3AnXfz5AY?rel=0&showinfo=0&controls=1" frameborder="1" gesture="media" allow="encrypted-media" scrolling="no"></iframe>
            </a>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="#">
              <iframe class="img-fluid iframeSeleccionado" src="https://www.youtube.com/embed/H0VU2b0hLcM?rel=0&showinfo=0&controls=1" frameborder="1"  gesture="media" allow="encrypted-media" scrolling="no"></iframe>
            </a>
        </div>

      </div>
      <div class="col-md-4 col-md-offset-4">
        <button type="button" class="btn btn-default btn-lg btn-block"></span> Ver Mas ...</button>
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
            <div class="carousel-inner" role="listbox">

            <?php
            $path = 'images/proyecto_cortometraje/'; //'Web_Aikido/images/proyecto_cortometraje/';//
            trim($path);
            $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/' .$path;
            if($directorio = opendir($carpeta)){
              $active="active";
              while(($archivo = readdir($directorio)) !== false) {
                if($archivo != '.' && $archivo != '..' && stristr($archivo,'.jpg') !== false){ ?>

                    <div class="item <?=$active?>">
                        <img src="images/proyecto_cortometraje/<?=utf8_encode($archivo)?>" alt="...">
                        <div class="carousel-caption">
                          <?php
                            $nombres = basename($archivo, ".jpg");
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
              } ?>
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

  <!-- ============ EVENTOS  ============= -->
  <section class="description_content">
    <div id="extras" class="extras background_content">
      <h1><span>Extra</span><span></span> </h1>
    </div>
    <div class="text-content container">
      <div class="col-md-12 text-center">
        <!-- <h1>Extras</h1> -->
        <div class="text-fondo-gris">
          <p class="desc-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi qui ab accusantium reprehenderit cupiditate ipsam adipisci officia facere quidem esse aut, rem sapiente odio temporibus natus expedita nam quos sint.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Page Content -->
  <div class="container">
    <div class="row text-center text-lg-left">
      <div class="col-lg-3 col-md-4 col-xs-6">
        <a href="#" class="d-block mb-4 h-100">
          <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-xs-6">
        <a href="#" class="d-block mb-4 h-100">
          <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-xs-6">
        <a href="#" class="d-block mb-4 h-100">
          <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-xs-6">
        <a href="#" class="d-block mb-4 h-100">
          <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-xs-6">
        <a href="#" class="d-block mb-4 h-100">
          <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-xs-6">
        <a href="#" class="d-block mb-4 h-100">
          <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-xs-6">
        <a href="#" class="d-block mb-4 h-100">
          <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-xs-6">
        <a href="#" class="d-block mb-4 h-100">
          <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-xs-6">
        <a href="#" class="d-block mb-4 h-100">
          <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-xs-6">
        <a href="#" class="d-block mb-4 h-100">
          <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-xs-6">
        <a href="#" class="d-block mb-4 h-100">
          <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-xs-6">
        <a href="#" class="d-block mb-4 h-100">
          <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
        </a>
      </div>
    </div>

  </div>
  <!-- /.container -->

  <!-- ============ FIN EVENTOS ============ -->

  <!-- ============ FORM CONTACTO ============ -->
  <section class="description_content">
    <div id="contacts" class="contact background_content">
      <h1><span>Contato</span></h1>
    </div>
    <div class="text-content container">
      <div class="col-md-6">
        <!-- <h1>Lorem ipsum dolor sit amet!</h1> -->

        <p class="desc-text ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, recusandae doloribus repudiandae quis tempore culpa eos, repellat facilis autem delectus ex et saepe accusantium distinctio rerum accusamus voluptatem nihil ut.</p>

      </div>
      <div class="col-md-6">
        <ul class="image_box_story2">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
              <div class="item active">
                <img src="#" class="img-responsive" alt="...">
                <div class="carousel-caption">

                </div>
              </div>
              <div class="item">
                <img src="#" class="img-responsive" alt="...">
                <div class="carousel-caption">

                </div>
              </div>
              <div class="item">
                <img src="#" class="img-responsive" alt="...">
                <div class="carousel-caption">

                </div>
              </div>
            </div>
          </div>
        </ul>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner contact">
            <div class="contact-form">
              <form id="contact-us" method="post" action="contact.php">
                <div class="col-md-6 ">
                  <input type="text" name="name" id="name" required="required" class="form" placeholder="Name" />
                  <input type="email" name="email" id="email" required="required" class="form" placeholder="Email" />
                  <input type="text" name="subject" id="subject" required="required" class="form" placeholder="Subject" />
                </div>
                <div class="col-md-6">
                  <textarea name="message" id="message" class="form textarea" placeholder="Message"></textarea>
                </div>
                <div class="relative fullwidth col-xs-12">
                  <button type="submit" id="submit" name="submit" class="form-btn">Send Message</button>
                </div>
                <div class="clear"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ============ FIN FORM CONTACTO ============ -->

  <!-- ============ FOOTER  ============= -->

  <footer class="sub_footer">
    <div class="container">
      <div class="col-md-4"></div>
      <div class="col-md-4 text-center">
        <p class="sub-footer-text text-center">&copy; Aikido 2017, Theme by <a href="#">DeveloperWebMJ</a></p>
        <p class="sub-footer-text text-center">Back to <a href="#top">TOP</a></p>
        <p class="sub-footer-text text-center">Built With Care By <a href="#" target="_blank">Us</a></p>
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
</body>

</html>
