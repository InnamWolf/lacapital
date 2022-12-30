<?php

require_once "conexion.php";

class ModeloBoletosFront{

  //* ===============================================
  //* BUSCAR BOLETOS
  //* ===============================================

  static public function mdlBuscarBoletoFront($tabla, $item, $valor){

    if($item != null){ 

      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where $item = :$item");

      $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
  
      $stmt -> execute();
  
      return $stmt -> fetch();      

    }else{

      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where estatus = 0");      
  
      $stmt -> execute();
  
      return $stmt -> fetchAll();  

    }

    $stmt -> close();
    $stmt = null;    

  }

  //* ===============================================
  //* BOLETO SELECCIONADO
  //* ===============================================

  static public function mdlBoletoFrontSeleccionado($tabla){

      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where estatus = 3 and ip = '".$_SERVER['REMOTE_ADDR']."'");
  
      $stmt -> execute();
  
      return $stmt -> fetchAll();      

    $stmt -> close();
    $stmt = null;    

  }

  static public function mdlApartarBoletoFront($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estatus = 3, ip = '".$_SERVER['REMOTE_ADDR']."' WHERE $item = :id");

    $stmt -> bindParam(":id", $valor, PDO::PARAM_INT);

		if($stmt -> execute()){      

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


  static public function mdlConseguirBoletosFront($tabla, $datos){

  	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET telefono = :apartarWhatsapp, nombre = :apartarNombre, apellido = :apartarApellido, localidad = :apartarEstado, estatus = 1 WHERE ip = '".$_SERVER['REMOTE_ADDR']."' and estatus = 3");

  	$stmt -> bindParam(":apartarWhatsapp", $datos["apartarWhatsapp"], PDO::PARAM_STR);
		$stmt -> bindParam(":apartarNombre", $datos["apartarNombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":apartarApellido", $datos["apartarApellido"], PDO::PARAM_STR);
    $stmt -> bindParam(":apartarEstado", $datos["apartarEstado"], PDO::PARAM_STR);

		if($stmt -> execute()){      

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
  

  //* ===============================================
  //* BOLETO SELECCIONADO
  //* ===============================================

  static public function mdlSituacionBoletoFront($tabla){

    //if($ip != null){ 

      $stmt = Conexion::conectar()->prepare("SELECT folio, num_boleto, concat(upper(nombre),' ',upper(apellido)) as nombre, upper(localidad) as localidad, case estatus when '1' then 'PAGO PENDIENTE' when '2' then 'PAGADO' ELSE 'DISPONIBLE' end as estatus FROM $tabla where estatus in (1,2)");
  
      $stmt -> execute();
  
      return $stmt -> fetchAll();      

    //}

    $stmt -> close();
    $stmt = null;    

  }
  
  static public function mdlBoletoFrontAleatorio($tabla, $datos){
/*SELECT num_boleto FROM `boletos` where estatus = 0 order BY rand() LIMIT 10 */

    $stmt = Conexion::conectar()->prepare("SELECT num_boleto FROM boletos where estatus = 0 order BY rand() LIMIT :cantidadBoleto");

    $stmt -> bindParam(":cantidadBoleto", $datos["cantidadBoleto"], PDO::PARAM_INT);

    $stmt -> execute();
  
    $aleatorios = $stmt -> fetchAll(); 


    foreach ($aleatorios as $key => $value) {

      $stmt2 = Conexion::conectar()->prepare("UPDATE $tabla SET estatus = 3, ip = '".$_SERVER['REMOTE_ADDR']."' WHERE num_boleto = '".$value["num_boleto"]."'");
  
      $stmt2 -> execute();

    }



    return "ok";

	}

}
