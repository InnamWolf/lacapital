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

  static public function mdlCancelarBoletos($tabla, $valor){

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estatus = 0 WHERE id = :valor"); 
    
    $stmt -> bindParam(":valor",$valor, PDO::PARAM_INT);

    if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

  }

  static public function mdlBuscarBoletos($tabla, $boleto){

    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where num_boleto = :boleto");
    
    $stmt -> bindParam(":boleto",$boleto, PDO::PARAM_STR);    

    $stmt -> execute();

    return $stmt -> fetch();     

  }

}