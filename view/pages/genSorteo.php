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
            <h1>Generar Sorteo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="escritorio">Inicio</a></li>
              <li class="breadcrumb-item active">Generar Sorteo</li>
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

          <button type="button" class="btn btn-primary btn-lg nuevoSorteo">Generar sorteo</button>
        
        </div>
        
      </div>
      
    </section>
    
  </div>
  

  <?php
    include ('view/components/cpanelFooter.php');
  ?>

<script src="view/src/js/sorteo.js"></script> 


