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

	static public function mdlBuscaFolio($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("SELECT num_boleto, concat(nombre,' ',apellido) as nombre, localidad, case when estatus = 1 then 'Pago Pendiente' when estatus = 2 then 'Pagado' end estatus FROM boletos where folio = '".$datos["numFolio"]." ' and estatus <> 0");

	
		if(!($stmt -> execute())){
			return var_dump($stmt -> errorInfo());	
		}
		
		$boletoArray = $stmt -> fetchAll(); 
		
		$boletosTodos = "";
		$totalBoletos = 0;
		$folioEncontrado = 0;
        
		foreach ($boletoArray as $key => $value) {
			$boletosTodos .= $value["num_boleto"].', ';
			$nombre = $value["nombre"];
			$localidad = $value["localidad"];
			$estatus = $value["estatus"];
			$totalBoletos++;
			$folioEncontrado = 1;
		}
		
		$totalPagar = $totalBoletos * 45;

		switch ($localidad) {
		  case 1:
			$EstadoCompleto = ucwords("aguascalientes");
			break;
		  case 2:
			$EstadoCompleto = ucwords("baja california");                                
			break;
		  case 3:
			$EstadoCompleto = ucwords("baja california sur");                                
			break; 
		  case 4:
			$EstadoCompleto = ucwords("campeche");                                
			break; 
		  case 5:
			$EstadoCompleto = ucwords("chiapas");                                
			break; 
		  case 6:
			$EstadoCompleto = ucwords("chihuahua");                                
			break; 
		  case 7:
			$EstadoCompleto = ucwords("coahuila");                                
			break; 
		  case 8:
			$EstadoCompleto = ucwords("colima");                                
			break; 
		  case 9:
			$EstadoCompleto = ucwords("ciudad de m??xico");                                
			break; 
		  case 10:
			$EstadoCompleto = ucwords("durango");                                
			break; 
		  case 11:
			$EstadoCompleto = ucwords("guanajuato");                                
			break; 
		  case 12:
			$EstadoCompleto = ucwords("guerrero");                                
			break; 
		  case 13:
			$EstadoCompleto = ucwords("hidalgo");                                
			break; 
		  case 14:
			$EstadoCompleto = ucwords("jalisco");                                
			break; 
		  case 15:
			$EstadoCompleto = ucwords("m??xico");                                
			break; 
		  case 16:
			$EstadoCompleto = ucwords("michoac??n");                                
			break; 
		  case 17:
			$EstadoCompleto = ucwords("morelos");                                
			break; 
		  case 18:
			$EstadoCompleto = ucwords("nayarit");                                
			break; 
		  case 19:
			$EstadoCompleto = ucwords("nuevo leon");                                
			break; 
		  case 20:
			$EstadoCompleto = ucwords("oaxaca");                                
			break; 
		  case 21:
			$EstadoCompleto = ucwords("puebla");                                
			break; 
		  case 22:
			$EstadoCompleto = ucwords("quer??taro");                                
			break; 
		  case 23:
			$EstadoCompleto = ucwords("quintana roo");                                
			break; 
		  case 24:
			$EstadoCompleto = ucwords("san luis potos??");                                
			break; 
		  case 25:
			$EstadoCompleto = ucwords("sinaloa");                                
			break; 
		  case 26:
			$EstadoCompleto = ucwords("sonora");                                
			break; 
		  case 27:
			$EstadoCompleto = ucwords("tabasco");                                
			break; 
		  case 28:
			$EstadoCompleto = ucwords("tamaulipas");                                
			break; 
		  case 29:
			$EstadoCompleto = ucwords("tlaxcala");                                
			break; 
		  case 30:
			$EstadoCompleto = ucwords("veracruz");                                
			break; 
		  case 31:
			$EstadoCompleto = ucwords("yucatan");                                
			break; 
		  case 32:
			$EstadoCompleto = ucwords("zacatecas");                                
			break; 
		  case 33:
			$EstadoCompleto = ucwords("extranjero");                                
			break;                             
		}
		
$respuestaArray = array(["numFolio" => $datos['numFolio'], "nombre" => $nombre, "localidad" => $EstadoCompleto, "estatus" => $estatus, "monto" => number_format($totalPagar,2), "boleto" => $boletosTodos, "exito" => $folioEncontrado]);
$myJSON = json_encode($respuestaArray);

return $myJSON;
		
	}

}
