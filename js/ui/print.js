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

// https: //es.stackoverflow.com/questions/43444/bot%C3%B3n-para-imprimir-solo-el-contenido-de-un-div-conservando-estilos
function printDiv(nombreDiv) {
  var contenido = document.getElementById(nombreDiv).innerHTML;
  var contenidoOriginal = document.body.innerHTML;
  document.body.innerHTML = contenido;

  window.print();

  document.body.innerHTML = contenidoOriginal;
}
