<?php 
	session_start();
	require 'libreria/IFormulario.php';
	require 'libreria/FormularioFactory.php';
	require 'libreria/FormularioPagosDiarios.php';

	$p = array();
	View('pagosdiarios',$p);
 ?>