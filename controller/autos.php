<?php 
	session_start();
	require 'config.php';
	require 'libreria/Varios.php';
	require 'libreria/IFormulario.php';
	require 'libreria/FormularioAutos.php';
	require 'libreria/FormularioFactory.php';

	$p = array();
	View('autos',$p);
 ?>