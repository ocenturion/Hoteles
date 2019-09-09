<?php
	include("conexion.php");
	$id=$_POST['idFotosHabitaciones'];
	
	$consulta="select * from imagenes where idHabitacion='$id'";
	$ejecutar=mysqli_query($conexion,$consulta);
	$json=array();
	while($reg=mysqli_fetch_array($ejecutar)){
		$json[]=array(
			'idFoto'=>$reg['id'],
			'nombre'=>$reg['nombre'],
			'idHabitacion'=>$reg['idHabitacion'],
			'idHotel'=>$reg['idHotel']
		);
	}
	$jsonString=json_encode($json);
	echo $jsonString;
?>