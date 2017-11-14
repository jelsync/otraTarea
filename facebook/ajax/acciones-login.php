<?php
 
	switch ($_GET["accion"]) {
		case 'login': 
			include_once("../class/class-conexion.php");
			include_once("../class/class_usuario.php");
			$conexion = new Conexion();
			Usuario::verificarUsuario($conexion,$_POST["txt-correo"],
			$_POST["txt-password"]);
			break;
		case 'guardar':
			include_once("../class/class-conexion.php");
			include_once("../class/class_usuario.php");
			$conexion = new Conexion();
			Usuario::guardarUsuario($conexion, $_POST["txt-usuario"], $_POST["txt-email"], $_POST["txt-contrasena"], $_POST["slc-imagen"]);
			break;
	default:
			
			break;
	}
	
?>