<?php
@session_start();
	include "../Conexion.php";
	if(! isset($_SESSION['admin'])){
        ?><SCRIPT>   location.href = "../back.php";   </SCRIPT><?php
        die();
	}
	include ("../Conexion.php");
	if(!isset($_POST['nombre']) &&  !isset($_POST['descripcion']) && !isset($_POST['precio'])){
		header("Location: agregarproducto.php");
	}else{
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
			$imagen="";
			$random=rand(1,999999);
			if ((($_FILES["file"]["type"] == "image/gif")
				|| ($_FILES["file"]["type"] == "image/jpeg")
				|| ($_FILES["file"]["type"] == "image/jpg")
				|| ($_FILES["file"]["type"] == "image/pjpeg")
				|| ($_FILES["file"]["type"] == "image/x-png")
				|| ($_FILES["file"]["type"] == "image/png"))){
				//Verificamos que sea una imagen
		  	if ($_FILES["file"]["error"] > 0){
		  		//verificamos que venga algo en el input file
		    	echo "Error numero: " . $_FILES["file"]["error"] . "<br>";
		    }else{
		    	//subimos la imagen

		    	$imagen= $random.'_'.$_FILES["file"]["name"];
		    	if(file_exists("../img/".$random.'_'.$_FILES["file"]["name"])){
		      		echo $_FILES["file"]["name"] . " Ya existe. ";
		      	}else{
		      		move_uploaded_file($_FILES["file"]["tmp_name"],
		      		"../img/" .$random.'_'.$_FILES["file"]["name"]);
		      		echo "Archivo guardado en " . "../img/" .$random.'_'. $_FILES["file"]["name"];
		      		$producto=$_POST['nombre'];
					$descripcion=$_POST['descripcion'];
					$precio=$_POST['precio'];
					$categoria=$_POST['cate'];
					$hoy= date(Y. "/".d. "/". m);
					$sql="insert into productos (Nombre, Descripcion, Imagen, Precio, Categoria, FechaReg) values(
							'".$producto."',
							'".$descripcion."',
							'".$imagen."',
							".$precio.",
							'".$categoria."',
							'".$hoy."')";
					$Resultado=$con->query($sql);
					echo "<script>
					alert('Producto agregado')
					window.location.assign('admin.php')

					</script>"	;
					
		      }
		    }
		  }else{
		  echo "Formato no soportado";
		  }

		
	}
?>
