<?php
 include_once('conectar.php');
  $conectar = new Conectar('root','');
  if(isset($_POST['id'])){
   $id = $_POST['id'];
   $sql = 'SELECT Client_id,Client_nomb,Client_apelli,	Client_tel,	Client_direccion,Client_Cargo,Client_email 
   		   FROM clientes 
   		   WHERE Client_id = '.$id;
   $data = $conectar->consultas($sql);
   if(isset($data)){

   	$im = imagecreatefrompng("../imagen/plantilla.png");
 	$textcolor = imagecolorallocate($im, 0, 0, 0);
 	imagestring($im,5,120,220,$data[1]." ".$data[2],$textcolor);
 	imagestring($im,5,200,280,$data[0],$textcolor);
 	header ('Content-Type: image/png');
 	ob_start();
 	imagepng($im,null);
 	$imagedata = ob_get_contents();
 	ob_end_clean();
 	print '<p><img src="data:image/png;base64,'.base64_encode($imagedata).'" /></p>';
   }
  }


?>