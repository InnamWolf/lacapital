<?php

require_once "../controller/boletosFront.controlador.php";
require_once "../model/boletosFront.modelo.php";

$tabla = "boletos";
$aleatorioBoletoFront = ModeloBoletosFront::mdlBoletoFrontOportunidad($tabla);

echo $aleatorioBoletoFront;