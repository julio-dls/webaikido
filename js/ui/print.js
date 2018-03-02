// https://es.stackoverflow.com/questions/43444/bot%C3%B3n-para-imprimir-solo-el-contenido-de-un-div-conservando-estilos
function printDiv(nombreDiv) {
  var nombreDiv = nombreDiv.replace(/small/g, 'big');
  var html = '<html><head></head>' +
              '<body>'+
              '<div id="images-print">'+
              '<img src="'+ nombreDiv +'">'+
              '</div>'+
              '</body></html>';
  var imprme = window.open();
  imprme.document.open();
  imprme.document.write(html);
  imprme.document.close();
  imprme.print();
  setTimeout(function(){ imprme.close(); }, 0);
}
