<?php

require_once "conexion.php";

class ModeloUsuarios{

  //* ===============================================
  //* MOSTRAR USUARIOS
  //* ===============================================

  static public function mdlMostrarUsuarios($tabla, $item, $valor){

    if($item != null){ 

      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where $item = :$item");

      $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
  
      $stmt -> execute();
  
      return $stmt -> fetch();      

    }else{

      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");      
  
      $stmt -> execute();
  
      return $stmt -> fetchAll();  

    }

    $stmt -> close();
    $stmt = null;    

  }

  //* ===============================================
  //* EDITAR USUARIOS
  //* ===============================================
  static public function mdlEditarUsuario($tabla, $datos){
    
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, usuario = :usuario WHERE id = :id");
    echo '<pre>'; print_r($stmt); echo'</pre>';
     exit();

  	$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
    $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt -> execute()){      

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

  
}
