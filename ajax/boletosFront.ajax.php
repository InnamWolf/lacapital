<?php

   require_once "../controller/boletosFront.controlador.php";
  require_once "../model/boletosFront.modelo.php";

  class AjaxBoletosFront{

   //* ===============================================
   //* APARTAR USUARIOS 2
   //* ===============================================

   public $idBoleto;

   public function ajaxApartarBoleto(){

       $item = "id";
       $tabla = "boletos";
       $valor = $this->idBoleto;

       $respuesta = ModeloBoletosFront::mdlApartarBoletoFront($tabla, $item, $valor);

       echo json_encode($respuesta);

   }
 }

 //* ===============================================
 //* APARTAR BOLETO 1
 //* ===============================================
 
 if(isset($_POST["idBoleto"])){

   $apartar = new AjaxBoletosFront();
   $apartar -> idBoleto = $_POST["idBoleto"];
   $apartar -> ajaxApartarBoleto();

 }