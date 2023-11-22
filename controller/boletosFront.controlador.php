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
		
		//update de los boletos apartados
        $respuesta = ModeloBoletosFront::mdlConseguirBoletosFront($tabla, $datos);

        $situacionBoletoFront = ModeloBoletosFront::mdlSituacionBoletoFront($tabla, $respuesta);

		$boletosTodos = "";
		$totalBoletos = 0;
        
		foreach ($situacionBoletoFront as $key => $value) {
			$boletosTodos .= $value["num_boleto"].', ';
			if($value["boletoPadre"] == null){
				$totalBoletos++;
			}	
		}
		
		$totalPagar = $totalBoletos * 99;

		switch ($_POST["apartarEstado"]) {
		  case 1:
			$EstadoCompleto = ucwords("aguascalientes");
			break;
		  case 2:
			$EstadoCompleto = ucwords("baja california");                                
			break;
		  case 3:
			$EstadoCompleto = ucwords("baja california sur");                                
			break; 
		  case 4:
			$EstadoCompleto = ucwords("campeche");                                
			break; 
		  case 5:
			$EstadoCompleto = ucwords("chiapas");                                
			break; 
		  case 6:
			$EstadoCompleto = ucwords("chihuahua");                                
			break; 
		  case 7:
			$EstadoCompleto = ucwords("coahuila");                                
			break; 
		  case 8:
			$EstadoCompleto = ucwords("colima");                                
			break; 
		  case 9:
			$EstadoCompleto = ucwords("ciudad de méxico");                                
			break; 
		  case 10:
			$EstadoCompleto = ucwords("durango");                                
			break; 
		  case 11:
			$EstadoCompleto = ucwords("guanajuato");                                
			break; 
		  case 12:
			$EstadoCompleto = ucwords("guerrero");                                
			break; 
		  case 13:
			$EstadoCompleto = ucwords("hidalgo");                                
			break; 
		  case 14:
			$EstadoCompleto = ucwords("jalisco");                                
			break; 
		  case 15:
			$EstadoCompleto = ucwords("méxico");                                
			break; 
		  case 16:
			$EstadoCompleto = ucwords("michoacán");                                
			break; 
		  case 17:
			$EstadoCompleto = ucwords("morelos");                                
			break; 
		  case 18:
			$EstadoCompleto = ucwords("nayarit");                                
			break; 
		  case 19:
			$EstadoCompleto = ucwords("nuevo leon");                                
			break; 
		  case 20:
			$EstadoCompleto = ucwords("oaxaca");                                
			break; 
		  case 21:
			$EstadoCompleto = ucwords("puebla");                                
			break; 
		  case 22:
			$EstadoCompleto = ucwords("querétaro");                                
			break; 
		  case 23:
			$EstadoCompleto = ucwords("quintana roo");                                
			break; 
		  case 24:
			$EstadoCompleto = ucwords("san luis potosí");                                
			break; 
		  case 25:
			$EstadoCompleto = ucwords("sinaloa");                                
			break; 
		  case 26:
			$EstadoCompleto = ucwords("sonora");                                
			break; 
		  case 27:
			$EstadoCompleto = ucwords("tabasco");                                
			break; 
		  case 28:
			$EstadoCompleto = ucwords("tamaulipas");                                
			break; 
		  case 29:
			$EstadoCompleto = ucwords("tlaxcala");                                
			break; 
		  case 30:
			$EstadoCompleto = ucwords("veracruz");                                
			break; 
		  case 31:
			$EstadoCompleto = ucwords("yucatan");                                
			break; 
		  case 32:
			$EstadoCompleto = ucwords("zacatecas");                                
			break; 
		  case 33:
			$EstadoCompleto = ucwords("extranjero");                                
			break;                             
		}
		
        echo'<script>
                Swal.fire({
                  icon: "success",
                  title: "¡Boleto(s) apartados por 12 horas!",
				  html: "<p>Folio: '.$respuesta.'</p><p>Nombre: '.$_POST["apartarNombre"].'</p><p>Ubicación: '.$EstadoCompleto.'</p><p>Total a pagar: $'.number_format($totalPagar,2).' MXN</p><p>Boletos: '.$boletosTodos.'</p>",
   			      footer: "<b>Atencion: Este es tu boleto oficial, toma captura de pantalla y guardala</b>",
                  showConfirmButton: true,
                  confirmButtonText:"Whatsapp"
                    }).then((result) => {
											if(result.isConfirmed){
												window.open("https://api.whatsapp.com/send/?phone=+5215635383745&text=Hola&type=phone_number&app_absent=0");
											}else{
												window.location = "comprar";
											}
                    })
              </script>';
							return ;
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