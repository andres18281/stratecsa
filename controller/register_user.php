<?php

  
   if(!isset($_SESSION)){ 
     session_start(); 
   }
   if(!isset($_SESSION['pass_perfil_rol'])){
   	 header("location: ../login.php");
   }
 include_once('conectar.php');
  $conection = new Conectar('root','');
 if(isset($_POST['cedula'],$_POST['nombre'],$_POST['apellido'],$_POST['direct'],$_POST['telefo'],$_POST['cargo'],$_POST['email'])){
  $id = $_POST['cedula'];
  $nombre = $_POST['nombre'];
  $apellid = $_POST['apellido'];
  $direc = $_POST['direct'];
  $tele = $_POST['telefo'];
  $carg = $_POST['cargo'];
  $email = $_POST['email'];
  $array = array('Client_id'=>$id,
  				'Client_nomb'=> $nombre,
  				'Client_apelli'=>$apellid,
  				'Client_direccion'=>$direc,
  				'Client_tel'=>$tele,
  				'Client_Cargo'=>$carg,
  				'Client_email'=>$email);
  $data = $conection->inserta('clientes',$array);
  if(isset($data['exito'])){
    echo json_encode($array);
  }
 }




?>