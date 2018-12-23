<?php 
	@session_start();
	require 'Conexion.php';
	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BC |</title>


	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/font-awesome.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

	<script src="js/jquery-3.3.1.min.js"></script>
	
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

    <div class="box-main">
    	<div class="box-cabezera">
			<h2 class="cabezera">¿Quiénes Somos?</h2>
		</div>
		<h4>Filosofía</h4>
		<ul class="ul">
			<li>Mantener una empresa integrada por un personal calificado, comprometido con el rol de la institución, con alto sentido ético y de responsabilidad, con vocación al desarrollo basado en el mérito, la capacidad, la responsabilidad y la iniciativa.</li>
			<li>Ser flexibles y proactivos para mantener una organización eficiente con procesos dinámicos, con el fin que nos permitan continuar brindando a nuestros clientes productos y servicios de calidad, acorde a sus necesidades y requerimientos.</li>
			<li>Capacitar y mantener actualizado a nuestro personal para estar a la par con los cambios que continuamente se presentan en el mundo de la tecnología.</li>
		</ul>
		<div class="box-cabezera">
			<h2 class="cabezera">Valores</h2>
		</div>
		<ul class="ul">
			<li>Servicio</li>
			<li>Confianza</li>
			<li>Responsabilidad</li>
			<li>Honestidad</li>
			<li>Compromiso</li>
		</ul>
		<div class="box-cabezera">
			<h2 class="cabezera">Visión</h2>
		</div>
		<p>“Ser líder en el mercado ofertando soluciones tecnológicas de la más alta calidad apoyados en nuestros valores y estándares éticos proporcionando a nuestros clientes seguridad y confiabilidad en sus decisiones".</p>
		<div class="box-cabezera">
			<h2 class="cabezera">Misión</h2>
		</div>
		<p>"Trascender y distinguirnos en el mercado nacional proveyendo soluciones tecnológicas a través de productos y servicios de la más alta calidad con el apoyo de un personal calificado, tecnología de punta y un excelente servicio al Cliente”.</p>

    </div>
    
	 		<div class="footer" id="footer">
	 			<div class="copy">
	          		**** |  Copyright 2018 <br>
	          		Powered by <a href="">Luis Martinez</a>
	        	</div>
	 		</div>
 		
</body>
</html>