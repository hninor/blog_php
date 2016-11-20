<?php session_start();
require 'admin/config.php';
require 'functions.php';
$errores = '';
$conexion = conexion($bd_config);
if (!$conexion) {
	header('Location: error.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = limpiarDatos($_POST['usuario']);
	$password = limpiarDatos($_POST['password']);
	$password = hash('sha512', $password);

	$statement = $conexion->prepare('SELECT * FROM  usuarios WHERE usuario = :usuario AND password = :pass LIMIT 1');
	$statement->execute(array(':usuario' => $usuario, ':pass' => $password));
	$resultado = $statement->fetch();
	if ($resultado != false) {
		$_SESSION['admin'] = $blog_admin['usuario'];
		header('Location:' . RUTA . '/admin');
	} else {
		$errores .= '<li>Usuario y/o contraseña incorrectos</li>';
	}

}
require 'views/login.view.php'
?>