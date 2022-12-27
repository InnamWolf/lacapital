<?php

require_once "../controller/sorteos.controlador.php";
require_once "../model/sorteos.modelo.php";

class AjaxSorteos{
   

    public $nuevo;
    

  //* ===============================================
  //* VALIDAR BOLETOS 2
  //* ===============================================

    public function ajaxNuevoSorteo(){

        $tabla = "boletos"; 

        $respuesta = ModeloSorteos::mdlNuevoSorteo($tabla);         
        
        echo json_encode($respuesta);

    } 
    

}

  //* ===============================================
  //* VALIDAR BOLETOS 1
  //* ===============================================
  
  if(isset($_POST["nuevo"])){         
    
    $pagar = new AjaxSorteos();
    $pagar -> idBoleto = $_POST["nuevo"];
    $pagar -> ajaxNuevoSorteo();        

  }

 