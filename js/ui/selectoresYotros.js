/*tutorial crear scroll lento jquery http://pixelar.me/smooth-scrolling-con-2-lineas-de-jquery/*/
$(document).ready(function() {

  $('.boton_personalizado').click(function(e) {
    e.preventDefault();
    $("html, body").animate({
      scrollTop: $("#poses").offset().top
    }, 2000);
  });

  /* ====== SELECTOR DE IMAGEN MODAL POSES ====== */
  $('.selectorImg').on('click', function() {
    $this = $(this);
    var srcImg = $this.attr('src');
    $(".selectorImgModal").attr("src", srcImg);
    // LAGEL modal
    $('#label-modal').text($this.attr('data-medidas'));
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

  $('nav .scroll-lento').click(function(e) {
    e.preventDefault();
    $('html, body').stop().animate({
      scrollTop: $($(this).attr('href')).offset().top
    }, 2000);
  });

  // BOTON SIEMPRE VISIBLE
  $('.btn-subir').click(function() {
    $('body, html').animate({
      scrollTop: '0px'
    }, 2000);
  });

  $(window).scroll(function() {
    if ($(this).scrollTop() > 0) {
      $('.btn-subir').slideDown(300);
    } else {
      $('.btn-subir').slideUp(300);
    }
    if ($(this).scrollTop() > 0) {
      $('.btn-buscar').slideDown(300);
    } else {
      $('.btn-buscar').slideUp(300);
    }
  });

  // http://www.anerbarrena.com/jquery-mousemove-4814/
  $(document).mousemove(function(event) {
    $('.social').css({
      'margin-left': '0%'
    });
    $('.social').css({
      'transition': '1s'
    });
    // $('.social').hide(300);
    $('.social').delay(8000).hide(300);
    $(document).on('click', function() {
      $('.social').show();
    });

  });
  /* ====== FIN BOTON SIEMPE VISIBLE ======*/

  /* ====== QUITAR UN ELEMENTO POR OTRO ====== */
  var clon = $('<i id="heart-beating" class="fa fa-heart btn btn-corazon-latido" aria-hidden="true"></i>').clone();
  var clonSidebar = $('<a id="icon-latiendo-btn" class="btn btn-danger sidebar-social" data-toggle="tooltip" data-placement="right" title="Hacer una Donacion"><i class="fa fa-heart sidebar-social-latidos" aria-hidden="true"></i></a>').clone();

  $('#heart-beating').remove();
  // $('.heart').remove();
  $(window).resize(function clonar() {
    if ($(window).width() <= 992) {
      $('.heart').append(clon);
      $('#icon-latiendo-btn').remove();
    } else {
      if ($('#icon-latiendo-btn').length > 0) {
        $('#icon-latiendo-btn').remove();
      }
      $('.btn-latiendo').append(clonSidebar);
      $('#heart-beating').remove();
    }
  });
  /* ====== QUITAR UN ELEMENTO POR OTRO  ====== */
});
