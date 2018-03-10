var changeFond = (function() {
  function initial() {
    // getTime();
    changeFond();
  }

  // function getTime() {
  //   var today = new Date();
  //   var h = today.getHours();
  //   var m = today.getMinutes();
  //   var s = today.getSeconds();
  //   // add a zero in front of numbers<10
  //   // m = checkTime(m);
  //   // s = checkTime(s);
  //   changeFond(m);
  //   // document.getElementById('showtime').innerHTML = h + ":" + m + ":" + s;
  //   t = setTimeout(function() {
  //     getTime()
  //   }, 1000);
  // }
  //
  // function checkTime(i) {
  //   if (i < 10) {
  //     i = "0" + i;
  //   }
  //   return i;
  // }
  // https://www.lawebdelprogramador.com/codigo/JavaScript/2654-Cambiar-la-imagen-cada-5-segundos.html
  function changeFond() {
    var imagenes = new Array(['images/Home/fondo_entradaWeb1.gif'],
                             ['images/Home/fondo_entradaWeb2.gif'],
                             ['images/Home/fondo_entradaWeb3.gif'],
                             ['images/Home/fondo_entradaWeb4.gif']
                            );
    // obtenemos un numero aleatorio entre 0 y la cantidad de imagenes que hay
    var index = Math.floor((Math.random() * imagenes.length));
    // var elemento = document.getElementById("top");

    // if ((hora == 49)) {
      var elemento = document.getElementById('top');
      elemento.style.background = 'url("' + imagenes[index] + '") center';
      elemento.style.width = '100%';
      elemento.style.backgroundSize = 'cover';
      elemento.style.backgroundPosition = 'center';
      elemento.style.backgroundRepeat = 'no-reptea';
    // }
  }

  return {
    initial: initial
  }
})();

$(document).ready(function(){
  changeFond.initial();
});
