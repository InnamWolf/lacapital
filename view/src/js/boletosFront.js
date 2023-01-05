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
    success: function (respuesta) {
      quitarBoletos();
    },
  });
  setTimeout(function () {
    objeto.style.display = 'none';
    location.reload();
  }, 10000);
});

function cargarBoletos() {
  $('#quitarBoleto').html('Cargando boletos disponibles ...');
  $.ajax({
    url: 'ajax/cargarBoletos.ajax.php',
    method: 'POST',
    success: function (respuesta) {
      $('#quitarBoleto').html(respuesta);
      $('.selectBoleto').on('click', function () {
        var idBoleto = $(this).attr('idboleto');
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
            quitarBoletos();
          },
        });
      });
    },
  });
}

function quitarBoletos() {
  $.ajax({
    url: 'ajax/apartadoFront.ajax.php',
    method: 'POST',
    cache: false,
    success: function (respuesta) {
      $('#pintarBoleto').html(respuesta);
      $('#boletosApartados').html(respuesta);
      $('#boletosMaquina').html(respuesta);
      $('.selectBoletoQuitar').on('click', function () {
        var idBoleto = $(this).attr('idBoleto');

        var x = new XMLHttpRequest();
        x.open('GET', 'ajax/quitarBoletos.ajax.php?idBoleto=' + idBoleto);
        x.setRequestHeader('Cache-Control', 'no-cache');
        x.send(null);
        x.onreadystatechange = function () {
          if (x.status == 200 && x.readyState == 4) {
            cargarBoletos();
            quitarBoletos();
          }
        };
      });
    },
  });
}

$('#btnAgregarBoleto').on('click', function () {
  var numBoleto = $('#folio').val();

  var x = new XMLHttpRequest();
  x.open('GET', 'ajax/buscaBoleto.ajax.php?numBoleto=' + numBoleto);
  x.setRequestHeader('Cache-Control', 'no-cache');
  x.send(null);

  x.onreadystatechange = function () {
    if (x.status == 200 && x.readyState == 4) {
      if (x.responseText == 'NO') {
        Swal.fire({
          icon: 'error',
          title: 'El numero de boleto elegido ya no esta disponible',
          showConfirmButton: true,
          confirmButtonText: 'Cerrar',
        });
        $('#folio').val('');
      } else {
        cargarBoletos();
        quitarBoletos();
        $('#folio').val('');
      }
    }
  };
});

$('#btnBuscarFolio').on('click', function () {
  var numFolio = $('#folioBuscar').val();
  var x = new XMLHttpRequest();
  x.open('GET', 'ajax/buscaFolio.ajax.php?numFolio=' + numFolio);
  x.setRequestHeader('Cache-Control', 'no-cache');
  x.send(null);
  x.onreadystatechange = function () {
    if (x.status == 200 && x.readyState == 4) {
      var myObj = JSON.parse(this.responseText);

      Swal.fire({
        icon: 'success',
        title: '¡Boleto(s) apartados por 12 horas!',
        html:
          '<p>Folio: ' +
          myObj[0].numFolio +
          '</p><p>Nombre: ' +
          myObj[0].nombre +
          '</p><p>Ubicación: ' +
          myObj[0].localidad +
          '</p><p>Estatus: ' +
          myObj[0].estatus +
          '</p><p>Total a pagar: $' +
          myObj[0].monto +
          ' MXN</p><p>Boletos: ' +
          myObj[0].boleto +
          '</p>',
        footer:
          'Atencion: Este es tu boleto oficial, toma captura de pantalla y guardala',
        showConfirmButton: true,
        confirmButtonText: 'Cerrar',
      }).then((result) => {
        if (result.value) {
          window.location = 'comprar';
        }
      });
      $('#folioBuscar').val('');
    }
  };
});

cargarBoletos();
quitarBoletos();
