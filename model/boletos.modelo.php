<?php

require_once "conexion.php";

class ModeloBoletos{

  //* ===============================================
  //* MOSTRAR BOLETOS
  //* ===============================================

  static public function mdlMostrarBoletos($tabla){

    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where estatus = 1");      
  
      $stmt -> execute();
  
      return $stmt -> fetchAll(); 

  }

  //* ===============================================
  //* PAGAR BOLETOS
  //* ===============================================

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


  //* ===============================================
  //* CANCELAR BOLETOS
  //* ===============================================
  static public function mdlCancelarBoletos($tabla, $valor){

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estatus = 0, nombre = null, apellido = null, telefono = null, localidad = null, folio = null, ip = null, oportunidad = null, boletoPadre = null  WHERE id = :valor"); 
    
    $stmt -> bindParam(":valor",$valor, PDO::PARAM_INT);

    if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

  }

  //* ===============================================
  //* BUSCAR BOLETOS
  //* ===============================================

  static public function mdlBuscarBoletos($tabla, $boleto){

    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where num_boleto = :boleto");
    
    $stmt -> bindParam(":boleto",$boleto, PDO::PARAM_STR);    

    $stmt -> execute();

    return $stmt -> fetch();     

  }

  //* ===============================================
  //* BUSCAR BOLETOS ADMIN
  //* ===============================================

  static public function mdlBuscarBoletosAdmin($tabla, $boleto){

    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where num_boleto = :boleto");
    
    $stmt -> bindParam(":boleto",$boleto, PDO::PARAM_STR);    

    $stmt -> execute();

    return $stmt -> fetch();     

  }

}