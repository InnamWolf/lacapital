<?php

require_once "../controller/boletosFront.controlador.php";
require_once "../model/boletosFront.modelo.php";

$tabla = "boletos";
$datos["cantidadBoleto"] = $_POST["cantidadBoleto"];
$aleatorioBoletoFront = ModeloBoletosFront::mdlBoletoFrontAleatorio($tabla, $datos);

var_dump($aleatorioBoletoFront);