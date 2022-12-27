<?php

class ControladorBoletos{

  //* ===============================================
  //* MOSTRAR BOLETOS
  //* ===============================================

  static public function ctrMostrarBoletos(){

    $tabla = "boletos";
    $respuesta = ModeloBoletos::mdlMostrarBoletos($tabla);

    return $respuesta;

  }

  
}