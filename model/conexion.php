<?php

class Conexion{

   static public function conectar(){

   //* ===============================================
   //* Local
   //* ===============================================   
   
     $link = new PDO("mysql:host=localhost;dbname=capital",
                    "root",
                    ""); 

   //* ===============================================
   //* Servidor
   //* ===============================================
/* 
    $link = new PDO("mysql:host=localhost;dbname=ignilyti_capital",
			            "ignilyti_saga",
			            "#SistemaSaga2021"); 
     */
    
    $link->exec("set names utf8");

    return $link;

   }
}