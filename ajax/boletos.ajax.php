<?php

require_once "../controller/boletos.controlador.php";
require_once "../model/boletos.modelo.php";

class AjaxBoletos{

   //* ===============================================
    //* VALIDAR BOLETOS 2
    //* ===============================================

    public $idBoleto;
    public $idBoletoCan;

    public function ajaxPagarBoleto(){

        $tabla = "boletos";              
        $valor = $this->idBoleto;

        $respuesta = ModeloBoletos::mdlPagarBoletos($tabla, $valor);         
        
        echo json_encode($respuesta);

    }

    //* ===============================================
    //* CANCELAR BOLETOS 2
    //* ===============================================

    public function ajaxCancelarBoleto(){

      $tabla = "boletos";              
      $valor = $this->idBoletoCan;

      $respuesta = ModeloBoletos::mdlCancelarBoletos($tabla, $valor);         
      
      echo json_encode($respuesta);

  }

}

  //* ===============================================
  //* VALIDAR BOLETOS 1
  //* ===============================================
  
  if(isset($_POST["idBoleto"])){    
    
    $pagar = new AjaxBoletos();
    $pagar -> idBoleto = $_POST["idBoleto"];
    $pagar -> ajaxPagarBoleto();        

  }

  //* ===============================================
  //* CANCELAR BOLETOS 1
  //* ===============================================
  
  if(isset($_POST["idBoletoCan"])){    
    
    $pagar = new AjaxBoletos();
    $pagar -> idBoletoCan = $_POST["idBoletoCan"];
    $pagar -> ajaxCancelarBoleto();        

  }