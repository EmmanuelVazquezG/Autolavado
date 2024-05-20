<?php 
	session_start();
	require 'config.php';
	require 'libreria/Varios.php';
	require 'libreria/IFormulario.php';
	require 'libreria/FormularioFactory.php';
	require 'libreria/FormularioClientesAtendidos.php';

	$p = array();
	View('clientesatendidos',$p);
 ?>