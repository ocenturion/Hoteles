<?php
  include("conexion.php");
  $id=$_POST['idHotel'];
  
  $consulta="select * from habitacion where idhoteles='$id' and estado=1 order by PRECIO";
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