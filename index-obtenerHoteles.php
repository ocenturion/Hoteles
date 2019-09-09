<?php
  include("conexion.php");
  
  $consulta="select * from logueo";
  $ejecutar= mysqli_query($conexion,$consulta);
    
  $json=array();
  while($reg=mysqli_fetch_array($ejecutar)){
	$json[]=array(
		'id' => $reg['id'],
		'nombre' => $reg['nombre'],
		'contrasena' => $reg['contrasena'],
		'telefono' => $reg['telefono'],
		'email' => $reg['email'],
		'direccion' => $reg['direccion'],
		'imagen' => $reg['imagen']
	);
  }
  $jsonString=json_encode($json);
  echo $jsonString;
?> 