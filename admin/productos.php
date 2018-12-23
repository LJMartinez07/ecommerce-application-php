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

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">




	<script src="../js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script type="text/javascript" src="./modificar.js"></script>
	<script src="../js/app.js"></script>
<!-- Versión compilada y comprimida del CSS de Bootstrap -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">	
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
       	<div class="panel-heading"><center><h2>Modificar</h2></center></div>
    </div>
	<div class="table-responsive">
  		<table class="table table-hover ">
  			<tr>
				<th>Id</th>
				<th>Producto</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Precio</th>
				<th>Agotado</th>
				<th>Especial</th>
				<th>Descuento %</th>
				<th>Eliminar</th>
				<th>Modificar</th>
			</tr>
		<?php 
			$sql = "select * from productos";
			$re=mysqli_query($con, $sql);
			while($row=mysqli_fetch_array($re)){
				echo '
				<tr>
					<td>
						<input type="hidden" value="'.$row[0].'">'.$row[0].'
						<input type="hidden" class="imagen" value="'.$row[3].'">
						
					</td>
					<td><img src="../img/'.$row[3].'"  width="75" height="75" alt=""></td>
					<td><input type="text" class="form-control nombre-producto" value="'.$row[1].'" required></td>
					<td><textarea class="form-control descripcion-producto" cols="50" rows="7" id="comment">'.$row[2].'</textarea></td>
					<td><input type="text" class="form-control precio-producto" value="'.$row[4].'" required></td>
					<td><input type="text" class="form-control estado-producto" value="'.$row[7].'" required></td>
					<td><input type="text" class="form-control especial-producto" value="'.$row[8].'" required></td>
					<td><input type="text" class="form-control descuento-producto" value="'.($row[9]*100).'" required></td>
					<td><button class="btn btn-dark eliminar" data-id="'.$row[0].'">Eliminar</button></td>
					<td><button class="btn btn-dark modificar" data-id="'.$row[0].'">Modificar</button></td>
				</tr>
				';
			}
		?>
    
  		</table>
    </div>
</body>
</html>