<?php session_start();

require 'admin/config.php';

require 'functions.php';

if (isset($_SESSION['admin'])) {
	header('Location: index.php');
}


$conexion = conexion($bd_config);
if (!$conexion) {
	header('Location: error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	$errores = '';
	if (empty($usuario) or empty($password) or empty($password2)) {
		$errores .= '<li>Por favor rellena todos los datos correctamente</li>';
	} else {
		$statement = $conexion->prepare('SELECT * FROM  usuarios WHERE usuario = :usuario LIMIT 1');
		$statement->execute(array(':usuario' => $usuario));
		$resultado = $statement->fetch();
		if ($resultado != false) {
			$errores .= '<li>El nombre de usuario ya existe</li>';
		}

		$password = hash('sha512', $password);
		$password2 = hash('sha512', $password2);

		if ($password != $password2) {
			$errores .= '<li>Las contraseñas no son iguales</li>';
		}
	}
	//echo "$usuario . $password . $password2";
	if ($errores == '') {
		$statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, password) VALUES (null, :usuario, :pass)');
		$statement->execute(array(':usuario' => $usuario, ':pass' => $password ));
		header('Location: login.php');
	}

}
require 'views/registrate.view.php';

?>