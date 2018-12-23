<?php  
	@session_start();
	include "Conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="css/main.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	

	
	
	<title>**** |</title>
</head>
<body>
	
	<div class="form">
		<div class="contenedor">
			<div class="cajas">
				<div class="caja-especiales"><h2 class="encabezados">Admin</h2></div>
			</div>	
		</div>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="con">
	  		<div class="form-group">
	    		<label for="correo1">Usuario <span class="obligado">*</span></label>
	    		<input type="text" class="form-control" id="correo1" name="usuario"  placeholder="Ingrese usuario">
	  		</div>
	  		<div class="form-group">
	    		<label for="contra">Contraseña: <span class="obligado">*</span></label>
				<input type="password" id="contra" name="contra" class="form-control" >
				
	     	</div>
	  		<button type="submit" name="ini" class="btn btn-dark">Iniciar</button>
	    </form>
	</div>

	 <?php 
	    

	    	if (isset($_POST['ini']) ) {

	    		if ($_POST['usuario']!='' && $_POST['contra']!='') {
	    			$Email = $_POST['usuario'];
	    			$Pass = $_POST['contra'];
	    			

		    		$SQL1 = "SELECT * FROM admin WHERE Usuario='$Email' AND  Contra='$Pass'";
		    		
				

					$re1=mysqli_query($con, $SQL1);
				
				


					$Contar1=mysqli_num_rows($re1);
					if($Contar1 ==1){
						$_SESSION['admin']=$Email;
						echo "<script>
							alert('Inicio sesion con exito')

							location.href='admin/admin.php'

							</script>";

						
					}else{
						echo "<script>
							alert('El usuario o la contraseña no coinciden')
							
							
							</script>";
						
					}
					

				
					}
					else{
						echo "<script>
							alert('llene los campos porfavor')
							
							</script>";
					}
					
				
	    		}
	    			
	    		

	    	

	     ?>
	
</body>
</html>