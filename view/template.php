<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--===============================================
  Lib CSS
  =================================================-->
  <link rel="stylesheet" href="view/src/css/main.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>    
  <!-- Normalize -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"/>
  <!-- AdminLTD -->
  <link rel="stylesheet" href="view/src/dist/css/adminlte.min.css">
  <!--===============================================
  lib js
  =================================================-->    
  <!-- Jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- <link rel="icon" href="view/src/img/icono.png" sizes="64x64"> -->

  <title>Sorteos la Capital</title>

</head>

<body>

  <div class="wrapper">

    <?php

      //* ===============================================
      //* White List URL
      //* ===============================================
      if(isset($_GET["url"])){        

        if( $_GET["url"] == "inicio" ||
            $_GET["url"] == "aviso" ||
            $_GET["url"] == "cuentas" ||
            $_GET["url"] == "cpanel"

        ){


          include "pages/".$_GET["url"].".php";

        }else{

            include "pages/404.php";
        }

      }else{
          include_once 'view/components/menu.php';
          include "pages/inicio.php";
          include_once 'view/components/footer.php';
      }   

    ?>

  </div>

  <script src="view/src/js/main.js"></script>

<!-- jQuery -->
<script src=".view/src/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="view/src/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="view/src/dist/js/adminlte.min.js"></script>

</body>

</html>
