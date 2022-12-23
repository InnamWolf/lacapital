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
  <!-- AdminLTD -->
  <link rel="stylesheet" href="view/src/dist/css/adminlte.min.css">
  <!-- SWeetAlert -->
  <link rel="stylesheet" href="view/src/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!--===============================================
  lib js
  =================================================-->    
  <!-- Jquery -->
  <script src="view/src/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="view/src/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="view/src/dist/js/adminlte.min.js"></script>
  <!-- SWeetAlert -->
  <script src="view/src/plugins/sweetalert2/sweetalert2.min.js"></script>

  <!-- <link rel="icon" href="view/src/img/icono.png" sizes="64x64"> -->

  <title>Sorteos la Capital</title>

</head>

<body>

  <div class="wrapper">

    <?php  
     

      if(isset($_GET["url"])){        

        if( $_GET["url"] == "cpanel"            
        ){
          include "view/pages/login.php";

        }

      }
    ?>

  </div> 
  

</body>

</html>


