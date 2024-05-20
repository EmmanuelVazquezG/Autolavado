<?php 
	session_start();
	require 'config.php';
	require 'libreria/Varios.php';
	require 'libreria/IFormulario.php';
	require 'libreria/FormularioTrabajos.php';
	require 'libreria/FormularioFactory.php';
	$t = new Trabajos();
	$l = new login();
	$p = [];
	
	if (isset($_POST['nombre'])) {
		$dc = login::Verificar($_POST['nombre']);
		$_SESSION['usuario_verificado'] = $dc; // Almacenar en variable de sesión
		if ($_POST['nombre'] == $dc[1] && $_POST['contra'] == $dc[2]) {
			if ($dc[3] == 'empleado') {
				ViewE('trabajos', $p);
			}
			elseif ($dc[3] == 'admin') {
				header("refresh:2; url=admin");
			}
		}
	}
	
	if (isset($_POST['cliente'])) {
		// Obtener la información del usuario desde la variable de sesión
		$dc = isset($_SESSION['usuario_verificado']) ? $_SESSION['usuario_verificado'] : null;
		if ($dc) {
			$t->ActualizarEmpleado($dc[0], $_POST['cliente']);
			$t->AceptarTrabajo('Espera', $_POST['cliente']);
			$t->MostrarTrabajos('Espera');
			ViewE('trabajos', $p);
		} else {
			// Manejar el caso en que no hay información del usuario
		}
	}
?>
