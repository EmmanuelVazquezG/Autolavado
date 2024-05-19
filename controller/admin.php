<?php 
	session_start();
	require 'config.php';
	require 'libreria/IFormulario.php';
	require 'libreria/FormularioFactory.php';
	require 'libreria/FormularioAdmin.php';

	$p = array();
	View('admin',$p);
 ?>