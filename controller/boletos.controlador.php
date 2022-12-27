<?php

class ControladorBoletos{

  //* ===============================================
  //* MOSTRAR boletos
  //* ===============================================

  static public function ctrMostrarBoletos(){

    $tabla = "boletos";
    $respuesta = ModeloBoletos::mdlMostrarBoletos($tabla);

    return $respuesta;

  }
  
}