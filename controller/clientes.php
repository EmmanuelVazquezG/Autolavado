<?php 
	session_start();
	require 'config.php';
	require 'libreria/Varios.php';
	require 'libreria/IFormulario.php';
	require 'libreria/FormularioFactory.php';
	require 'libreria/FormularioClientes.php';
	$r = new Clientes();
	$p = array();
	if (isset($_POST['cliente'])) {
		$r->EliminarReserva($_POST['cliente']);
		$r->MostrarReserva('%');
	}
	View('clientes',$p);
 ?>