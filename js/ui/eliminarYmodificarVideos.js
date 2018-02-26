var eliminarYmodificarImg = (function() {

  function inicializar() {
    eliminarImg();
    obtenerIdImagen();
    modificarImg();
  }

  function eliminarImg() {
    $('.btn-eliminar').on('click', function() {
      $this = $(this);
      var id = $this.attr('data-id');
      $('#modalEliminar').modal();
      $('#btn-aceptar').on('click', function() {
        $.ajax({
          url: "./bmVideo.php",
          type: "GET",
          data: {
            "id": id
          }
        });
        $(".modal").modal("hide");
        location.reload(true);
      });
    });
  }

  var idImg;

  function obtenerIdImagen() {
    $('.btn-modificar').on('click', function() {
      $this = $(this);
      idImg = $this.attr('data-id-modificar');
      nombre = $this.attr('data-nombre');
      $('#nombreModal').attr("value", nombre);
    });
  }

  function modificarImg() {
    $('.modificar').on('click', function() {
      var id = idImg;
      var nombre = $('#nombreModal').val();
      var descripcion = $('#descripcion').val();
      var url = $('#url').val();

      var objImg = {
        "id": idImg,
        "nombre": nombre,
        "descripcion": descripcion,
        "url": url,
      };

      $.ajax({
        url: "./bmVideo.php",
        type: "POST",
        data: objImg,
        //  dataType: 'json'
      }).done(function(data) {
        console.log(JSON.stringify(data));
        $(".modal").modal("hide");
        location.reload(true);
      }).fail(function(data) {
        console.log(JSON.stringify(data));
      });
    });
  }
  return {
    inicializar: inicializar
  }
})();

$(document).ready(function() {
  eliminarYmodificarImg.inicializar();
});
