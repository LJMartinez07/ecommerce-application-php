<?php 
	include "../Conexion.php";
	@session_start();
	include "../Conexion.php";
	if(! isset($_SESSION['admin'])){
        ?><SCRIPT>   location.href = "../back.php";   </SCRIPT><?php
        die();
	}
	if($_POST['Caso']=="Eliminar"){
		$sql = "delete from productos where Id=".$_POST['Id'];
		$result = $con->query($sql);
		unlink("../img/".$_POST['Imagen']);
		echo 'El producto se ha eliminado';
	}
	if($_POST['Caso']=="Modificar"){

		$des = ($_POST['Descuento'] /100);
		$sql1 = "update productos set Nombre='".$_POST['Nombre']."' where Id=".$_POST['Id'];
		$result = $con->query($sql1);
		$sql2 = "update productos set Descripcion='".$_POST['Descripcion']."' where Id=".$_POST['Id'];
		$result = $con->query($sql2);
		$sql3 = "update productos set Agotado='".$_POST['Agotado']."' where Id=".$_POST['Id'];
		$result = $con->query($sql3);
		$sql4 = "update productos set Precio='".$_POST['Precio']."' where Id=".$_POST['Id'];
		$result = $con->query($sql4);
		$sql5 = "update productos set Especial='".$_POST['Especial']."' where Id=".$_POST['Id'];
		$result = $con->query($sql5);
		$sql6 = "update productos set Descuento='".$des."' where Id=".$_POST['Id'];
		$result = $con->query($sql6);
		
		echo 'El producto se ha modificado';
	}

?>