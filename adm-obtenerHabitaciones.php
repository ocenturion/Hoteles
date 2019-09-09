<?php
  include("conexion.php");
  session_start();
  $id=$_SESSION['id'];
  //$id=2;
  $consulta="select * from habitacion where idhoteles='$id'";
  $ejecutar= mysqli_query($conexion,$consulta);
    
  $json=array();
  while($reg=mysqli_fetch_array($ejecutar)){
	$json[]=array(
		'id' => $reg['id'],
		'nombre' => $reg['nombre'],
		'estado' => $reg['estado'],
		'numero' => $reg['numero'],
		'idhoteles' => $reg['idhoteles'],
		'PRECIO' => $reg['PRECIO']
	);
  }
  $jsonString=json_encode($json);
  echo $jsonString;
?> 