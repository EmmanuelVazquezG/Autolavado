<?php 
	session_start();
	require 'config.php';
	require 'libreria/Varios.php';
	require 'libreria/IFormulario.php';
	require 'libreria/FormularioFactory.php';
	require 'libreria/FormularioHistorialPagos.php';
	$ed = new Puntaje();
	$t = new Trabajos();

	$p = array();
	if (isset($_POST['empleado'],$_POST['fecha'],$_POST['cantidad'])) {
		$dc = Trabajos::Obtener($_POST['empleado']);
		$ed->InsertarPagos($dc[0],$_POST['fecha'],$_POST['cantidad']);
		$pa = Pagos::EliminarPago($dc[0],$_POST['fecha']);
		$ed->MostrarPuntaje('%');
	}
	View('historialpagos',$p);
 ?>