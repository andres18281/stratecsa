<?php

 $im = imagecreatefrompng("plantilla.png");
 $textcolor = imagecolorallocate($im, 0, 0, 255);
 imagestring($im,5,200,300,"hoddddddddddla",$textcolor);
 header ('Content-Type: image/png');
 ob_start();
 imagepng($im,null);
 $imagedata = ob_get_contents();
 // Clear the output buffer
 ob_end_clean();
 print '<p><img src="data:image/png;base64,'.base64_encode($imagedata).'" /></p>';
 //imagedestroy($im);
 //echo "loco";
// file_put_contents('/my/folder/flower.jpg', $content);

?>