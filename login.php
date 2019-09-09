<?php
	include('conexion.php');
	$email=$_POST['email'];
	$contrasena=$_POST['contrasena'];
	
	$consulta="select id from logueo 
				where 
					email='$email'
					and
					contrasena='$contrasena'";
	$ejecutar=mysqli_query($conexion,$consulta);
	$cant=mysqli_num_rows($ejecutar);
	if($cant==1){
		$reg=mysqli_fetch_array($ejecutar);
		session_start();
		$_SESSION['id']=$reg['id'];
		header('location: adm.php');
	}else{
		echo "Datos incorrectos.";
	}
?>