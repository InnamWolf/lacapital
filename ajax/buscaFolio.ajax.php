<?php

require_once "../controller/boletosFront.controlador.php";
require_once "../model/boletosFront.modelo.php";


    $tabla = "boletos";
    $datos["numFolio"] = $_GET["numFolio"];
    $respuestaBuscaFolio = ModeloBoletosFront::mdlBuscaFolio($tabla, $datos);  


echo $respuestaBuscaFolio;