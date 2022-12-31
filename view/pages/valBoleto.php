<?php 
  include ('view/pages/credencial.php');
  include ('view/components/cpanelHeader.php');
?>
<!-- Site wrapper -->
<div class="wrapper">  
  <!-- Navbar -->
  <?php
    include ('view/components/cpanelNavBar.php');
    include ('view/components/cpanelMenu.php');
  ?>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Validar Boletos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="escritorio">Inicio</a></li>
              <li class="breadcrumb-item active">Validar Boletos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">       

        <div class="card-body">

        <table id="example2" class="table table-bordered table-hover">

            <thead>
            <tr>
              <th># Boleto</th>
              <th>Folio</th>
              <th>Nombre</th>
              <th>Estado</th>
              <th>Fecha comprado</th>
              <th>Situacion pago</th>
              <th>Confirmar pago</th>              
              <th>Retirar boleto</th>
            </tr>
            </thead>              
            <tbody>
              <?php

                $boletos = ControladorBoletos::ctrMostrarBoletos();

                foreach ($boletos as $key => $value) {
                  
                  echo '
                    <tr>
                      <td>'.$value["num_boleto"].'</td>
                      <td>'.$value["folio"].'</td>
                      <td>'.ucfirst($value["nombre"]).' '. ucfirst($value["apellido"]).'</td>
                      <td>';
                            switch ($value["localidad"]) {
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
                      <td>'.ucwords($value["comprado"]).'</td>
                      <td>';
                        if($value["estatus"] == 1){
                          echo'
                          <p class="text-warning">Pago Pendiente</p>';
                        }                        
                      echo'</td>
                      <td><button type="button" class="btn btn-block btn-success btn-xs boletoPagado" idBoleto="'.$value["id"].'">Pagado</button></td>
                      <td><button type="button" class="btn btn-block btn-danger btn-xs boletoCancelado" idBoletoCan="'.$value["id"].'">Cacelar</button></td>                     
                    </tr>     
                  ';

                }
              ?>
                              
            </tbody>          
          </table>
          
        </div>
        
      </div>
      
    </section>
    
  </div>
  

  <?php
    include ('view/components/cpanelFooter.php');
  ?>

<script src="view/src/js/boletos.js"></script> 

<script>
  
  $(function () {    
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
