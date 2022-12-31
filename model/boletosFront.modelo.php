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

  static public function mdlBoletoFrontSeleccionadoPrueba($tabla, $datos){

      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estatus = 0, ip = null WHERE id = :id and estatus = 3");

      $stmt -> bindParam(":id", $datos["idBoleto"], PDO::PARAM_INT);
  
      if($stmt -> execute()){      

        return "ok";
      
      }else{
  
        return "error";	
  
      }      

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
	
	$stmt = Conexion::conectar()->prepare("SELECT ifnull(max(substr(folio,10)),'00000') + 1 as siguiente_folio 
											FROM boletos");
		
	if(!($stmt -> execute())){
		return var_dump($stmt -> errorInfo());	
	}
	
	$boletoArray = $stmt -> fetch(); 	
	
	foreach ($boletoArray as $key => $value) {		
		$folio = date("Ymd").str_pad($boletoArray["siguiente_folio"],5,'0',STR_PAD_LEFT);					
	}
	
  	$stmt = Conexion::conectar()->prepare("UPDATE $tabla 
											SET telefono = :apartarWhatsapp, 
											nombre = :apartarNombre, 
											apellido = :apartarApellido, 
											localidad = :apartarEstado, 
											estatus = 1,
											folio = '".$folio."'
											WHERE ip = '".$_SERVER['REMOTE_ADDR']."' 
											and estatus = 3");

  	$stmt -> bindParam(":apartarWhatsapp", $datos["apartarWhatsapp"], PDO::PARAM_STR);
	$stmt -> bindParam(":apartarNombre", $datos["apartarNombre"], PDO::PARAM_STR);
	$stmt -> bindParam(":apartarApellido", $datos["apartarApellido"], PDO::PARAM_STR);
    $stmt -> bindParam(":apartarEstado", $datos["apartarEstado"], PDO::PARAM_STR);

		if($stmt -> execute()){      

			return $folio;
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
  

  //* ===============================================
  //* BOLETO SELECCIONADO
  //* ===============================================

  static public function mdlSituacionBoletoFront($tabla, $folio){

      $stmt = Conexion::conectar()->prepare("SELECT num_boleto FROM $tabla where folio = '".$folio."'");
  
      $stmt -> execute();
  
      return $stmt -> fetchAll();      

    $stmt -> close();
    $stmt = null;    

  }
  
  static public function mdlBoletoFrontAleatorio($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("SELECT num_boleto FROM boletos where estatus = 0 order BY rand() LIMIT ".$datos["cantidadBoleto"]);

    //$stmt -> bindParam(":cantidadBoleto", $datos["cantidadBoleto"],PDO::PARAM_STR);

    if(!($stmt -> execute())){
		return var_dump($stmt -> errorInfo(), "SELECT num_boleto FROM boletos where estatus = 0 order BY rand() LIMIT ".$datos["cantidadBoleto"]);	
	}
  
    $aleatorios = $stmt -> fetchAll(); 


    foreach ($aleatorios as $key => $value) {
		
		$txt = "UPDATE $tabla SET estatus = 3, ip = '".$_SERVER['REMOTE_ADDR']."' WHERE num_boleto = '".$value["num_boleto"]."'";

      $stmt2 = Conexion::conectar()->prepare("UPDATE $tabla SET estatus = 3, ip = '".$_SERVER['REMOTE_ADDR']."' WHERE num_boleto = '".$value["num_boleto"]."'");
  
		if(!($stmt2 -> execute())){
			return var_dump($stmt -> errorInfo(), $txt);	
		}

    }

    return "ok";

	}

	static public function mdlBuscaBoleto($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("SELECT num_boleto FROM boletos where estatus = 0 and num_boleto = '".str_pad($datos["numBoleto"],5,'0',STR_PAD_LEFT)."'");
		
		if(!($stmt -> execute())){
			return var_dump($stmt -> errorInfo());	
		}
		
		$boletoArray = $stmt -> fetch(); 
		
		$boletoEncontrado = 0;
		
		foreach ($boletoArray as $key => $value) {
		
			$boletoEncontrado = 1;			
			
			$stmt2 = Conexion::conectar()->prepare("UPDATE $tabla SET estatus = 3, ip = '".$_SERVER['REMOTE_ADDR']."' WHERE num_boleto = '".str_pad($datos["numBoleto"],5,'0',STR_PAD_LEFT)."' and estatus = 0");
			
			if(!($stmt2 -> execute())){
				return var_dump($stmt -> errorInfo());
			}
		
		}
		
		if($boletoEncontrado == 0){
			return "NO";	
		}else{
			return "SI";
		}
			
	}

}
