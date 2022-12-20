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
            <h1>Usuario</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="escritorio">Inicio</a></li>
              <li class="breadcrumb-item active">Usuario</li>
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
              <th>#</th>
              <th>Usuario</th>
              <th>Nombre</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Ultimo login</th>
              <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>
                1
              </td>
              <td>
                Admin
              </td>
              <td>
                Alejandro
              </td>
              <td>
                Admin
              </td>
              <td> 
                <button type="button" class="btn btn-block btn-success btn-xs">Activo</button>
              </td>
              <td>
                2022-12-19 18:29:00
              </td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-warning">
                    <i class="fas fa-pencil"></i>
                  </button>
                  <button type="button" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                  </button>                  
                </div>
              </td>
            </tr>                       
            </tbody>          
          </table>
          
        </div>
        
      </div>
      
    </section>
    
  </div>
  

  <?php
    include ('view/components/cpanelFooter.php');
  ?>
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


  

