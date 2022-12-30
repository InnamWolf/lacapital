//* ===============================================
//*
//* ===============================================

$('.clickMaquina').on('click', function () {
  var objeto = document.getElementById('girarMaquina');
  objeto.style.display = 'block';
  var cantidadBoleto = document.getElementById('cantidadBoleto').value;

  var datos = new FormData();
  datos.append('cantidadBoleto', cantidadBoleto);
  $.ajax({
    url: 'ajax/boletosAleatorios.ajax.php',
    method: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success: function (respuesta) {},
  });
  setTimeout(function () {
    objeto.style.display = 'none';
    location.reload();
  }, 10000);
});

let elemento = document.getElementById('estatusTicket');

function cargarBoletos() {
  $.ajax({
    url: 'ajax/listaBoletos.ajax.php',
    method: 'POST',
    success: function (respuesta) {
      $('#quitarBoleto').html(respuesta);
      $('.selectBoleto').on('click', function () {
        var idBoleto = $(this).attr('idBoleto');
        var datos = new FormData();
        datos.append('idBoleto', idBoleto);
        $.ajax({
          url: 'ajax/boletosFront.ajax.php',
          method: 'POST',
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function (respuesta) {
            $('#pintarBoleto').load(location.href + ' #pintarBoleto');
            $('#quitarBoleto').html('Cargando boletos disponibles ...');
            cargarBoletos();
          },
        });
      });
    },
  });
}

cargarBoletos();
