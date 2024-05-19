<?php 
	session_start();
	require 'config.php';
	require 'libreria/Varios.php';
	require 'libreria/IFormulario.php';
	require 'libreria/FormularioEmpleados.php';
	require 'libreria/FormularioFactory.php';
	$p = array();
	View('empleados',$p);
 ?>