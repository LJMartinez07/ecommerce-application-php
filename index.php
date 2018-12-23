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


	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>


	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/app.js"></script>
	<script src="js/scripts.js"></script>
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

	<div class="slideshow">
		<ul class="slider">
			<li>
				<img src="img/1.jpg" alt="">
			</li>
			<li>
				<img src="img/2.jpg" alt="">
			</li>
			<li>
				<img src="img/3.jpg" alt="">
			</li>
			<li>
				<img src="img/4.jpg" alt="">
			</li>
		</ul>

		<ol class="pagination"></ol>
		<div class="left">
			<span class="fa fa-chevron-left"></span>
		</div>
		<div class="right">
			<span class="fa fa-chevron-right"></span>
		</div>
	</div>

	
		<div class="box-main">

			<div class="box-cabezera">
				<h2 class="cabezera">Especiales</h2>
			</div>
			<div class="box-contenido">
			<?php 
				$sql="SELECT * FROM productos WHERE Agotado='No' AND Especial='On'";
				$result = $con->query($sql);
			?>
				<div class="responsive">
			<?php 
				while ($f=mysqli_fetch_array($result)) {
					$desc=$f['Precio']*$f['Descuento'];
			?>
				<div>
					
					<div class="card">
						<img class="sobre" src="./img/descuento.png" width="75" height="75" />
  						<div class="imagen"><a href="detalle-producto/456456456<?php echo $f['Id']; ?>"><img width="180" height="175" src="img/<?php echo $f['Imagen'];?>"></a></div>
  						<div class="card-body">
  							<div class="nombre"><?php echo substr($f['Nombre'], 0, 12).'...'; ?></div>
    						<div class="precio">RD$ <?php echo ($f['Precio']-$desc); ?></div>
    					</div>
    					<div class="ifc">
					<center> 	
						<a style="display: inline-block;" data-id='<?php echo $f['Id']; ?>' class="button-comprar" ><img src="img/bolsa.png" title="Comprar" alt=""></a>
						<a style="display: inline-block;"class="button" href="detalle-producto/456456456<?php echo $f['Id']; ?>"><img src="img/plus.png" title="Ver mas"  alt=""></a>
						</center>
					</div>
					</div>
					

					

					<br><br>
					

				</div>

			<?php 
				}
			 ?></div>
			</div>

			<?php 

				
				$sql="SELECT * FROM productos ORDER BY Id DESC LIMIT 31";
				$result = $con->query($sql);

			?>
			<div class="box-cabezera">
				<h2 class="cabezera">Últimos Productos</h2>
			</div>
			<div class="box-contenido">
				<div class="responsive" >
			<?php 
				while ($f=mysqli_fetch_array($result)) {
					$desc=$f['Precio']*$f['Descuento'];
			?>
				<div>
					
					<div class="card">
						
  						<div class="imagen"><a href="detalle-producto/456456456<?php echo $f['Id']; ?>"><img width="180" height="175" src="img/<?php echo $f['Imagen'];?>"></a></div>
  						<div class="card-body">
  							<div class="nombre"><?php echo substr($f['Nombre'], 0, 12).'...'; ?></div>
    						<div class="precio">RD$ <?php echo ($f['Precio']-$desc); ?></div>
    					</div>
    					<div class="ifc">
					<center> 	
						<a style="display: inline-block;" data-id='<?php echo $f['Id']; ?>' class="button-comprar" ><img src="img/bolsa.png" title="Comprar" alt=""></a>
						<a style="display: inline-block;"class="button"href="detalle-producto/456456456<?php echo $f['Id']; ?>"><img src="img/plus.png" title="Ver mas" alt="Ver mas"></a>
						</center>
					</div>
					</div>
					

					

					<br>
					

				</div>
					
			<?php 
				}
		 	?>
				</div>
			</div>
		</div>
	

	
<script type="text/javascript" src="slick/slick.min.js"></script>
  		
  		<script type="text/javascript">
 			
 			$('.responsive').slick({
  				dots: false,
  				infinite: false,
  				speed: 1000,
  				slidesToShow: 4,
 				slidesToScroll: 4,
  				responsive: [
    			{
      				breakpoint: 1024,
      				settings: {
        				slidesToShow: 2,
        				slidesToScroll: 2,
        				infinite: false,
        				dots: false
      				}
    			},
			    {
			    	breakpoint: 600,
			     	settings: {
			        	slidesToShow: 1,
			        	slidesToScroll: 1
			      	}
			    },
    			{
      				breakpoint: 480,
      				settings: {
       					slidesToShow: 1,
        				slidesToScroll: 1
      				}
    			}
    			]
			});
 		</script>

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