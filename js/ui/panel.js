var panel = (function() {

  function inicializar() {
    hamburger_cross();
    checked();
  }

  var trigger = $('.hamburger'),
    overlay = $('.overlay'),
    isClosed = false;

  trigger.click(function() {
    hamburger_cross();
  });

  function hamburger_cross() {

    if (isClosed == true) {
      overlay.hide();
      trigger.removeClass('is-open');
      trigger.addClass('is-closed');
      isClosed = false;
    } else {
      overlay.show();
      trigger.removeClass('is-closed');
      trigger.addClass('is-open');
      isClosed = true;
    }
  }

  $('[data-toggle="offcanvas"]').click(function() {
    $('#wrapper').toggleClass('toggled');
  });

  // function checked() {
  //   $('.checkbox').on('click', function() {
  //     $this = $(this);
  //     if ($this.prop('checked') == true) {
  //       $("#input-image").attr("multiple");
  //       console.log("true");
  //     } else {
  //       console.log("false");
  //       // $("#input-image").removeClass("multiple");
  //     }
  //   });
  // }

  return {
    inicializar: inicializar
  }
})();

$(document).ready(function() {
  panel.inicializar();
});
