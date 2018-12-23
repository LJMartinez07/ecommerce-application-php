<?php

@session_start();
	include "../Conexion.php";
	if(! isset($_SESSION['admin'])){
        ?><SCRIPT>   location.href = "../back.php";   </SCRIPT><?php
        die();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Panel de Administración</title>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<!-- Versión compilada y comprimida del CSS de Bootstrap -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
 

	
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/app.js"></script>
</head>
<body>
	<header>

	<nav>
            <div class="menu-icon">
                <i class="fa fa-bars fa-2x"></i>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="admin.php">Inicio</a></li>
                    <li><a href="agregarproducto.php">Agregar producto</a></li>
                    <li><a href="productos.php">Productos</a></li>
                    <li><a href="total.php">Total de ventas</a></li>
                    
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

	   <div class="panel panel-default">
        	<div class="panel-heading"><center><h2>Agregar un Nuevo Producto</h2></center></div>
  				
		</div>
		<div class="table-responsive">
	<table class="table">	
		<tr>

			<th>Correo</th>
			<th>Nombre</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th>Subtotal</th>
			<th>Entregado</th>
			<th>Accion</th>
		</tr>
		

		<?php
			$sql="select * from compras where Entrega='No'";
			 $re=mysqli_query($con, $sql);
			$numeroventa=0;
			while ($f=mysqli_fetch_array($re)) {
					if($numeroventa	!=$f['NumeroVenta']){
						echo '<tr><td>Compra Número: '.$f['NumeroVenta'].' </td>

						 <td>&nbsp;</td>
                        <td>&nbsp;</td>
                         <td>&nbsp;</td>
                        <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td row=5><form action="" method="POST">
						<input type="hidden" name="venta" value="'.  $f["NumeroVenta"] .'">
						<input type="submit" value="Entregar" class="btn btn-dark">
						</form></td>

						
						</tr>';
					}
					$numeroventa=$f['NumeroVenta'];
					echo '<tr>
						<td>'.$f['Email'].'</td>
						<td>'.$f['Nombre'].'</td>
						<td>'.$f['Precio'].'</td>
						<td>'.$f['Cantidad'].'</td>
						<td>'.$f['SubTotal'].'</td>
						<td>'.$f['Entrega'].'</td>
						

					</tr>';

					
			}
		?>
		
	</table>
</div>

	<?php 

	if (isset($_POST['venta'])) {
		$sql = "UPDATE compras SET Entrega = 'Si' WHERE NumeroVenta =".$_POST['venta'];
		$result = $con->query($sql);

		if ($result) {
			 echo "<script>alert('Compra entregada con exito')
                             location.href='admin.php'
                            </script>";
		}else{
			echo "erro";
			echo $_POST['id'];
		}
	}

	

	 ?>
	
</body>
</html>