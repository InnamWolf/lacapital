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
                  <th style="width: 200px">Nombre</th>                  
                  <th style="width: 200px">Estado</th>
                  <th style="width: 200px">Estatus</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>'.$respuesta["num_boleto"].'</td>
                  <td>'.ucfirst($respuesta["nombre"]).' '.ucfirst($respuesta["apellido"]).'</td>                 
                  <td>'.ucfirst($respuesta["localidad"]).'</td>
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
                  <th style="width: 200px">Nombre</th>
                  <th style="width: 200px">Teléfono</th>
                  <th style="width: 200px">Estado</th>
                  <th style="width: 200px">Estatus</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>'.$respuesta["num_boleto"].'</td>
                  <td>'.ucfirst($respuesta["nombre"]).' '.ucfirst($respuesta["apellido"]).'</td>
                  <td>'.$respuesta["telefono"].'</td>
                  <td>'.ucfirst($respuesta["localidad"]).'</td>
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