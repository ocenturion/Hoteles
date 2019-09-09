<?php
	include("conexion.php");
	$nombre=$_POST['nombre'];
	$precio=$_POST['precio'];
	$idhoteles=$_POST['idhoteles'];
	$guardar=true;
	
	$consulta="INSERT into habitacion (nombre,estado,numero,idhoteles,PRECIO)
	     values ('$nombre',1,1,'$idhoteles','$precio')";
	mysqli_query($conexion,$consulta);
	
	$pre_consulta="select max(id) from habitacion where idhoteles='$idhoteles'";
	$pre_ejecutar=mysqli_query($conexion,$pre_consulta);
	$pre_reg=mysqli_fetch_array($pre_ejecutar);
	$idHabitacion=$pre_reg['max(id)'];
	
	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
	{
		
		
		//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) {
			
			$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = 'img'.'/'.$idhoteles; //Declaramos un  variable con la ruta donde guardaremos los archivos
			
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extraccion");	
				$directorio = $idhoteles.'/'.$idHabitacion;
				if(!file_exists($directorio)){
					mkdir($directorio, 0777) or die("No se puede crear el directorio de extraccion");
				}
			}else{
				$directorio = 'img'.'/'.$idhoteles.'/'.$idHabitacion;
				if(!file_exists($directorio)){
					mkdir($directorio, 0777) or die("No se puede crear el directorio de extraccion");
				}
			}
			
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) {	
				$consulta2="insert into imagenes values (null,'$filename','$idHabitacion','$idhoteles')";
				$ejecutar=mysqli_query($conexion,$consulta2);
				//echo "El archivo $filename se ha almacenado en forma exitosa.	'\n'";
			} else {	
				$guardar=false;
				//echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos el directorio de destino
		}
	}
	if($guardar){
		echo "1";
	}
?>