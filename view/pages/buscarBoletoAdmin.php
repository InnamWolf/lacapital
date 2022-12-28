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
            <h1>Buscar Boletos Administrador</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="escritorio">Inicio</a></li>
              <li class="breadcrumb-item active">Buscar Boletos Administrador</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">       

        <div class="card-body table-responsive">
        
          <section class="content">
              <div class="container-fluid">
                  <h2 class="text-center display-4">Buscar Boleto</h2>
                  <div class="row">
                      <div class="col-md-8 offset-md-2">
                          <form method="post">
                              <div class="input-group">
                                  <input type="search" class="form-control form-control-lg" placeholder="Escribe solo el número de boleto: 00001" name="bucarBoleto">
                                  <div class="input-group-append">
                                      <button type="submit" class="btn btn-lg btn-default">
                                          <i class="fa fa-search"></i>
                                      </button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </section>          

          <?php

            $login = new ControladorBoletos();
            $login -> ctrBuscarBoletosAdmin();             

          ?>
        </div>
        
      </div>
      
    </section>
    
  </div>
  

  <?php
    include ('view/components/cpanelFooter.php');
  ?>

<script src="view/src/js/boletos.js"></script> 