<?php
 @session_start();
	$arreglo=$_SESSION['carrito'];
	for($i=0;$i<count($arreglo);$i++){
		if($arreglo[$i]['Id']!=$_POST['Id']){
			$datosNuevos[]=array(
				'Id'=>$arreglo[$i]['Id'],
				'Nombre'=>$arreglo[$i]['Nombre'],
				'Precio'=>$arreglo[$i]['Precio'],
				'Cantidad'=>$arreglo[$i]['Cantidad']
				);
		}
	}
	if(isset($datosNuevos)){
		$_SESSION['carrito']=$datosNuevos;
		echo '0';
	}else{
		unset($_SESSION['carrito']);
		echo '0';
	}
?>