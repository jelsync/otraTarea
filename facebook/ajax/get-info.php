<?php
include ('../class/class-conexion.php');
$objconexion = new Conexion();

switch ($_GET["accion"]) {
	case 'obtener_usuarios': //Segundo paso para obtener datos
        include('../class/class_usuario.php');
		Usuario::obtenerUsuarios($objconexion);
		break;
	case 'obtener_publicacion':
		include ('../class/class_publicacion.php');
		Publicacion::obtenerPublicacion($objconexion);
		break;
	default:
		break;
		echo "Mlgo anda mal";
}

?>