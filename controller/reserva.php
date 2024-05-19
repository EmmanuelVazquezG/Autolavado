<?php 
	session_start();
	require 'config.php';
	require 'libreria/Varios.php';
	require 'libreria/IFormulario.php';
	require 'libreria/FormularioReserva.php';
	require 'libreria/FormularioFactory.php';
	$r = new Clientes();
	if (isset($_POST['nombreUsuario'],$_POST['vehiculos'],$_POST['matriculaAuto'],$_POST['fecha'],$_POST['Cantidad'])) {
		$r->InsertarReserva($_POST['nombreUsuario'],$_POST['vehiculos'],$_POST['matriculaAuto'],$_POST['fecha'],$_POST['Cantidad'],'Espera');
		header("refresh:2; url=home");
	}
	$p = array();
	ViewL('reserva',$p);
 ?>