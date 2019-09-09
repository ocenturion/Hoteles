<?php
	include("conexion.php");
	if(isset($_POST['id'])){
		$id=$_POST['id'];

		$consulta="select * from habitacion where id='$id'";
		$ejecutar=mysqli_query($conexion,$consulta);

		while($fila=mysqli_fetch_array($ejecutar)){
			echo $fila['id'];
			$estado=$fila['estado'];
			if($estado==1){
				$estado=0;
			}else{
				$estado=1;
			}
			$query="update habitacion set estado='$estado' where id='$id'";
			$ejecutar2=mysqli_query($conexion,$query);
			echo "Realizado correctamente, verificar..";
		}
		
	}
	
?>