<section class="login">

  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="inicio" class="h1"><b>La Capital</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Incia sesión para acceder el sistema</p>

        <form method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Usuario" name="logUsuario">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="logPassword">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div> 
          
          <button type="submit" class="btn mx-auto d-block btn-outline-primary">Inicia sesión</button>

          <?php

            $login = new ControladorUsuarios();
            $login -> ctrIngresoUsuario(); 

          ?>

        </form>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

</section>