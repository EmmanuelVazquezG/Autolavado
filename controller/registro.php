<?php 
	session_start();
	require 'config.php';
	require 'libreria/Varios.php';
	require 'libreria/IFormulario.php';
	require 'libreria/FormularioRegistro.php';
	require 'libreria/FormularioFactory.php';
	$re = new Esclavos();
	$p = array();
	$p['result'] = '';
	if (isset($_POST['nombre'], $_POST['password'])) {
		$re->InsertarEmpleado($_POST['nombre'],$_POST['password']);
		header("refresh:2; url=admin");
	}
	View('registro',$p);
 ?>