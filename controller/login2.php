<?php 
	session_start();
	require 'config.php';
	require 'libreria/IFormulario.php';
	require 'libreria/FormularioLogin.php';
	require 'libreria/FormularioRegistroAutos.php';
	require 'libreria/FormularioFactory.php';
	require 'libreria/Varios.php';
	$l = new login();
	$p = array();
	
	if (isset($_POST['nombre'])) {
		$dc = login::Verificar($_POST['nombre']);
		if ($_POST['nombre'] == $dc[1] && $_POST['contra'] == $dc[2]) {
			// echo "usuario correcto";
			if ($dc[3] == 'empleado') {
				
				header("refresh:2; url=trabajos");
				
			}
			elseif ($dc[3] == 'admin') {
				header("refresh:2; url=clientes");
			}
		}
		else {
			echo "usuario o contraseña incorrectos";
		}
	}
	ViewL('login',$p);
 ?>