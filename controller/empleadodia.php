<?php 
	session_start();
	require 'libreria/IFormulario.php';
	require 'libreria/FormularioFactory.php';
	require 'libreria/FormularioEmpleadoDia.php';

	$p = array();
	View('empleadodia',$p);
 ?>