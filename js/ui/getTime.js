function getTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  // add a zero in front of numbers<10
  // m = checkTime(m);
  // s = checkTime(s);
  changeFond(s);
  // document.getElementById('showtime').innerHTML = h + ":" + m + ":" + s;
  t = setTimeout(function() {
    getTime()
  }, 100000);
}

function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}
// https://www.lawebdelprogramador.com/codigo/JavaScript/2654-Cambiar-la-imagen-cada-5-segundos.html
function changeFond(hora) {
  var imagenes = new Array(
                        ['images/Home/fondo_entradaWeb1.gif'],
                        ['images/Home/fondo_entradaWeb2.gif'],
                        ['images/Home/fondo_entradaWeb3.gif'],
                        ['images/Home/fondo_entradaWeb4.gif']
                      );
  // obtenemos un numero aleatorio entre 0 y la cantidad de imagenes que hay
  var index = Math.floor((Math.random()*imagenes.length));
  if ((hora == 58)) {
    document.getElementById('top').style.background = 'url("' + imagenes[index] + '") no-repeat center center';
    }
  }
  $('#top').css({
        'margin-left': '0%',
        'height': 100%,
        'background-size': 'cover',
        'text-align': 'center',
        'padding': '7.5em 0 2em 0',
        'cursor': 'default'
      });
}
