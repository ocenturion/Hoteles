<?php
	include("conexion.php");
	$idImagen=$_POST['idImagen'];
	$idHabitacion=$_POST['idHabitacion'];
	$eliminar="delete from imagenes where id='$idImagen'";
	$ejecutar_eliminar=mysqli_query($conexion,$eliminar);
	$img=$_POST['nombre'];
	$idHotel=$_POST['idHotel'];
	$ruta="img/".$idHotel."/".$idHabitacion."/".$img;
	unlink($ruta);
?>