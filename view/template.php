<?php 
  session_start();   
?>


  <?php    
    
    if(isset($_GET["url"])){       

      if($_GET["url"] == "inicio" ||
         $_GET["url"] == "aviso" ||
         $_GET["url"] == "cuentas" ||
         $_GET["url"] == "sistema" ||
         $_GET["url"] == "salir"  ||
         $_GET["url"] == "escritorio" ||
         $_GET["url"] == "usuario" ||
         $_GET["url"] == "comprar" ||
         $_GET["url"] == "genRifa" ||
         $_GET["url"] == "valBoleto" ||
         $_GET["url"] == "buscarBoleto" ||
         $_GET["url"] == "genSorteo" ||
         $_GET["url"] == "buscarBoletoAdmin" 
      ){
        if($_GET["url"] == "sistema" ||
          $_GET["url"] == "salir" ||
          $_GET["url"] == "escritorio" ||
          $_GET["url"] == "usuario" ||
          $_GET["url"] == "genRifa" ||
          $_GET["url"] == "valBoleto" ||
          $_GET["url"] == "buscarBoleto"||
          $_GET["url"] == "genSorteo" ||
          $_GET["url"] == "buscarBoletoAdmin" 
        ){
          include "pages/".$_GET["url"].".php";  
        }else{
          include_once 'view/components/bodyFront.php';
          include_once 'view/components/menu.php';
          include "pages/".$_GET["url"].".php";
          include_once 'view/components/footer.php';
        }
      }else{
        include_once 'view/components/bodyFront.php';
        include_once 'view/components/menu.php';
        include "pages/404.php";
        include_once 'view/components/footer.php';
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

<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '739534664768647');
fbq('track', 'PageView');
fbq('track', 'ViewContent');
fbq('track', 'CompleteRegistration');
fbq('track', 'Contact');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=739534664768647&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

</html>