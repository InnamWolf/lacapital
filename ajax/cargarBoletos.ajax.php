<?php

require_once "../controller/boletosFront.controlador.php";
require_once "../model/boletosFront.modelo.php";

          $item = null;
          $valor = null;
          $buscarBoletosFront = ControladorBoletosFront::ctrBuscarBoletoFront($item, $valor);
          foreach($buscarBoletosFront as $key => $value){
            echo '<div class="encerrar__boletos selectBoleto" idBoleto="'.$value["id"].'">'.$value["num_boleto"].'</div>';              
          }