<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <title></title>
  <?php
  /*
   if(!isset($_SESSION)){ 
     session_start(); 
   }
   if(!isset($_SESSION['pass_perfil_rol'])){
   	 header("location: login.php");
   }
   */
  ?>
  <style type="text/css">

/* Space out content a bit */
body {
  padding-top: 20px;
  padding-bottom: 20px;
}

/* Everything but the jumbotron gets side spacing for mobile first views */
.header,
.marketing,
.footer {
  padding-right: 15px;
  padding-left: 15px;
}

/* Custom page header */
.header {
  border-bottom: 1px solid #e5e5e5;
}
/* Make the masthead heading the same height as the navigation */
.header h3 {
  padding-bottom: 19px;
  margin-top: 0;
  margin-bottom: 0;
  line-height: 40px;
}

/* Custom page footer */
.footer {
  padding-top: 19px;
  color: #777;
  border-top: 1px solid #e5e5e5;
}

/* Customize container */
@media (min-width: 768px) {
  .container {
    max-width: 730px;
  }
}
.container-narrow > hr {
  margin: 30px 0;
}

/* Main marketing message and sign up button */
.jumbotron {
  text-align: center;
  border-bottom: 1px solid #e5e5e5;
}
.jumbotron .btn {
  padding: 14px 24px;
  font-size: 21px;
}

/* Supporting marketing content */
.marketing {
  margin: 40px 0;
}
.marketing p + h4 {
  margin-top: 28px;
}

/* Responsive: Portrait tablets and up */
@media screen and (min-width: 768px) {
  /* Remove the padding we set earlier */
  .header,
  .marketing,
  .footer {
    padding-right: 0;
    padding-left: 0;
  }
  /* Space out the masthead */
  .header {
    margin-bottom: 30px;
  }
  /* Remove the bottom border on the jumbotron for visual effect */
  .jumbotron {
    border-bottom: 0;
  }
}



  </style>
</head>
<body>
 <div class="container">
    <h1 class="well">Registrar Datos</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-12 form-group">
								<label>Cedula</label>
								<input type="text" placeholder="Digite la cedula" id="cedula" class="form-control">
							</div>
							<div class="col-sm-6 form-group">
								<label>Nombre</label>
								<input type="text" placeholder="Digite el nombre" id="nombre" class="form-control">
							</div>
							<div class="col-sm-6 form-group">
								<label>Apellido</label>
								<input type="text" placeholder="Digite los apellidos" id="apellido" class="form-control">
							</div>
						</div>					
						<div class="form-group">
							<label>Direccion</label>
							<input type="text" placeholder="Direccion Aqui" id="direct" class="form-control">
						</div>	
						
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Telefono</label>
								<input type="text" placeholder="Telefono" id="telefo" class="form-control">
							</div>		
							<div class="col-sm-6 form-group" >
								<label>Cargo</label>
								<select id="cargo" class="form-control">
								 <option value="1" >Cliente</option>
								 <option value="2">Personal</option>
								</select>
							</div>	
						</div>						
					<div class="form-group">
						<label>Correo</label>
						<input type="text" placeholder="Correo Aqui" id="email" class="form-control">
					</div>		
					<button type="button" id="btn_enviar" class="btn btn-lg btn-info">Guardar</button>					
					</div>
				</form> 
				</div>
	</div>
	</div>
</body>
</html>
<script>
 $(function(){
  $("#btn_enviar").click(function(){
   var ce = $("#cedula").val();
   var nomb = $("#nombre").val();
   var apelli = $("#apellido").val();
   var dire = $("#direct").val();
   var tele = $("#telefo").val();
   var cargo = $("#cargo").val();
   var email = $("#email").val();
   if(ce.length > 0 && nomb.length > 0 && apelli.length > 0 && dire.length > 0 && tele > 0  && email.length > 0){
   	 $.ajax({
   	 	datetype:"html",
   	 	type:"post",
   	 	url:"controller/register_user.php",
   	 	data:{"cedula":ce,"nombre":nomb,"apellido":apelli,"direct":dire,"telefo":tele,"cargo":cargo,"email":email},
   	 	success:function(data){
   	 	 var data = JSON.parse(data);
   	 	 var msn = data.exito;
   	 	 if(msn.length > 0){
   	 	 	alert(msn);
   	 	 	$("#cedula").val("");
   			$("#nombre").val("");
   			$("#apellido").val("");
   			$("#direct").val("");
   			$("#telefo").val("");
   			$("#cargo").val("");
   			$("#email").val("");
   	 	 }else{
   	 	 	alert("hubo un problema, por favor verifique los datos digitados");
   	 	 }
   	 	}
   	 });
   }else{
   	alert("falta digitar datos");
   }
  });
 });
 	
</script>
 