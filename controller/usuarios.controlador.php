<?php

class ControladorUsuarios{

  //* ===============================================
  //* INGRESAR USUARIO
  //* ===============================================

  static public function ctrIngresoUsuario(){

    if(isset($_POST["logUsuario"])){

      if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["logUsuario"]) &&
      preg_match('/^[a-zA-Z0-9]+$/', $_POST["logPassword"]) ){

          $tabla = "usuarios"; //tabla
          $item = "usuario";  //columna
          $valor = $_POST["logUsuario"]; // Dato a enviar          

          $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);


            if(is_array($respuesta) && $respuesta["usuario"] == $_POST["logUsuario"] && $respuesta["password"] == $_POST["logPassword"]){
              
              $_SESSION["credencial"] = "ok";
              
              echo'
              <script>
                window.location = "escritorio";
              </script>  
              ';              

            }
            else{

              echo'
                <script>      

                Swal.fire({

                        icon: "error",
                        title: "El usuario y/o password incorrectos",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar"

                    }).then((result) => {

                        if(result.value){
                            
                            window.location = "cpanel";
                        }
                    })

                </script>
              ';           

            }
                                  
      }

    }


  }

  //* ===============================================
  //* MOSTRAR USUARIOS
  //* ===============================================

  static public function ctrMostrarUsuarios($item, $valor){

    $tabla = "usuarios";
    $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

    return $respuesta;

  }


}