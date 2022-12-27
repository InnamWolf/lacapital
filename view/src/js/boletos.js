//* ===============================================
//* VALIDAR BOLETO
//* ===============================================
$(".table").on("click", ".boletoPagado", function(){

  var idBoleto = $(this).attr("idBoleto"); 
  var datos = new FormData();   
  datos.append("idBoleto", idBoleto);

  $.ajax({
    url: "ajax/boletos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) { 

      if(respuesta == "ok"){

        
        Swal.fire({

          icon: "success",
          title: "Boleto pagado con exito",
          showConfirmButton: true,
          confirmButtonText:"Cerrar"

            }).then((result) => {

                if(result.value){
                    
                    window.location = "valBoleto";
                }
            })

      }

    }

   }); 

});

//* ===============================================
//* CANCELAR BOLETO
//* ===============================================
$(".table").on("click", ".boletoCancelado", function(){

  var idBoletoCan = $(this).attr("idBoletoCan"); 
  var datos = new FormData();   
  datos.append("idBoletoCan", idBoletoCan);
  
  $.ajax({
    url: "ajax/boletos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) { 

      if(respuesta == "ok"){

        
        Swal.fire({

          icon: "success",
          title: "El boleto puede volverse a alegir",
          showConfirmButton: true,
          confirmButtonText:"Cerrar"

            }).then((result) => {

                if(result.value){
                    
                    window.location = "valBoleto";
                }
            })

      }

    }

   }); 
 
});