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
                      <td>'.ucfirst($value["nombre"]).' '. ucfirst($value["apellido"]).'</td>
                      <td>'.ucwords($value["localidad"]).'</td>
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



  

