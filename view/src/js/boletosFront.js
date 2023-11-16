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
  if (cantidadBoleto < 50) {
    setTimeout(function () {
      objeto.style.display = 'none';
      location.reload();
    }, 10000);
  } else {
    setTimeout(function () {
      objeto.style.display = 'none';
      location.reload();
    }, 180000);
  }
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
            oportunidadBoletos();
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
        var numBoleto = $(this).attr('numBoleto');
        var x = new XMLHttpRequest();
        x.open(
          'GET',
          'ajax/quitarBoletos.ajax.php?idBoleto=' +
            idBoleto +
            '&numBoleto=' +
            numBoleto
        );
        x.setRequestHeader('Cache-Control', 'no-cache');
        x.send(null);
        x.onreadystatechange = function () {
          if (x.status == 200 && x.readyState == 4) {
            cargarBoletos();
            quitarBoletos();
            oportunidadBoletos();
          }
        };
      });
    },
  });
}

function oportunidadBoletos() {
  var objeto = document.getElementById('mostrarOportunidad');
  var x = new XMLHttpRequest();
  x.responseType = 'json';
  x.open('GET', 'ajax/oportunidadFront.ajax.php', true);
  x.setRequestHeader('Cache-Control', 'no-cache');
  x.send(null);
  x.onreadystatechange = function () {
    if (x.status == 200 && x.readyState == 4) {
      var objectJS = x.response;
      var cadena = '';
      var i;
      for (i in objectJS) {
        if (objectJS | ([i] instanceof Object)) {
          cadena +=
            '<p>' + objectJS[i].boleto + ': [' + objectJS[i].opor + ']<br></p>';
        }
      }
      if (objectJS != null) {
        objeto.style.display = 'block';
        $('#oportunidadBoleto').html(cadena);
      } else {
        objeto.style.display = 'none';
      }
    }
  };
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
        oportunidadBoletos();
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
      if (myObj[0].exito == '1') {
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
            '<b>Atencion: Este es tu boleto oficial, toma captura de pantalla y guardala</b>',
          showConfirmButton: true,
          confirmButtonText: 'Whatsapp',
        }).then((result) => {
          if (result.value) {
            window.open(
              'https://api.whatsapp.com/send/?phone=0000000000&type=phone_number&app_absent=0'
            );
          }
        });
      } else {
        Swal.fire({
          icon: 'error',
          title: '¡Asegurate de que el número de folio sea correcto!',
          showConfirmButton: true,
          confirmButtonText: 'Cerrar',
        });
      }
      $('#folioBuscar').val('');
    }
  };
});

cargarBoletos();
quitarBoletos();
oportunidadBoletos();
