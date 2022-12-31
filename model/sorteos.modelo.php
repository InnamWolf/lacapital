<?php

require_once "conexion.php";

class ModeloSorteos{

  static public function mdlNuevoSorteo($tabla){

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estatus = 0, telefono = null,  nombre = null, apellido = null, localidad = null, folio =  null"); 
    
    if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

  }

}