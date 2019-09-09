<?php
	include("conexion.php");
	$search=$_POST['busca'];
	
	//!empty si $search no esta vacio..
	if(!empty($search)){
		$query="select * from logueo where nombre like '%$search%'";
		$result=mysqli_query($conexion,$query);
		if (!$result){
			die('error en la query'. mysqli_error($conexion));
		}
	
		//creo un array para llenar con los resultados de la query
		$json=array();
		while($fila=mysqli_fetch_array($result)){
			$json[]=array(
				'id' => $fila['id'],
				'nombre' => $fila['nombre'],
				'contrasena' => $fila['contrasena'],
				'telefono' => $fila['telefono'],
				'email' => $fila['email'],
				'direccion' => $fila['direccion'],
				'imagen' => $fila['imagen']
			);
		}
		$jsonstring=json_encode($json);
		echo $jsonstring;
	}
?>