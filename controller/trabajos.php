<?php 
	session_start();
	require 'config.php';
	require 'libreria/Varios.php';
	require 'libreria/IFormulario.php';
	require 'libreria/FormularioTrabajos.php';
	require 'libreria/FormularioFactory.php';
	$t = new Trabajos();
	$p = array();
	if (isset($_POST['cliente'])) {
		$t->AceptarTrabajo('Espera',$_POST['cliente']);
		$t->MostrarTrabajos('Espera');
	}
	ViewE('trabajos',$p);
 ?>