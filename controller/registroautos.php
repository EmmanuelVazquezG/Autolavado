<?php 
	session_start();
	require 'config.php';
	require 'libreria/Varios.php';
	require 'libreria/IFormulario.php';
	require 'libreria/FormularioRegistroAutos.php';
	require 'libreria/FormularioFactory.php';
	$rv = new Vehiculos();
	$p = array();
	if (isset($_POST['autoNombre'],$_POST['formaCobro'],$_POST['valor'])) {
		$rv->InsertarVehiculo($_POST['autoNombre'],$_POST['formaCobro'],$_POST['valor']);
		header("refresh:2; url=autos");
	}
	View('registroautos',$p);
 ?>