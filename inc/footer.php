
  <!-- paginacion  -->
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center">
        <ul class="pagination">
          <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
          <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li>
            <a href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- ==== fin de paginacion ==== -->
  <!-- ==== Footer ==== -->
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
    https://es.stackoverflow.com/questions/43444/bot%C3%B3n-para-imprimir-solo-el-contenido-de-un-div-conservando-estilos
    function printDiv(nombreDiv) {
         var contenido= document.getElementById(nombreDiv).innerHTML;
         var contenidoOriginal= document.body.innerHTML;

         document.body.innerHTML = contenido;

         window.print();

         document.body.innerHTML = contenidoOriginal;
    }
  </script>
</body>

</html>
