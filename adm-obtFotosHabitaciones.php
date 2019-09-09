<?php
  include("conexion.php");
  session_start();
  $id=$_SESSION['id'];
  
  $consulta="select * from imagenes where idHotel='$id'";
  $ejecutar= mysqli_query($conexion,$consulta);
    
  $json=array();
  while($reg=mysqli_fetch_array($ejecutar)){
	$json[]=array(
		'idImagen' => $reg['id'],
		'nombreImagen' => $reg['nombre'],
		'idHabitacion' => $reg['idHabitacion'],
		'idHotel' => $reg['idHotel']
	);
  }
  $jsonString=json_encode($json);
  echo $jsonString;
?> 