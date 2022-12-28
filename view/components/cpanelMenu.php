<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="escritorio" class="brand-link">
    <img src="view/src/img/logo.svg" alt="LaCapital Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">La Capittal</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="view/src/img/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Administrador </a>
      </div>
    </div>    

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->        
        <li class="nav-item">
          <a href="escritorio" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Escritorio</p>
          </a>          
        </li> 

        <li class="nav-item">
          <a href="usuario" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Usuario</p>
          </a>         
        </li> 
        
        <li class="nav-item">

          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-ticket"></i>
            <p>
              Boletos
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="valBoleto" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Validar boleto</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="buscarBoleto" class="nav-link">
                <i class="far fa-dot-circle nav-icon "></i>
                <p>Buscar boleto</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="buscarBoletoAdmin" class="nav-link">
                <i class="far fa-dot-circle nav-icon "></i>
                <p>Buscar boleto Admin</p>
              </a>
            </li>  

          </ul>

        </li>

        <li class="nav-item">

          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-clover"></i>
            <p>
              Sorteo
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="genSorteo" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Generar Sorteo</p>
              </a>
            </li>
          </ul>
          
        </li>     
        
        <li class="nav-item">
          <a href="salir" class="nav-link">
            <i class="nav-icon fas fa-door-open"></i>
            <p>Cerrar sesión</p>
          </a>          
        </li> 

      </ul>

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>