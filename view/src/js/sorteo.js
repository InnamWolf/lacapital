const button = document.querySelector(".nuevoSorteo");

button.addEventListener("click", (e) => {

  var nuevo = 'nuevo';
  var datos = new FormData();   
  datos.append("nuevo", nuevo);

  $.ajax({
    url: "ajax/sorteos.ajax.php",
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
          title: "Se han generado 60,000 boletos nuevos",
          showConfirmButton: true,
          confirmButtonText:"Cerrar"

            }).then((result) => {

                if(result.value){
                    
                    window.location = "escritorio";
                }
            })

      }else{

        Swal.fire({

          icon: "error",
          title: "No se a podido generar sorteo",
          showConfirmButton: true,
          confirmButtonText:"Cerrar"

            }).then((result) => {

                if(result.value){
                    
                    window.location = "genSorteo";
                }
            })
      }

    }

   });  
 
});

