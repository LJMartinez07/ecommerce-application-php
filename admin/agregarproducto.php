<?php
@session_start();
	include "../Conexion.php";
	if(! isset($_SESSION['admin'])){
        ?><SCRIPT>   location.href = "../back.php";   </SCRIPT><?php
        die();
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" href="../css/main.css">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
	
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

	

	<div class="container">
		<form action="altaproducto.php" method ="POST" enctype="multipart/form-data">

			<div class="form-group">
	    		<label for="Nombre">Nombre </label>
	    		<input type="text" class="form-control" id="Nombre" name="nombre"  placeholder="Intruduzca nombre" required>
	  		</div>
	  		<div class="form-group">
    			<label for="Desc">Descripcion </label>
    			<textarea class="form-control" id="Desc" rows="3" name="descripcion" placeholder="Introduzca la descripcion aqui..." required></textarea>
 			</div>
 			<div class="input-group mb-3">
  				<div class="input-group-prepend">
    				<label class="input-group-text" for="Archivo">Subir</label>
  				</div>
  				<div class="custom-file">
    				<input  type="file" class="custom-file-input" name="file" id="Archivo">
    				<label class="custom-file-label" for="Archivo">Elige la imagen</label>
  				</div>
			</div>
			<div class="input-group mb-3">
    			<div class="input-group-prepend">
    				<label class="input-group-text" for="Precio">Precio RD$</label>
  				</div>
  				<input type="number" step="0.0001" class="form-control"  name="precio" id="Precio" aria-label="Default" aria-describedby="inputGroup-sizing-default">
			</div>
			<div class="input-group mb-3">
  				<div class="input-group-prepend">
    				<label class="input-group-text" for="inputGroupSelect01">Categoria</label>
  				</div>
			  <select class="custom-select" name="cate" id="inputGroupSelect01">
			    <option selected>Selecciona...</option>
				<option value="Samsung">Samsung</option>
				<option value="Apple">Apple</option>
        <option value="Accesorios">Accesorios</option>
        <option value="Otros">Otros</option>
			  </select>
			</div>
			<button type="submit" name="accion" value="Enviar" class="btn btn-light">Agregar</button>
		</form>
	

	</div>
	
</body>
</html>