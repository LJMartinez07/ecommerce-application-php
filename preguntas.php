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

    <div class="box-main">
    	<div class="box-cabezera">
			<h2 class="cabezera">"Delivery"</h2>
		</div>
		<p>Al comprar en línea por nuestra web tiene la opción de utilizar delivery. El mismo está asociado a United Parcel Service (UPS) y nos regimos bajo sus políticas y tarifas de envío.</p>
		<strong>Después de generar el pago ¿En qué tiempo estará listo mi pedido?</strong>
		<p>en un plazo de 24-72 horas laborables para la entrega.</p>
		<div class="box-cabezera">
			<h2 class="cabezera">"Pasar a recoger"</h2>
		</div>
		<p>La opción “pasar a recoger” le permite comprar artículos en línea y recogerlos en una de nuestras tiendas después de la confirmación de esta manera evita gastos de envío.</p>
		<ul class="ul">
			<li>Al hacer el checkout elija la opción de “pasar a recoger” y seleccione la sucursal que prefiere retirar sus artículos. </li>
			<li>Luego nuestro webmaster le enviará un correo con la fecha estimada de recogida. </li>
			<li> Una vez el pedido esté listo recibirá un correo: “Pedido listo para entrega”. Inmediatamente puede pasar a la tienda a retirar.</li>
			<li> A la hora de retirar debe traer la orden de la compra del pedido impresa y su cédula de identidad.</li>
			<li> El pedido sólo será entregado al titular de la tarjeta.</li>
			<li> Los artículos se mantendrán en la tienda 14 días. Debe retirarlo en ese lapso de tiempo.</li>
		</ul>
		<strong>¿Quién puede recoger la orden?</strong>
		<p>Usted puede recoger su pedido o elegir a otra persona de ir otra persona a recogerlo debe especificarlo y proporcionar el nombre de la persona, e-mail y número de teléfono. Su persona de recogida tendrá que mostrar su documento de identidad en la tienda.</p>
		<strong>Otros datos importantes:</strong>
		<ul class="ul">
			<li>Los productos pueden ser más grandes de lo esperado debido a su embalaje. Por favor, tenga esto en cuenta cuando se considera algún vehículo para recoger su pedido. </li>
			<li>Disponga de tiempo extra para recoger artículos grandes como televisores y otros electrodomésticos.</li>
		</ul>
		<div class="box-cabezera">
			<h2 class="cabezera">"Devolucion"</h2>
		</div>
		<strong>Motivos que puede generar una devolución.</strong>
			<ul class="ul" style="list-style: decimal;">
				<li>Producto dañado.</li>
				<li>Producto incorrecto.</li>
				<li>Producto no cumple con la descripción en la web.</li>
			</ul>
	</div>

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