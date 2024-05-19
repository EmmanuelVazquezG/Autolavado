<?php 
	session_start();
	require 'libreria/IFormulario.php';
	require 'libreria/FormularioFactory.php';
	require 'libreria/FormularioHistorialPagos.php';

	$p = array();
	View('historialpagos',$p);
 ?>