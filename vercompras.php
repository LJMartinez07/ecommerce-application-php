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
				<div class="cart">
					<a href="compras.php"><img src="img/cart.png" alt=""></a>
				</div>
			</div>
		<?php  
			}else{ 
		?>		
			<div class="bienvenida">
				<strong>Bienvenido, </strong><?php echo $_SESSION['sesion'] ; ?>
				<div class="cart">
					<button class='btn btn-secondary'><a style="text-decoration: none; color: white;" href="vercompras.php" >Ver pedidos</a></button>
                	<button  type='submit' class='btn btn-secondary' name='cerr'>Cerrar sesion</button>
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
	<div class="table-responsive">
    <table id="TablaPro" class="table">
        <thead>
            <tr>
            	<th>Numero de compra</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>SubTotal</th>
                <th>Acción</th>
            </tr>
        </thead>
    	<?php 
    		$total=0;
    		
    			$sql="select * from compras where Accion='Activo' and Email ='".$_SESSION["sesion"]."' and Entrega='No'";
			 $re=mysqli_query($con, $sql);
			 $numeroventa=0;
               
    			
    			while ($f=mysqli_fetch_array($re)) {
    				if($numeroventa!=$f['NumeroVenta']){
						echo '<tr><td>Compra Número: '.$f['NumeroVenta'].' </td>

						 <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>';
                        if ($f['Accion2']=='On') {

                        	echo '<td class="content" row=5><form action="" method="POST">
						<input type="hidden" name="venta" value="'.  $f["NumeroVenta"] .'">
						<input type="submit" value="Cancelar" class="btn btn-dark">
						</form></td>

						
						</tr>';
                        	
                        }else

                        echo "<tr>";
                         
                         
					}
					$numeroventa=$f['NumeroVenta'];
    	?>
        <tbody >
            
        
<tr >
			<td>&nbsp;</td>
            <td><?php echo $f['Nombre']; ?></td>
            <td><?php echo $f['Precio'];  ?></td>
            <td><?php echo $f['Cantidad'];?></td>
            <td><span class="subtotal"><?php echo $f['Cantidad']*$f['Precio'];?></span></td>
            
            
        </tr>  
        </tbody> 
    	<?php
    		$total=($f['Cantidad']*$f['Precio'])+$total;
    			}
    		
    	?>
    	<tfoot>
                    <tr>
                        <td>Total</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><span id="total"><?php echo $total; ?></span></td>
                    </tr>
                </tfoot>

    	
    </table>
</div>



</div>

<?php 

	if (isset($_POST['venta'])) {
		$sql = "UPDATE compras SET Accion = 'Cancelado' WHERE NumeroVenta =".$_POST['venta'];
		$result = $con->query($sql);
			 echo "<script>
                            location.href ='vercompras.php'
                     </script>";
		}
	

	

	 ?>

	 <script type="text/javascript">
$(document).ready(function() {
	var contador = 0;
    var tiempo = setInterval(function() {
    	
    	contador++;
        
        if (contador == 2) {
        	$(".content").fadeOut(1500);
        	clearInterval(tiempo);
        	<?php 

 				$resultado=$con->query("UPDATE compras SET Accion2 = 'Off';");

        	 ?>

        }
        
    },50000);
});
</script>

</body>
</html>