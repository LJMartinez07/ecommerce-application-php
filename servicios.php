<?php 
	@session_start();
	require 'Conexion.php';
	
 ?>
<!DOCTYPE html>
<html lang="es">
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
				<h2 class="cabezera">Servicios</h2>
			</div>
				
	<div class="box-contenido">
				
    			<table width="100%">
					<tr>
    					<td><li>Reparacion de pantalla</li></td>
    					<td><li>Cambio de baterias</li></td>
  					</tr>
  					<tr>
                        <td><li>Reparacion de pantalla</li></td>
                        <td><li>Cambio de baterias</li></td>
                    </tr>
                    <tr>
                        <td><li>Reparacion de pantalla</li></td>
                        <td><li>Cambio de baterias</li></td>
                    </tr>
                    <tr>
                        <td><li>Reparacion de pantalla</li></td>
                        <td><li>Cambio de baterias</li></td>
                    </tr>
                    <tr>
                        <td><li>Reparacion de pantalla</li></td>
                        <td><li>Cambio de baterias</li></td>
                    </tr>
                    <tr>
                        <td><li>Reparacion de pantalla</li></td>
                        <td><li>Cambio de baterias</li></td>
                    </tr>
                    <tr>
                        <td><li>Reparacion de pantalla</li></td>
                        <td><li>Cambio de baterias</li></td>
                    </tr>
                    <tr>
                        <td><li>Reparacion de pantalla</li></td>
                        <td><li>Cambio de baterias</li></td>
                    </tr>
                    <tr>
                        <td><li>Reparacion de pantalla</li></td>
                        <td><li>Cambio de baterias</li></td>
                    </tr>
			    </table>
    	
    </div>
    </div>
    <br>
    <br>
    <br>
    
   
    

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