var eliminarYmodificarUsuarios = (function() {

  function inicializar() {
    eliminarUsuario();
    modificarImg();
  }

  function eliminarUsuario() {
    $('.btn-eliminar').on('click', function() {
      $this = $(this);
      id = $this.attr('data-id');
      $('#modalEliminar').modal();

      $('#btn-eliminar-modal').on('click', function() {
        $('#eliminar_usuario').attr("value", id);
        $(".modal").modal("hide");
      });
    });
  }

  function modificarImg() {
    $('.btn-modificar').on('click', function() {
      $this = $(this);
      var idUser = $this.attr('data-id-modificar');
      $('#id_mod').attr("value", idUser);

      nombre = $this.attr('data-nombre');
      $('#nombre-modificar').attr("value", nombre);
    });
  }
  return {
    inicializar: inicializar
  }

})();
$(document).ready(function() {
  eliminarYmodificarUsuarios.inicializar();
});
