<!DOCTYPE html>
<html>
<head>
  <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
	<title></title>
</head>
<body>
 
<form>
<input type="button" value="Print this page" onClick="window.print()">
</form>
 <div id="imagen">

 </div>
</body>
</html>

<script>
 $(function(){
  $.ajax({
  	type:"get",
  	data:"id=12222",
  	url:"controller/busca_cliente_imprimir.php",
  	success:function(data){
  		$("#imagen").html(data);
  	}
  });
 });
</script>