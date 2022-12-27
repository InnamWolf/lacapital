<?php
   
  require_once "../controller/usuarios.controlador.php";
  require_once "../model/usuarios.modelo.php";

  class AjaxUsuarios{

    //* ===============================================
    //* EDITAR USUARIOS 2
    //* ===============================================

    public $idUsuario;

    public function ajaxEditarUsuario(){

        $item = "id";
        $valor = $this->idUsuario;
        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta);

    }
  }

  //* ===============================================
  //* EDITAR USUARIOS 1
  //* ===============================================
  
  if(isset($_POST["idUsuario"])){    
    
    $editar = new AjaxUsuarios();
    $editar -> idUsuario = $_POST["idUsuario"];
    $editar -> ajaxEditarUsuario();

  }
