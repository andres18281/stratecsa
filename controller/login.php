<?php


  include_once('conectar.php');
  if(!isset($_SESSION)){ 
        session_start(); 
  }
  class Login {    
      public $user;
      public $pass;
      public function __construct($user,$pass){
        $this->user = $user;
        $this->pass = $pass;
      }

      public function loguearse(){ 
        if(!isset($_SESSION["perfil"],$_SESSION["pass"])){
           $_SESSION["perfil"] = "root";
           $_SESSION["pass"] = "";
        }
        $consulta = new Conectar("root",""); 
        $tipo_usuario = $consulta->consulta_usuario($this->user,$this->pass);
        if(isset($tipo_usuario)){
          $rol = $tipo_usuario["tipo_perfil"];
          $_SESSION["id_usuario"] = $tipo_usuario[1]; // id del usuario
          $_SESSION["id_usuario_pass"] = $tipo_usuario[2]; // cuenta de perfil
          $_SESSION["pass_perfil_rol"] =  $tipo_usuario[3]; // contrase perfil
          $_SESSION["pass_perfil_pass"] = $tipo_usuario[4]; // password del rol
          $_SESSION["name_rol"]  = $tipo_usuario[0];
          return true;
        }else{
          return false;
        }
      }
  }
?>
