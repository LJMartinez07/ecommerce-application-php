<?php 
	@session_start();
	require 'Conexion.php';

	
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>BC |</title>


	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/font-awesome.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


	<link rel="stylesheet" type="text/css" href="../slick/slick.css"/>
	
	<link rel="stylesheet" type="text/css" href="../slick/slick-theme.css"/>


	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/scripts.js"></script>
	

	
</head>
<body>
	<header>
		<div class="header-main">
		<?php
			if (empty($_SESSION['sesion'])) {
		?>
			<div class="bienvenida">
				<strong>Bienvenido</strong>, <a href="../login.php" title="Iniciar sesión">Iniciar sesión</a> o <a href="../login.php" title="Regístrate">Regístrate</a> para empezar a comprar.
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
		        location.href='../index.php'
		    </script>;
		<?php 
				unset( $_SESSION["sesion"] );
            }
            if (isset($_POST['ir'])) {
        ?>
            <script>
		        location.href='../vercompras.php'
		    </script>;
		<?php
            	}	
        ?>
		</div>
		<div class="header">
			<div class="logo">	
				<img src="../img/descarga.png" height="150" alt="">
			</div>
			 <div class="link">
	        	<a href="../historia.php">¿Quienes Somos?</a>
		        <a href="../servicios.php">Servicios</a>
		        <a href="../preguntas.php">Preguntas Frecuentes</a>
		        <a href="../contacto.php">Contactos</a>	
	        </div>
	       	<div class="redes">

	       		<a target="_blank" href="#"><img src="../img/facebook-ico.png"></a>
                <a target="_blank" href="#"><img src="../img/twitter-ico.png"></a>
                <a target="_blank" href="#"><img src="../img/instagram-ico.png"></a>

	       	</div>		
		</div>
		<nav>
            <div class="menu-icon">
                <i class="fa fa-bars fa-2x"></i>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../apple.php">Apple</a></li>
                    <li><a href="../samsung.php">Samsung</a></li>
                    <li><a href="../accesorios.php">Accesorios</a></li>
                    <li><a href="../especiales.php">Especiales</a></li>
                    <li><a href="../otros.php">Otros</a></li>
                    <li><a href="../compras.php" title="Compras"><img src="../img/bolsa2.png" alt=""></a></li>
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
    	

    <div class="box-main-detalle">
    	<?php 
    		$sql="SELECT * FROM productos WHERE Id =".$_GET['id'];

			$result = $con->query($sql);

			$sql2="SELECT * FROM imagenes WHERE Id_producto =".$_GET['id'];

    		
			$result2 = $con->query($sql2);
			$f=mysqli_fetch_array($result);
			$a=mysqli_fetch_array($result2);
			$desc=$f['Precio']*$f['Descuento'];
    	?>
    	<div class="row">
    	 	<div class="col-sm-3"  >
		    	<div class="imgPro">
		    		<img id="ja" src="../img/<?php echo $f['Imagen']; ?>" alt="">
		    		
		    	</div>
		    	<div class="responsive-detalle" >
		    		<div>
		    		<div class="carta-detalle">
  						<div><a class="subs" data-img="../img/<?php echo $f['Imagen'];?>" ><img  width="52" height="52" src="../img/<?php echo $f['Imagen'];?>"></a></div>
  					</div>
  					</div>
  					<div>
  						<div class="carta-detalle">
  						<div><a class="subs" data-img="../img/<?php echo $a['Nombre']; ?>" ><img  width="52" height="52" src="../img/<?php echo $a['Nombre']; ?>"></a></div>
  					</div>
  					</div>
  					
  					

		    	</div>
    	  	</div>

    		<div class="col-sm detalles" >
    			<div class="row" style="border-bottom: 1px dotted #ccc">
	    			<div  style="margin-bottom: 10px" class="col-sm">

	    				<?php 

	    					if ($f['Descuento']==0) {
	    						# code...
	    					


	    				 ?>
	    				 <h6 class="nombre" style="text-align: left;font-size: 16px; color: #00007d; ">Precio regular: <span class="precio-regular" style="font-size: 16px; color: #00007d;">RD$<?php echo $f['Precio']; ?></span> </h6>

	    				 <?php


	    				 }else{

	    				  ?>
	    				<h6 class="nombre" style="text-align: left;font-size: 16px; color: #00007d; ">Precio regular: <span class="precio-regular" style="font-size: 16px; color: #00007d;text-decoration: line-through;">RD$<?php echo $f['Precio']; ?></span> </h6>
	    				<h6 style="text-align: left;font-size: 16px;" class="nombre">Precio con Descuento:</h6>
	    				<span class="precio">RD$<?php echo ($f['Precio']-$desc); ?></span><br>
	    				<span  class="precio" style="text-align: left;font-size: 13px;"><?php echo ($f['Descuento']*100);?>% de descuento aplicado.</span>
	    				<?php 
	    			}
	    				 ?>
	    			</div>

	    			<div class="col-sm">
	    				<a style="float: right; margin: 10px auto; color: white;" data-id="<?php echo $f['Id']; ?>" class="btn btn-dark comp-det">Comprar</a>
							
							
						
	    			</div>
    			</div>
    			<div class="row">
    				<div class="col-sm-4">
    					<h6 class="nombre" style="text-align: left;"><?php  echo $f['Nombre']; ?></h6>
    				</div>
    				<div class="col-sm" style="border-left: 1px dotted #ccc ">
    					<div class="box-cabezera-detalles">
							<h2 class="cabezera">Descripción</h2>
						</div>
				<?php
					echo "<p class='descripcion'>".(nl2br($f['Descripcion']))."</p>";
				?>
    					
    				</div>


    			</div>
	    	 	
	    		
				
		    	
			</div>
		</div>
	</div>

    	
    	<script type="text/javascript" src="../slick/slick.min.js"></script>
  		
  		<script type="text/javascript">
 			
 			$('.responsive-detalle').slick({
  				dots: false,
  				infinite: false,
  				speed: 1000,
  				slidesToShow: 4,
 				slidesToScroll: 1,
  				responsive: [
    			{
      				breakpoint: 1024,
      				settings: {
        				slidesToShow: 2,
        				slidesToScroll: 2,
        				infinite: true,
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