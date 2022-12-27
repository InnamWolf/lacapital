//* ===============================================
//* EDITAR USUARIOS
//* ===============================================
  $(".table").on("click", ".btnEditarUsuario", function(){
  
   var idUsuario = $(this).attr("idUsuario");  
   var datos = new FormData();
   datos.append("idUsuario", idUsuario);   
  
   $.ajax({
    url: "ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      
      $("#editarUsuario").val(respuesta["usuario"]);     
      $("#editarNombre").val(respuesta["nombre"]);           
      $("#passActual").val(respuesta["password"]);
      $("#idUsuarioEditar").val(respuesta["id"]);
      

    }

   }); 
   
})
