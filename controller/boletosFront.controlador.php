<?php

class ControladorBoletosFront{

  //* ===============================================
  //* BUSCAR BOLETO
  //* ===============================================

  static public function ctrBuscarBoletoFront($item, $valor){

    $tabla = "boletos";
    $respuesta = ModeloBoletosFront::mdlBuscarBoletoFront($tabla, $item, $valor);

    return $respuesta;

  }

  static public function ctrBoletoFrontSeleccionado(){

    $tabla = "boletos";
    $respuesta = ModeloBoletosFront::mdlBoletoFrontSeleccionado($tabla);

    return $respuesta;

  }

  static public function ctrConseguirBoletoFront(){
    
    if(isset($_POST["apartarWhatsapp"])){

      if(preg_match('/^[0-9]+$/', $_POST["apartarWhatsapp"]) ||
         preg_match('/^[a-zA-Z]+$/', $_POST["apartarNombre"]) ||
         preg_match('/^[a-zA-Z]+$/', $_POST["apartarApellido"])){

        $tabla = "boletos";
        $datos = array("apartarWhatsapp" => $_POST["apartarWhatsapp"],
                      "apartarNombre" => $_POST["apartarNombre"],
                      "apartarApellido" => $_POST["apartarApellido"],
                      "apartarEstado" => $_POST["apartarEstado"]);

        $respuesta = ModeloBoletosFront::mdlConseguirBoletosFront($tabla, $datos);

        echo'<script>
                Swal.fire({
                  icon: "success",
                  title: "¡Boleto(s) apartados por 12 horas!",
                  showConfirmButton: true,
                  confirmButtonText:"Cerrar"
                    }).then((result) => {
                        if(result.value){
                            window.location = "comprar";
                        }
                    })
              </script>';

            return;
      }else {
        echo'<script>
                Swal.fire({
                  icon: "error",
                  title: "¡Asegurate de que tus datos no lleven caracteres especiales!",
                  showConfirmButton: true,
                  confirmButtonText:"Cerrar"
                    }).then((result) => {
                        if(result.value){
                            window.location = "comprar";
                        }
                    })
              </script>';

            return;
      }

    }

  }

  static public function ctrSituacionBoletoFront($item, $valor){

    $tabla = "boletos";
    $respuesta = ModeloBoletosFront::mdlSituacionBoletoFront($tabla, $item, $valor);

    return $respuesta;

  }



}