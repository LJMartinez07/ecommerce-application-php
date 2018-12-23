<?php 
	@session_start();
	require 'Conexion.php';
	
	
	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="img/descarga.ico">

	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	
	<!--stick-->
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>

	
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/app.js"></script>
	
	<title>BC |</title>
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
			<h2 class="cabezera">Iniciar sesión</h2>
		</div>
		<div class="box-contenido">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="con">
	  			<div class="form-group">
	    			<label for="correo">Email: <span class="obligado">*</span></label>
	    			<input type="email" class="form-control" id="correo1" name="correo"  placeholder="Ingrese correo" required>
	  			</div>
	  			<div class="form-group">
	    			<label for="contra">Contraseña: <span class="obligado">*</span></label>
					<input type="password" id="contra1" name="contra" class="form-control" required >
				</div>

	  			<button type="submit" name="ini" class="btn btn-dark">Iniciar</button>
	    	</form>
	    </div>
	</div>

	    <?php 
	    

	    	if (isset($_POST['ini']) ) {

	    		if ($_POST['correo']!='' && $_POST['contra']!='') {
	    			$Email = $_POST['correo'];
	    			$Email1 = strtoupper($Email);
	    			$Pass = $_POST['contra'];
	    			$Encript = sha1($Pass);

		    		$SQL1 = "SELECT * FROM usuario WHERE Email='$Email1' AND  Contra='$Encript'";
		    		
				

					$re1=mysqli_query($con, $SQL1);
				
				


					$Contar1=mysqli_num_rows($re1);

						if($Contar1 ==1){
						$_SESSION['sesion']=$Email;
						echo "<script>
							alert('Inicio sesion con exito')

							location.href='index.php'

							</script>";

						
					}else{
						echo "<script>
							alert('El email o la contraseña no coinciden')
							
							
							</script>";
						
					}
					

				
					}


					

				
	    			
	    		}

	     ?>

<script>
	function validar() {

		var cedula = document.getElementById('cedula').value;
		

		if (cedula.length > 11 || cedula.length < 11 ) {
			alert('La cedula tiene que solo tener 11 caracteres');
		}else if(!/^([0-9])*$/.test(cedula)){
			alert('La cedula no puede tener candenas de textos');
		}
		
	}
</script>


	    <div class="box-main">
			<div class="box-cabezera">
				<h2 class="cabezera">Registrar</h2>
			</div>
			<div class="box-contenido">
	   			<form  method="POST" action=""  class="con">
		  			<div class="form-row">
			    		<div class="col-md-4 mb-3">
			      			<label for="nombre">Nombre</label>
			      			<input type="text" class="form-control" id="nombre" name="Nom" placeholder="Nombre" required>
			    		</div>
			    		<div class="col-md-4 mb-3">
			      			<label for="apellido">Apellido</label>
			      			<input type="text" class="form-control" id="apellido" name="Ape" placeholder="Apellido" required>
			    		</div>
			    		<div class="col-md-4 mb-3">
			      			<label for="cedula">Cedula</label>
			      			<div class="input-group">
			        			<input type="text" class="form-control" id="cedula" name="Ced" placeholder="Cedula" aria-describedby="inputGroupPrepend2" required >
			      			</div>
			      		</div>
		 			</div>
		    		<div class="form-row">
		    			<div class="col-md-6 mb-3">
		      				<label for="ciudad">Ciudad</label>
		      				<select id="ciudad" name="Ciu" class="custom-select" required>
		  						<option selected></option>
		  						<option value="Bani">Bani</option>
								<option value="Bavaro-La Altagracia">Bavaro-La Altagracia</option>
								<option value="Bonao">Bonao</option>
								<option value="Distrito Nacional">Distrito Nacional</option>
								<option value="Higuey">Higuey</option>
								<option value="La Romana">La Romana</option>
								<option value="La Vega">La Vega</option>
								<option value="Mao">Mao</option>
								<option value="Moca">Moca</option>
								<option value="Monte Llano">Monte Llano</option>
								<option value="Puerto Plata">Puerto Plata</option>
								<option value="Rio San Juan">Rio San Juan</option>
								<option value="Samana">Samaná</option>
								<option value="San Cristobal">San Cristobal</option>
								<option value="San Francisco de Macoris">San Francisco de Macorís</option>
								<option value="San Pedro De Macoris">San Pedro De Macoris</option>
								<option value="Sanchez Ramirez">Sanchéz Ramírez</option>
								<option value="Santiago">Santiago</option>
								<option value="Santo Domingo">Santo Domingo</option>
								<option value="Sosua">Sosua</option>
							</select>
		    			</div>
		    		</div>
		    		<div class="form-group">
	    				<label for="correo">Email: <span class="obligado">*</span></label>
	 	   				<input type="email" class="form-control" id="correo" name="Ema"  placeholder="Ingrese correo" required>
	  				</div>
	  				<div class="form-group">
	    				<label for="contra">Contraseña: <span class="obligado">*</span></label>
						<input type="password" id="contra" name="Con" class="form-control" required >
					</div>	
					

		  			<button style="margin-top: 10px;" class="btn btn-dark" onclick="validar()" name="sub" type="submit">Registrar</button>
				</form>
			</div>
		</div>

		<?php

	
	
	if (isset($_POST['sub'])) {
		$Nombre= $_POST['Nom'];
		$Apellido= $_POST['Ape'];
		$Cedula= $_POST['Ced'];
		$Ciudad= $_POST['Ciu'];
		$Email= $_POST['Ema'];
		$Email1= strtoupper($Email);
		$Contra=$_POST['Con'];
		$Encript=sha1($Contra);

	$SQL1 = "SELECT * FROM usuario WHERE Email='$Email1'";
	$SQL2 = "SELECT * FROM usuario WHERE Cedula='$Cedula'";
		

		$re1=mysqli_query($con, $SQL1);
		$re2=mysqli_query($con, $SQL2);
		


		
		
		$Contar1=mysqli_num_rows($re1);
		$Contar2=mysqli_num_rows($re2);

		
        
		if ($Contar1>0) {

		?> 
			<script>
				alert('Correo ya registrado')
			</script>
		<?php  
		}elseif ($Contar2>0) {
		
		?>
			<script>
				alert('Cedula ya registrado')
			</script>
		<?php 
		}else{
		    
		    $year =date('Y');
$month = date('m');
$day =date('d');
$fecha=$year."-".$month."-".$day;
			
			$SQL="INSERT INTO usuario(Nombre, Apellido, Cedula, Ciudad, Email, Contra, FechaReg) VALUES('$Nombre', '$Apellido', '$Cedula', '$Ciudad', '$Email1', '$Encript', '$fecha')";
			$Resultado=mysqli_query($con, $SQL);
			if ($Resultado) {
				$_SESSION['sesion']=$Email;


				echo "<script>alert('Registrado con exito')

				location.href ='index.php'

				</script>";

				
			}else{
				echo "No se pudo registrar";
			}
		}
	}
?>
		<br>
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