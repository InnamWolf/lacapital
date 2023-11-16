<?php

require_once "../controller/boletosFront.controlador.php";
require_once "../model/boletosFront.modelo.php";



$datos["idBoleto"] = $_GET["idBoleto"];
$datos["numBoleto"] = $_GET["numBoleto"];
$tabla = "boletos";
$respuesta = ModeloBoletosFront::mdlBoletoFrontSeleccionadoPrueba($tabla, $datos);

echo $respuesta;