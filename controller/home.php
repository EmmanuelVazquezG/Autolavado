<?php 
	session_start();
	require 'libreria/IFormulario.php';
	require 'libreria/FormularioFactory.php';
	require 'libreria/FormularioHome.php';

	$p = array();
	View('home',$p);
 ?>