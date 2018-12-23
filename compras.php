<?php 
	@session_start();
	require 'Conexion.php';
	if (isset($_SESSION['carrito'])) {
        if (isset($_POST['id'])) {
            # code...
        
    		$arreglo = $_SESSION['carrito'];
            $encontro=false;
            $numero=0;
            for ($i=0; $i <count($arreglo) ; $i++) { 
                if ($arreglo[$i]['Id']==$_POST['id']) {
                    $encontro=true;
                    $numero=$i;
                }
            }
            if ($encontro==true) {
                $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
                $_SESSION['carrito']=$arreglo;

            }else{
               $nombre="";
                $precio=0;
                $sql="SELECT * FROM productos WHERE Id=".$_POST['id'];
                $result = $con->query($sql);
                
                while ($f=mysqli_fetch_array($result)) {
                    $nombre=$f['Nombre'];
                    $precio=$f['Precio'];
                }

                $datosNuevos=array('Id'=>$_POST['id'],
                    'Nombre'=>$nombre,
                    'Precio'=>$precio,
                    'Cantidad'=>1);
                array_push($arreglo, $datosNuevos);
                $_SESSION['carrito']=$arreglo;
            }
    }
	}else{
		if (isset($_POST['id'])) {
			$nombre="";
			$precio=0;
			$sql="SELECT * FROM productos WHERE Id=".$_POST['id'];
			$result = $con->query($sql);
			
			while ($f=mysqli_fetch_array($result)) {
				$nombre=$f['Nombre'];
				$precio=$f['Precio'];
			}

			$arreglo[]=array('Id'=>$_POST['id'],
				'Nombre'=>$nombre,
				'Precio'=>$precio,
				'Cantidad'=>1);
			$_SESSION['carrito']=$arreglo;

            echo 'Compra realizada';

		}
	}
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
     <script type="text/javascript">
        $(document).ready(function() {
            $(".menu-icon").on("click", function() {
                $("nav ul").toggleClass("showing");
            });
        });
    </script>

    <?php
        if (empty($_SESSION['carrito'])) {
    ?>

        <br>

    <center><h2 class="cabezera">¿Qué espera? ¡Ordene tu compra ya!</h2></center>
    <?php 

         } 

     ?>
    <div class="box-main">
        <div class="table-responsive">
    <table id="TablaPro" class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>SubTotal</th>
                <th>Acción</th>
            </tr>
        </thead>
    	<?php 
    		$total=0;
    		if (isset($_SESSION['carrito'])) {
    			$datos=$_SESSION['carrito'];
                $total=0;
    			
    			for ($i=0; $i<count($datos) ; $i++) { 
    	?>
        <tbody class="product">
            
        
<tr >
            <td><?php echo $datos[$i]['Nombre']; ?></td>
            <td><?php echo $datos[$i]['Precio'];  ?></td>
            <td><input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"
                data-precio="<?php echo $datos[$i]['Precio'];?>"
                data-id="<?php echo $datos[$i]['Id'];?>"
                class="cantidad"></td>
            
            <td><span class="subtotal"><?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></span></td>
            <td><a style="color: white;" class="btn btn-dark eliminar" data-id="<?php echo $datos[$i]['Id']?>">Eliminar</a></td>
            
        </tr>  
        </tbody> 
    	<?php
    		$total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
    			}
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

    if ($total!=0) {

      
         echo "<form action='' method='POST' class='cerrar'>
                                <button type='submit' name='vca' class='btn btn-lg btn-default pull-right'>Vaciar Compra</button>
                                </form>";

          if (isset($_POST['vca'])) {
                            echo "<script>alert('Vaciando compras')
                             location.href='index'
                            </script>";
                            unset( $_SESSION["carrito"] );
                        }   


        if (empty($_SESSION['sesion'])) {
        ?>
            <button class="btn btn-lg btn-default pull-right"><a href="login.php" style="text-decoration: none; color: black;" >Comprar</a></button>

        <?php 
        }else{

            echo '
            <div class="form-group">
             <form action="" method="POST">
                <button type="submit" id="guardar" name="guardar" class="btn btn-lg btn-default pull-right">Comprar</button>
            </form>
            </div>
            ';

           
        }
        # code...
    }

    
if (isset($_POST['guardar'])) {
    # code...

        $arreglo=$_SESSION['carrito'];
        $numeroventa=0;
       $hoy= getdate();

$dia= $hoy['mday'];
$horas=$hoy['hours'];
$segundo=$hoy['seconds'];

$minutos= $hoy['minutes']; 
$mon= $hoy['mon'];
$year= $hoy['year'];

$actual =$year."/".$dia."/".$mon." ".$horas.":".$minutos.":".$segundo;
        $sql=("SELECT * FROM compras ORDER BY NumeroVenta DESC LIMIT 1");
        $re=mysqli_query($con, $sql);
        while ( $f=mysqli_fetch_array($re)) {
                    $numeroventa=$f['NumeroVenta']; 
        }
        if($numeroventa==0){
            $numeroventa=1;
        }else{
            $numeroventa=$numeroventa+1;
        }
        for($i=0; $i<count($arreglo);$i++){
            $resultado=$con->query("insert into compras (Email, Nombre, Precio, Cantidad, SubTotal, NumeroVenta, Entrega, FechaReg) values(
                '".$_SESSION['sesion']."',
                '".$arreglo[$i]['Nombre']."',
                ".$arreglo[$i]['Precio'].",
                ".$arreglo[$i]['Cantidad'].",   
                ".($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']).",
                ".$numeroventa.",
                'No',
                '".$actual."')");
            
        
        }

            if ($resultado) {
                 unset($_SESSION['carrito']);
                 echo "<script>alert('Su Compra fue realizada')

            window.location.assign('index.php')
            </script>";
            unset($_SESSION['carrito']);
                
            }
           
        
            # code...
        
}

     ?>

     <br>
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