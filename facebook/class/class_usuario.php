<?php

	class Usuario{

		private $codigoUsuario;
		private $nombreUsuario;
		private $correo;
		private $contrasena;
		private $url_imagen_perfil;

		public function __construct($codigoUsuario,
					$nombreUsuario,
					$correo,
					$contrasena,
					$url_imagen_perfil){
			$this->codigoUsuario = $codigoUsuario;
			$this->nombreUsuario = $nombreUsuario;
			$this->correo = $correo;
			$this->contrasena = $contrasena;
			$this->url_imagen_perfil = $url_imagen_perfil;
		}
		public function getCodigoUsuario(){
			return $this->codigoUsuario;
		}
		public function setCodigoUsuario($codigoUsuario){
			$this->codigoUsuario = $codigoUsuario;
		}
		public function getNombreUsuario(){
			return $this->nombreUsuario;
		}
		public function setNombreUsuario($nombreUsuario){
			$this->nombreUsuario = $nombreUsuario;
		}
		public function getCorreo(){
			return $this->correo;
		}
		public function setCorreo($correo){
			$this->correo = $correo;
		}
		public function getContrasena(){
			return $this->contrasena;
		}
		public function setContrasena($contrasena){
			$this->contrasena = $contrasena;
		}
		public function getUrl(){
			return $this->url_imagen_perfil;
		}
		public function setUrl($url_imagen_perfil){
			$this->url = $url;
		}
		public function __toString(){
			return "CodigoUsuario: " . $this->codigoUsuario . 
				" NombreUsuario: " . $this->nombreUsuario . 
				" Correo: " . $this->correo . 
				" Contrasena: " . $this->contrasena . 
				" Url: " . $this->url_imagen_perfil;
		}

		public static function obtenerUsuarios($conexion){
				
          $resultado = $conexion->ejecutarConsulta("SELECT codigo_usuario, nombre_usuario, correo, contrasena, url_imagen_perfil
			FROM tbl_usuarios");
          while (($fila = $conexion->obtenerFila($resultado))) {
          	echo 	'<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 card-container">
					<div class="card-profile">
					<button type="button" class="btn btn-primary btn-xs" style="position:absolute;" title="'.$fila["nombre_usuario"].'" onclick="seleccionarUsuario('.$fila["codigo_usuario"].','.$fila["nombre_usuario"].');">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					</button>
					<img src="'.$fila["url_imagen_perfil"].' " class="img-responsive">
					<span class="profile-name">'.$fila["nombre_usuario"].'</span>
					</div>
					</div>';
          }
		}
		
		public static function verificarUsuario($conexion, $correo,$contrasena){
				$sql = sprintf(
						"SELECT  nombre_usuario, correo, contrasena FROM tbl_usuarios WHERE  correo = '%s' AND contrasena = '%s'",
						$correo,
						$contrasena
					);
				//echo ($sql);
				$resultado = $conexion->ejecutarConsulta($sql);
				$cantidadRegistros = $conexion->cantidadRegistros($resultado);
				//$respuesta=array();
				$fila = $conexion->obtenerFila($resultado);
				if ($cantidadRegistros==1){
					//$fila = $conexion->obtenerFila($resultado);
					//$respuesta="Si tiene acceso" ;
					echo "si existe registro";
				}else{
					//$respuesta="No existe Registro" ;
					echo "no existe registro";
				}
		}

		public static function guardarUsuario($conexion,$nombre,$email,$contra,$imagen){
			/*$sql = sprintf(,
				$conexion->antiInyeccion($this->nombre),
				$conexion->antiInyeccion($this->correo),
				$conexion->antiInyeccion($this->contra),
				$conexion->antiInyeccion($this->imagen)
		    );*/
		    $sql="INSERT INTO tbl_usuarios(nombre_usuario, correo, contrasena, url_imagen_perfil) VALUES ($nombre,$email,$contra,$imagen)";
		    $resultado=$conexion->ejecutarConsulta($sql);
		   // $resultado=$conexion->ejecutarConsulta($sql);
		}

	}
?>
