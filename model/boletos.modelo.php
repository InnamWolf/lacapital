<?php

require_once "conexion.php";

class ModeloBoletos{

  static public function mdlMostrarBoletos($tabla){

    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where estatus = 1");      
  
      $stmt -> execute();
  
      return $stmt -> fetchAll(); 

  }
}