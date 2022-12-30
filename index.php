<?php

require_once "controller/template.controller.php";
require_once "controller/usuarios.controlador.php";
require_once "controller/boletos.controlador.php";
require_once "controller/boletosFront.controlador.php";

require_once "model/usuarios.modelo.php";
require_once "model/boletos.modelo.php";
require_once "model/boletosFront.modelo.php";

$template = new ControllerTemplate();
$template -> ctrTemplate();


