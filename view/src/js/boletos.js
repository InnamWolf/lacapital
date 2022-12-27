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