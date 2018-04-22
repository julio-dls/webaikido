var changeFond = (function() {
  function initial() {
    changeFond();
  }
  // https://www.lawebdelprogramador.com/codigo/JavaScript/2654-Cambiar-la-imagen-cada-5-segundos.html
  function changeFond() {
    var imagenes = new Array(['images/Home/mariposa1.jpg'], ['images/Home/mariposa2.jpg'], ['images/Home/mariposa3.jpg'], ['images/Home/mariposa4.jpg'], ['images/Home/mariposa5.jpg'], ['images/Home/mariposa6.jpg']);
    // obtenemos un numero aleatorio entre 0 y la cantidad de imagenes que hay
    var index = Math.floor((Math.random() * imagenes.length));
    // var elemento = document.getElementById("top");

    var elemento = document.getElementById('top');
    elemento.style.background = 'url("' + imagenes[index] + '") center';
    elemento.style.width = '100%';
    elemento.style.backgroundSize = 'cover';
    elemento.style.backgroundPosition = 'center';
    elemento.style.backgroundRepeat = 'no-reptea';
  }

  return {
    initial: initial
  }
})();

$(document).ready(function() {
  changeFond.initial();
});
