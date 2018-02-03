<?php
/**
 *
 */
class VideosClass {

  private $con;

  function __construct($con ) {
    $this->con = $con;
  }

  public function MostrarMas($cantidad) {
    $sqlSecundario = ('SELECT url FROM `video` LIMIT '.($cantidad).' OFFSET 1');
    return $this->con->query($sqlSecundario);
  }
  public function getTotalVideos() {
    return $this->con->query('SELECT count(id) as totalId FROM `video`')->fetch();
  }

}
?>
<section>
  <div id="videos" class="videos background_content">
    <h1><span>Videos</span></h1>
  </div>
  <div class="container ">
    <h1 class="text-center">En Construccion <small></small></h1>
    <?php
      $sql = ('SELECT url FROM `video` WHERE id = 1 order by id desc');
      $videoPrincipal = $con->query($sql);
    ?>
    <div class="row">
      <div class="col-md-6">
        <?php foreach ($videoPrincipal as $row) { ?>
          <iframe class="img-fluid iframePrindipal" width="560" height="315" src="<?=$row['url']?>" frameborder="0" allowfullscreen></iframe>
        <?php } ?>
      </div>

      <div class="col-md-6">
        <h3 class="">Project titulo</h3>
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
    <div class="row description_content" id="videosDos">
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
          <iframe class="img-fluid iframeSeleccionado" src="<?=$rows['url']?>" frameborder="1" gesture="media" allow="encrypted-media" scrolling="no"></iframe>
        </a>
      </div>
    <?php }
    ?>
    </div>
    <div class="col-md-4 col-md-offset-4">
    <form  action="home.php#videosDos" method="post">
      <input type="hidden" name="autoincremental" value="<?=$indice+4?>">
      <?php if ($numeroTotal > $indice): ?>
        <button type="submit" class="btn btn-default btn-lg btn-block botonMostrar">Ver Mas ...</button>
      <?php endif; ?>
    </form>
    </div>
</div>
</section>
