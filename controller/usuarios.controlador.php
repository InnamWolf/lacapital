<?php

class ControladorUsuarios{

  //* ===============================================
  //* INGRESAR USUARIO
  //* ===============================================

  static public function ctrIngresoUsuario(){

    if(isset($_POST["logUsuario"])){

      if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["logUsuario"]) &&
      preg_match('/^[a-zA-Z0-9]+$/', $_POST["logPassword"]) ){

          $encriptar = crypt($_POST["logPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

          $tabla = "usuarios"; //tabla
          $item = "usuario";  //columna
          $valor = $_POST["logUsuario"]; // Dato a enviar          

          $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);


            if(is_array($respuesta) && $respuesta["usuario"] == $_POST["logUsuario"] && $respuesta["password"] == $encriptar){
              
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

  //* ===============================================
  //* EDITAR USUARIOS
  //* ===============================================
  
  static public function ctrEditarUsuario(){

    if(isset($_POST["editarUsuario"])){


      if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){       

        $tabla = "usuarios";        

        if($_POST["editarPassword"] != ""){          

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

            $encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');               

					}else{  
            
            echo'<script>

                Swal.fire({

                  icon: "error",
                  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
                  showConfirmButton: true,
                  confirmButtonText:"Cerrar"

                    }).then((result) => {

                        if(result.value){
                            
                            window.location = "usuario";
                        }
                    })								

						  	</script>';    
                
                return;

					}

				}else{
                 
					$encriptar = $_POST["passActual"];        
          
				}

          $datos = array("usuario" => $_POST["editarUsuario"],
                      "nombre" => $_POST["editarNombre"],
                      "id" => $_POST["idUsuarioEditar"],
                      "password" => $encriptar);
        
        $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

        if($respuesta == "ok"){

					echo'<script>

            Swal.fire({

              icon: "success",
              title: "El usuario ha sido editado correctamente",
              showConfirmButton: true,
              confirmButtonText:"Cerrar"

                }).then((result) => {

                    if(result.value){
                        
                        window.location = "usuario";
                    }
                })			   

					</script>';

				}

      }else{

				echo'<script>

          Swal.fire({

            icon: "error",
            title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText:"Cerrar"

              }).then((result) => {

                  if(result.value){
                      
                      window.location = "usuario";
                  }
              })						

			  	</script>';
			}    

    }

  }

}