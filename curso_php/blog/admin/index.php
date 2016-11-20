<?php session_start();
require 'config.php';
require '../functions.php';

$conexion = conexion($bd_config);

//Comprobar sesión
comprobarSesion();

if (!$conexion) {
	header('Location: ../error.php');
}

$posts = obtener_post($blog_config['post_por_pagina'], $conexion);




require '../views/admin_index.view.php';

?>