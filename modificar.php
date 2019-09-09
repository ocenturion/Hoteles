<?php
	include("conexion.php");
	session_start();
	$idhoteles=$_SESSION['id'];
	$nombre=$_POST['nombre'];
	$precio=$_POST['precio'];
	$idHabitacion=$_POST['idhoteles'];
	
	$consulta="UPDATE habitacion set nombre='$nombre', PRECIO='$precio' where id='$idHabitacion'";
	$ejecutar=mysqli_query($conexion,$consulta);
	$guardar=true;
	
	foreach($_FILES["foto"]['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES["foto"]["name"][$key]) {
			
			$filename = $_FILES["foto"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["foto"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = 'img'.'/'.$idhoteles.'/'.$idHabitacion; //Declaramos un  variable con la ruta donde guardaremos los archivos
			
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extraccion");	
			}
			
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
			$contador=0;
			while($guardar){
				if(file_exists($target_path)){
					$filename = $contador.$_FILES["foto"]["name"][$key];
					$target_path = $directorio.'/'.$filename;
					$contador++;
				}else{
					$guardar=false;
				}
			}
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) {	
				$consulta2="insert into imagenes values (null,'$filename','$idHabitacion','$idhoteles')";
				$ejecutar=mysqli_query($conexion,$consulta2);
				//echo "El archivo $filename se ha almacenado en forma exitosa.	'\n'";
				$guardar=true;
			} else {	
				$guardar=false;
				//echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
			}
			
			closedir($dir); //Cerramos el directorio de destino
		}
	}
	
	if($ejecutar==1 && $guardar){
		echo "modificado correctamente.";
	}else{
		echo "error al modificar los datos. Intentelo nuevamente.";
	}

?>