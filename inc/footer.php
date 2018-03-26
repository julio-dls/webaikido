
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
               <a href="?page=0<?=$cat?>"><?php echo BOTON_PRIMERO; ?></a>
              <a class="page-link" href="?page=<?=($pagina-1).$cat?>">&laquo;</a>
            </li>
          <?php endif;

          for($i=1;$i <= floor($cantidad / $limite);$i++){
            if($i == $pagina) { ?>
              <li class="page-item active">
                <a class="page-link" href="?pagina=<?=$i.$cat?>"><?=$i?></a>
              </li>
            <?php }
          }
          if($pagina < floor($cantidad / $limite) && ($cantidad > $limite)): ?>
          <li class="page-item">
            <a class="page-link" href="?page=<?=($pagina+1).$cat?>">&raquo;</a>
            <a href="?page=<?=(floor($cantidad / $limite)).$cat?>"><?php echo BOTON_ULTIMO; ?> </a>
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
        <p class="sub-footer-text text-center">&copy; Iwama Ryu Art 2018, Theme by <a href="#">DeveloperWebMJ</a></p>
        <p class="sub-footer-text text-center">Adaptado: <a href="#">M & J Developers-Web</a></p>
        <p class="sub-footer-text text-center">Email: <a href="#">developerwebmj@gmail.com</a></p>
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
  <script type="text/javascript" src="js/ui/print.js"></script>
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
  </script>
</body>

</html>
