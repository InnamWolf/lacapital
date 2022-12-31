<?php

require_once "../controller/boletosFront.controlador.php";
require_once "../model/boletosFront.modelo.php";

$tabla = "boletos";
$datos["numBoleto"] = $_GET["numBoleto"];
$respuestaBuscaBoleto = ModeloBoletosFront::mdlBuscaBoleto($tabla, $datos);

echo $respuestaBuscaBoleto;