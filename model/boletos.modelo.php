<?php

require_once "conexion.php";

class ModeloBoletos{

  static public function mdlMostrarBoletos($tabla){

    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where estatus = 1");      
  
      $stmt -> execute();
  
      return $stmt -> fetchAll(); 

  }

  static public function mdlPagarBoletos($tabla, $valor){

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estatus = 2 WHERE id = :valor"); 
    
    $stmt -> bindParam(":valor",$valor, PDO::PARAM_INT);

    if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

  }


}