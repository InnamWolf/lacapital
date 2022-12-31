<?php

class ControladorBoletos{

  //* ===============================================
  //* MOSTRAR BOLETOS
  //* ===============================================

  static public function ctrMostrarBoletos(){

    $tabla = "boletos";
    $respuesta = ModeloBoletos::mdlMostrarBoletos($tabla);

    return $respuesta;

  }

  //* ===============================================
  //* BUSCAR BOLETO
  //* ===============================================

  static public function ctrBuscarBoletos(){

    if(isset($_POST["bucarBoleto"])){      

      if(preg_match('/^[0-9]+$/', $_POST["bucarBoleto"]) && strlen($_POST["bucarBoleto"]) == 5){

        $tabla = "boletos";
        $boleto = $_POST["bucarBoleto"];
        $respuesta = ModeloBoletos::mdlBuscarBoletos($tabla, $boleto);

        if(is_array($respuesta) != '' ){           
          echo'          
            <table class="table table-sm mt-3 mx-auto" style="width: 1000px">
              <thead>
                <tr>
                  <th style="width: 200px">Numero Boleto</th>
                  <th style="width: 200px">Folio</th>
                  <th style="width: 200px">Nombre</th>                  
                  <th style="width: 200px">Estado</th>
                  <th style="width: 200px">Estatus</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>'.$respuesta["num_boleto"].'</td>
                  <td>'.$respuesta["folio"].'</td>
                  <td>'.ucfirst($respuesta["nombre"]).' '.ucfirst($respuesta["apellido"]).'</td>                 
                  <td>';
                            switch ($respuesta["localidad"]) {
                              case 1:
                                echo ucwords("aguascalientes");
                                break;
                              case 2:
                                echo ucwords("baja california");                                
                                break;
                              case 3:
                                echo ucwords("baja california sur");                                
                                break; 
                              case 4:
                                echo ucwords("campeche");                                
                                break; 
                              case 5:
                                echo ucwords("chiapas");                                
                                break; 
                              case 6:
                                echo ucwords("chihuahua");                                
                                break; 
                              case 7:
                                echo ucwords("coahuila");                                
                                break; 
                              case 8:
                                echo ucwords("colima");                                
                                break; 
                              case 9:
                                echo ucwords("ciudad de méxico");                                
                                break; 
                              case 10:
                                echo ucwords("durango");                                
                                break; 
                              case 11:
                                echo ucwords("guanajuato");                                
                                break; 
                              case 12:
                                echo ucwords("guerrero");                                
                                break; 
                              case 13:
                                echo ucwords("hidalgo");                                
                                break; 
                              case 14:
                                echo ucwords("jalisco");                                
                                break; 
                              case 15:
                                echo ucwords("méxico");                                
                                break; 
                              case 16:
                                echo ucwords("michoacán");                                
                                break; 
                              case 17:
                                echo ucwords("morelos");                                
                                break; 
                              case 18:
                                echo ucwords("nayarit");                                
                                break; 
                              case 19:
                                echo ucwords("nuevo leon");                                
                                break; 
                              case 20:
                                echo ucwords("oaxaca");                                
                                break; 
                              case 21:
                                echo ucwords("puebla");                                
                                break; 
                              case 22:
                                echo ucwords("querétaro");                                
                                break; 
                              case 23:
                                echo ucwords("quintana roo");                                
                                break; 
                              case 24:
                                echo ucwords("san luis potosí");                                
                                break; 
                              case 25:
                                echo ucwords("sinaloa");                                
                                break; 
                              case 26:
                                echo ucwords("sonora");                                
                                break; 
                              case 27:
                                echo ucwords("tabasco");                                
                                break; 
                              case 28:
                                echo ucwords("tamaulipas");                                
                                break; 
                              case 29:
                                echo ucwords("tlaxcala");                                
                                break; 
                              case 30:
                                echo ucwords("veracruz");                                
                                break; 
                              case 31:
                                echo ucwords("yucatan");                                
                                break; 
                              case 32:
                                echo ucwords("zacatecas");                                
                                break; 
                              case 33:
                                echo ucwords("extranjero");                                
                                break;                             
                            }
                      echo'</td>
                  <td>';
                        if($respuesta["estatus"] == 0){
                          echo'
                          <span class="badge bg-warning">No vendido</span>';                      
                        }
                        if($respuesta["estatus"] == 1){
                          echo'
                          <span class="badge bg-danger">Pendiente pago</span>';                      
                        }
                        if($respuesta["estatus"] == 2){
                          echo'
                          <span class="badge bg-success">Pagado</span>';                      
                        }           
                  echo'</td>
                </tr>            
              </tbody>            
          </div>
          ';

        }else{
          echo'
                <script>      

                Swal.fire({

                        icon: "error",
                        title: "El boleto no existe",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar"

                    }).then((result) => {

                        if(result.value){
                            
                            window.location = "buscarBoleto";
                        }
                    })

                </script>
              ';      
        }

        
        

      }else{
        echo'
                <script>      

                Swal.fire({

                        icon: "error",
                        title: "El boleto solo debe contener números y tener 5 digitos",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar"

                    }).then((result) => {

                        if(result.value){
                            
                            window.location = "buscarBoleto";
                        }
                    })

                </script>
              ';           
      }

    }

  }

  //* ===============================================
  //* BUSCAR BOLETO ADMIN
  //* ===============================================

  static public function ctrBuscarBoletosAdmin(){

    if(isset($_POST["bucarBoleto"])){      

      if(preg_match('/^[0-9]+$/', $_POST["bucarBoleto"]) && strlen($_POST["bucarBoleto"]) == 5){

        $tabla = "boletos";
        $boleto = $_POST["bucarBoleto"];
        $respuesta = ModeloBoletos::mdlBuscarBoletosAdmin($tabla, $boleto);

        if(is_array($respuesta) != '' ){           
          echo'          
            <table class="table table-sm mt-3 mx-auto" style="width: 1000px">
              <thead>
                <tr>
                  <th style="width: 200px">Numero Boleto</th>
                  <th style="width: 200px">Folio</th>
                  <th style="width: 200px">Nombre</th>
                  <th style="width: 200px">Teléfono</th>
                  <th style="width: 200px">Estado</th>
                  <th style="width: 200px">Estatus</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>'.$respuesta["num_boleto"].'</td>
                  <td>'.$respuesta["folio"].'</td>
                  <td>'.ucfirst($respuesta["nombre"]).' '.ucfirst($respuesta["apellido"]).'</td>
                  <td>'.$respuesta["telefono"].'</td>
                  <td>';
                  switch ($respuesta["localidad"]) {
                    case 1:
                      echo ucwords("aguascalientes");
                      break;
                    case 2:
                      echo ucwords("baja california");                                
                      break;
                    case 3:
                      echo ucwords("baja california sur");                                
                      break; 
                    case 4:
                      echo ucwords("campeche");                                
                      break; 
                    case 5:
                      echo ucwords("chiapas");                                
                      break; 
                    case 6:
                      echo ucwords("chihuahua");                                
                      break; 
                    case 7:
                      echo ucwords("coahuila");                                
                      break; 
                    case 8:
                      echo ucwords("colima");                                
                      break; 
                    case 9:
                      echo ucwords("ciudad de méxico");                                
                      break; 
                    case 10:
                      echo ucwords("durango");                                
                      break; 
                    case 11:
                      echo ucwords("guanajuato");                                
                      break; 
                    case 12:
                      echo ucwords("guerrero");                                
                      break; 
                    case 13:
                      echo ucwords("hidalgo");                                
                      break; 
                    case 14:
                      echo ucwords("jalisco");                                
                      break; 
                    case 15:
                      echo ucwords("méxico");                                
                      break; 
                    case 16:
                      echo ucwords("michoacán");                                
                      break; 
                    case 17:
                      echo ucwords("morelos");                                
                      break; 
                    case 18:
                      echo ucwords("nayarit");                                
                      break; 
                    case 19:
                      echo ucwords("nuevo leon");                                
                      break; 
                    case 20:
                      echo ucwords("oaxaca");                                
                      break; 
                    case 21:
                      echo ucwords("puebla");                                
                      break; 
                    case 22:
                      echo ucwords("querétaro");                                
                      break; 
                    case 23:
                      echo ucwords("quintana roo");                                
                      break; 
                    case 24:
                      echo ucwords("san luis potosí");                                
                      break; 
                    case 25:
                      echo ucwords("sinaloa");                                
                      break; 
                    case 26:
                      echo ucwords("sonora");                                
                      break; 
                    case 27:
                      echo ucwords("tabasco");                                
                      break; 
                    case 28:
                      echo ucwords("tamaulipas");                                
                      break; 
                    case 29:
                      echo ucwords("tlaxcala");                                
                      break; 
                    case 30:
                      echo ucwords("veracruz");                                
                      break; 
                    case 31:
                      echo ucwords("yucatan");                                
                      break; 
                    case 32:
                      echo ucwords("zacatecas");                                
                      break; 
                    case 33:
                      echo ucwords("extranjero");                                
                      break;                             
                  }
            echo'</td>
                  <td>';
                        if($respuesta["estatus"] == 0){
                          echo'
                          <span class="badge bg-warning">No vendido</span>';                      
                        }
                        if($respuesta["estatus"] == 1){
                          echo'
                          <span class="badge bg-danger">Pendiente pago</span>';                      
                        }
                        if($respuesta["estatus"] == 2){
                          echo'
                          <span class="badge bg-success">Pagado</span>';                      
                        }           
                  echo'</td>
                </tr>            
              </tbody>            
          </div>
          ';

        }else{
          echo'
                <script>      

                Swal.fire({

                        icon: "error",
                        title: "El boleto no existe",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar"

                    }).then((result) => {

                        if(result.value){
                            
                            window.location = "buscarBoletoAdmin";
                        }
                    })

                </script>
              ';      
        }

        
        

      }else{
        echo'
                <script>      

                Swal.fire({

                        icon: "error",
                        title: "El boleto solo debe contener números y tener 5 digitos",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar"

                    }).then((result) => {

                        if(result.value){
                            
                            window.location = "buscarBoleto";
                        }
                    })

                </script>
              ';           
      }

    }

  }

  
}