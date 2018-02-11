
  <!-- paginacion  -->
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center">
        <?php
        $cat = '';
        if(isset($_GET['categoria'])){ $cat .= '&categoria='.$_GET['categoria']; } ?>
        <ul class="pagination">
          <?php if($pagina != 0): ?>
            <li class="page-item">
              <a class="page-link" href="?page=<?=($pagina-1).$cat?>">Previous</a>
            </li>
          <?php endif;

          for($i=1;$i<floor($cantidad / $limite);$i++){
            if($i == $pagina){ ?>
              <li class="page-item active">
                <a  class="page-link" href="#"><?=$i?><span class="sr-only">(current)</span></a>
              </li>
            <?php } else { ?>
              <li class="page-item" >
                <a class="page-link" href="?pagina=<?=$i.$cat?>"><?=$i?></a></li>
            <?php }
          }
          // echo "paginas".$pagina."cantidad".$cantidad."limite".$limite."total".floor($cantidad / $limite);
          if($pagina < floor($cantidad / $limite) && ($cantidad > $limite)): ?>
          <li class="page-item">
            <a class="page-link" href="?page=<?=($pagina+1).$cat?>">Next</a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
  <!-- ==== fin de paginacion ==== -->
  <!-- ==== Footer ==== -->
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
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/slide-gallery.js"></script>
  <script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
  <script src="js/ui/selectoresYotros.js"></script>
  <script src="js/masonry.pkgd.min.js"></script>
  <script>
    $(document).ready(function() {
      myMasonry = function() {
        $('.grid').masonry({
          // options
          //itemSelector: $theGrid,
          //columnWidth: grid-item
        })
      };
      $(window).on('load', myMasonry);
      $('.closeModal').on('click', function() {
        $('#modal').modal('hide');
      });
    });
    // https://es.stackoverflow.com/questions/43444/bot%C3%B3n-para-imprimir-solo-el-contenido-de-un-div-conservando-estilos
    function printDiv(nombreDiv) {
      var contenido = document.getElementById(nombreDiv).innerHTML;
      var contenidoOriginal = document.body.innerHTML;
      document.body.innerHTML = contenido; //imprime lo que hemos selecconado
      window.print();
      document.body.innerHTML = contenidoOriginal; //copia el body del dom y lo muestra
      window.location.reload();
    }
  </script>
</body>

</html>
