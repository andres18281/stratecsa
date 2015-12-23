

<?php

  
   if(!isset($_SESSION)){ 
     session_start(); 
   }
   if(!isset($_SESSION['pass_perfil_rol'])){
     header("location: ../login.php");
   }
 
  include_once('conectar.php');
  $conectar = new Conectar('root','');
  if(isset($_POST['id'])){ 
   $id = $_POST['id'];
   $sql = 'SELECT Client_id,Client_nomb,Client_apelli,  Client_tel, Client_direccion,Client_Cargo,Client_email 
         FROM clientes 
         WHERE Client_id = '.$id;
   $data = $conectar->consultas($sql);
   if(isset($data)){ 
    $im = imagecreate(2550,3300);
    $fondo = imagecolorallocate($im, 255, 255, 255);
    // Fondo blanco y texto azul
    $color_texto = imagecolorallocate($im, 0, 0, 255);
    // Escribir la cadena en la parte superior izquierda
    imagestring($im, 5,206 , 633, $data[1]." ".$data[2], $color_texto);
    imagestring($im, 5, 414,770, $data[0], $color_texto);
    // Imprimir la imagen
    header('Content-type: image/png');
    ob_start();
    imagepng($im,null);
    $imagedata = ob_get_contents();
    ob_end_clean();
    print '<p><img src="data:image/png;base64,'.base64_encode($imagedata).'" /></p>'; 
   }else{
    echo "El documento solicitado no existe";
   }
  }

 ?> 