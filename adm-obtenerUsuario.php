<?php
  include("conexion.php");
  session_start();
  $id=$_SESSION['id'];
  
  $consulta2="select * from logueo where id='$id'";
  $ejecutar2=mysqli_query($conexion,$consulta2);
  $json=array();
  while($reg2=mysqli_fetch_array($ejecutar2)){
	$json[]=array(
		'id' => $reg2['id'],
		'nombre' => $reg2['nombre'],
		'contrasena' => $reg2['contrasena'],
		'telefono' => $reg2['telefono'],
		'email' => $reg2['email'],
		'direccion' => $reg2['direccion'],
		'imagen' => $reg2['imagen']
	);
  }
  $jsonString=json_encode($json);
  echo $jsonString;
?> 