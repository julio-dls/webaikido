/*tutorial crear scroll lento jquery http://pixelar.me/smooth-scrolling-con-2-lineas-de-jquery/*/
$(document).ready(function() {
  $("#boton_personalizado").click(function(e) {
    e.preventDefault();
    $("html, body").animate({
      scrollTop: $("#poses").offset().top
    }, 1000);
  });

  /* ====== SELECTOR DE IMAGEN MODAL POSES ====== */
  $('.selectorImg').on('click', function() {
    $this = $(this);
    var srcImg = $this.attr('src');
    $(".selectorImgModal").attr("src", srcImg);
  });
  /* ====== FIN SELECTOR DE IMAGEN MODAL POSES ====== */

  /* ====== SELECTOR DE VIDEO  ====== */
  $('.iframeSeleccionado').on('click', function() {
    //player.stopVideo():Void
    $this = $(this);
    var srcVideo = $this.atrr("src");
    $('.iframePrindipal').attr("src", srcVideo);
  });
  /* ====== FIN SELECTOR DE VIDEO  ====== */
});

$('nav .scroll-lento').click(function(e) {
  e.preventDefault();
  $('html, body').stop().animate({
    scrollTop: $($(this).attr('href')).offset().top
  }, 1000);
});

/* ====== FIN DE SELECTOR DE VIDEO ====== */
