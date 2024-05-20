<?php 
	session_start();
	require 'config.php';
	require 'libreria/Varios.php';
	require 'libreria/IFormulario.php';
	require 'libreria/FormularioFactory.php';
	require 'libreria/FormularioEmpleadoDia.php';
	$p = array();
	View('empleadodia',$p);
 ?>