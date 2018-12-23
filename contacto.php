<?php 
	@session_start();
	require 'Conexion.php';
	
	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BC |</title>
<script src='https://www.google.com/recaptcha/api.js'></script>

	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/font-awesome.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>


	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/app.js"></script>
</head>
<body>
	<header>
		<div class="header-main">
		<?php
			if (empty($_SESSION['sesion'])) {
		?>
			<div class="bienvenida">
				<strong>Bienvenido</strong>, <a href="login.php" title="Iniciar sesión">Iniciar sesión</a> o <a href="login.php" title="Regístrate">Regístrate</a> para empezar a comprar.
			</div>
		<?php  
			}else{ 
		?>		
			<div class="bienvenida">
				<strong>Bienvenido, </strong><?php echo $_SESSION['sesion'] ; ?>
				<div class="cart">
				<form action="" method="POST">
					<button name='ir' class='btn btn-secondary'>Ver pedidos</button>
                	<button  type='submit' class='btn btn-secondary' name='cerr'>Cerrar sesion</button>
                </form>
				</div>

			</div>	
        <?php         
			}
			if (isset($_POST['cerr'])) {
		?>
		    <script>alert('Cerrando session')
		        location.href='index.php'
		    </script>;
		<?php 
				unset( $_SESSION["sesion"] );
            }
            if (isset($_POST['ir'])) {
        ?>
            <script>
		        location.href='vercompras.php'
		    </script>;
		<?php
            	}	
        ?>
		</div>
		<div class="header">
			<div class="logo">	
				<img src="img/descarga.png" height="150" alt="">
			</div>
			 <div class="link">
	        	<a href="historia.php">¿Quienes Somos?</a>
		        <a href="servicios.php">Servicios</a>
		        <a href="preguntas.php">Preguntas Frecuentes</a>
		        <a href="contacto.php">Contactos</a>	
	        </div>
	       	<div class="redes">

	       		<a target="_blank" href="#"><img src="./img/facebook-ico.png"></a>
                <a target="_blank" href="#"><img src="./img/twitter-ico.png"></a>
                <a target="_blank" href="#"><img src="./img/instagram-ico.png"></a>

	       	</div>		
		</div>
		<nav>
            <div class="menu-icon">
                <i class="fa fa-bars fa-2x"></i>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="apple.php">Apple</a></li>
                    <li><a href="samsung.php">Samsung</a></li>
                    <li><a href="accesorios.php">Accesorios</a></li>
                    <li><a href="especiales.php">Especiales</a></li>
                    <li><a href="otros.php">Otros</a></li>
                    <li><a href="compras.php" title="Compras"><img src="img/bolsa2.png" alt=""></a></li>
                </ul>
            </div>
        </nav>
	</header>
	<!--Menu-toggle button-->
    <script type="text/javascript">
        $(document).ready(function() {
    		$(".menu-icon").on("click", function() {
        		$("nav ul").toggleClass("showing");
    		});
    	});
    </script>
    
	<div class="container">
		<div class="box-cabezera">
			<h2 class="cabezera">Contacto</h2>
		</div>
		  <div class="row">
		    <div class="col-sm">
		      <h4>Estaremos en contacto</h4>
			  <p>Para nosotros es un placer atenderte. Por eso, te ofrecemos diferentes medios para responder a cada una de tus solicitudes de la manera que más te convenga.</p>

			  <form action="" method="POST">
			  	<div class="form-group">
    				<label for="nombre">Nombre <span class="obligado">*</span></label>
    				<input type="text" class="form-control" id="nombre" name="nom"  placeholder="Intruduzca su nombre" required>
    			</div>
    			<div class="form-group">
    				<label for="email">Email <span class="obligado">*</span></label>
    				<input class="form-control" type="email" id="email" name="corr" placeholder="Introduzca su email" required>
    			</div>
    			<div class="form-group">
    				<label for="tel">Telefono <span class="obligado">*</span></label>
    				<input type="text" class="form-control" id="nombre" name="tel" placeholder="Introduzca su telefono de contacto"required>
    			</div>
    			<div class="form-group">
    				<label for="as">Mensaje <span class="obligado">*</span></label>
    				<textarea class="form-control" id="as" rows="3" name="men" placeholder="Introduzca su mensaje aqui..." required></textarea>
 				</div>
 				
			  	 <button class="btn btn-primary" name="en" type="submit">Submit form</button>
			  </form>

		    </div>
		    <div class="col-sm">
		      <h4>Cómo encontrarnos</h4>
		      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3761.983347113981!2d-70.70549288509295!3d19.456284786870842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eb1cf586b022c6d%3A0x329c9dcc91243c09!2sBraulio+Celular!5e0!3m2!1ses-419!2sdo!4v1526675482036" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		    </div>
		    
		    </div>
  </div>
</div>
<?php


	if(isset($_POST['en'])){
	
		
$Destino="Luis.Jorge.Martinez28@gmail.com";

$Nombre=$_POST["nom"];
$Correo=$_POST["corr"];
$Telefono=$_POST["tel"];
$Mensaje=$_POST["men"];

$Contenido = "Nombre: ". $Nombre . "\nCorreo: ". $Correo ."\nTelefono: ". $Telefono ."\nMensaje: ". $Mensaje;

mail($Destino, "Contacto", $Contenido);

?>

<script>



alert('Gracias por tu aporte,Nos pondremos en contacto inmediatamente', window.location.href='index.php');




</script>
<?php 
}
		
	

 ?>





<footer>
	 		<div class="footer" id="footer">
	 			<div class="copy">
	          		**** |  Copyright 2018 <br>
	          		Powered by <a href="">Luis Martinez</a>
	        	</div>
	 		</div>
 		</footer>
 </body>
 </html>