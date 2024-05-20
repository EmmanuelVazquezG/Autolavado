<?php 
	session_start();
	require 'config.php';
	require 'libreria/IFormulario.php';
	require 'libreria/FormularioLogin.php';
	require 'libreria/FormularioRegistroAutos.php';
	require 'libreria/FormularioFactory.php';
	require 'libreria/Varios.php';
	$p = array();
	ViewL('login',$p);
 ?>