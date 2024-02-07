<?php
require_once "../model/sorteos.modelo.php";

class AjaxSorteos{  
    public $nuevo;

  //* ===============================================
  //* GENERAR NUEVA RIFA 2
  //* ===============================================

    public function ajaxNuevoSorteo(){

        $tabla = "boletos"; 

        $respuesta = ModeloSorteos::mdlNuevoSorteo($tabla);         
        
        echo json_encode($respuesta);

    } 
    

}

  //* ===============================================
  //* GENERAR NUEVA RIFA 1
  //* ===============================================
  
  if(isset($_POST["nuevo"])){         
    
    $nuevo = new AjaxSorteos();
    $nuevo -> nuevo = $_POST["nuevo"];
    $nuevo -> ajaxNuevoSorteo();        

  }

 