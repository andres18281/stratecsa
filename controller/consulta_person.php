<?php
  
   if(!isset($_SESSION)){ 
     session_start(); 
   }
   if(!isset($_SESSION['pass_perfil_rol'])){
   	 header("location: ../login.php");
   }
  if(isset($_GET['id'])){
  	$id = $_GET['id'];
  }
?>

<html>
<head>
  <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
	<title></title>
</head>
<body>
<form>
<input type="button" value="Click para imprimir" onClick="window.print()">
</form>
 <div id="imagen"></div>
</body>
</html>
<script>
 var id = "<?php echo $id; ?>" ;

 $(function(){
  $.ajax({
  	type:"post",
  	data:{"id":+id},
  	url:"busca_cliente_imprimir.php",
  	success:function(data){
 
  		$("#imagen").html(data);
  	}
  });
 });
</script>