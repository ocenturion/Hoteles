<?php
	include("conexion.php");
	session_start();
	$idHotel=$_SESSION['id'];
	$idHabitacion=$_POST['id'];
	
	$consulta="delete from habitacion where id='$idHabitacion'";
	$Imagenes="select * from imagenes where idHabitacion='$idHabitacion'";
	$eliminar="delete from imagenes where idHabitacion='$idHabitacion'";
	
	$ejecutar=mysqli_query($conexion,$consulta);
	$ejecutar_Imagenes=mysqli_query($conexion,$Imagenes);
	$ejecutar_eliminar=mysqli_query($conexion,$eliminar);

	while($reg=mysqli_fetch_array($ejecutar_Imagenes)){
		$img=$reg['nombre'];
		$ruta="img/".$idHotel."/".$idHabitacion."/".$img;
		unlink($ruta);
	}
	
	if (!$ejecutar){
		die("Error en la query.");
	}else{
		echo "Se elimino con exito..";
	}
?>