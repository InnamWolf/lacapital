<?php 
  session_start();   
?>


  <?php    
    
    if(isset($_GET["url"])){       

      if($_GET["url"] == "inicio" ||
         $_GET["url"] == "aviso" ||
         $_GET["url"] == "cuentas" ||
         $_GET["url"] == "cpanel" ||
         $_GET["url"] == "salir"  ||
         $_GET["url"] == "escritorio" ||
         $_GET["url"] == "usuario"         
      ){        
        if($_GET["url"] == "cpanel" ||
          $_GET["url"] == "salir" ||
          $_GET["url"] == "escritorio" ||
          $_GET["url"] == "usuario")            
        {
          include "pages/".$_GET["url"].".php";  
        }else{
          include_once 'view/components/bodyFront.php';
          include_once 'view/components/menu.php';
          include "pages/".$_GET["url"].".php";
          include_once 'view/components/footer.php';
        }
      }
        
      }        
      else{
        include_once 'view/components/bodyFront.php';
        include_once 'view/components/menu.php';
        include "pages/inicio.php";
        include_once 'view/components/footer.php';
          
        } 
  ?>

  </div>
  
  <script src="view/src/js/main.js"></script>  

</body>

</html>
