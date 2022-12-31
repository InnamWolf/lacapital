<?php

require_once "../controller/boletosFront.controlador.php";
require_once "../model/boletosFront.modelo.php";

$seleccionarBoletoFront = ControladorBoletosFront::ctrBoletoFrontSeleccionado();
foreach($seleccionarBoletoFront as $key => $value){
  echo '<div class="encerrar__boletos selectBoletoQuitar" idBoleto="'.$value["id"].'" name="idBoletos">'.$value["num_boleto"].'</div>';       
};
