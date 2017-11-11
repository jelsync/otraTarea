<?php

	class Publicacion{

		private $codigoPublicacion;
		private $tituloPublicacion;
		private $textoPublicacion;
		private $fechaPublicacion;

		public function __construct($codigoPublicacion,
					$tituloPublicacion,
					$textoPublicacion,
					$fechaPublicacion){
			$this->codigoPublicacion = $codigoPublicacion;
			$this->tituloPublicacion = $tituloPublicacion;
			$this->textoPublicacion = $textoPublicacion;
			$this->fechaPublicacion = $fechaPublicacion;
		}
		public function getCodigoPublicacion(){
			return $this->codigoPublicacion;
		}
		public function setCodigoPublicacion($codigoPublicacion){
			$this->codigoPublicacion = $codigoPublicacion;
		}
		public function getTituloPublicacion(){
			return $this->tituloPublicacion;
		}
		public function setTituloPublicacion($tituloPublicacion){
			$this->tituloPublicacion = $tituloPublicacion;
		}
		public function getTextoPublicacion(){
			return $this->textoPublicacion;
		}
		public function setTextoPublicacion($textoPublicacion){
			$this->textoPublicacion = $textoPublicacion;
		}
		public function getFechaPublicacion(){
			return $this->fechaPublicacion;
		}
		public function setFechaPublicacion($fechaPublicacion){
			$this->fechaPublicacion = $fechaPublicacion;
		}
		public function __toString(){
			return "CodigoPublicacion: " . $this->codigoPublicacion . 
				" TituloPublicacion: " . $this->tituloPublicacion . 
				" TextoPublicacion: " . $this->textoPublicacion . 
				" FechaPublicacion: " . $this->fechaPublicacion;
		}

		public static function obtenerPublicacion($conexion){
				
          $resultado = $conexion->ejecutarConsulta("SELECT codigo_publicacion, titulo_publicacion, texto_publicacion, fecha_publicacion
				FROM tbl_publicaciones
				WHERE codigo_usuario = codigo_usuario ");
          while (($fila = $conexion->obtenerFila($resultado))) {
          	echo 	'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 card-container">
						<div class="card-profile">
						<span class="profile-name">'.$fila["titulo_publicacion"].' </span>
						<small>'.$fila["fecha_publicacion"].' </small>
						<p>'.$fila["texto_publicacion"].' </small>
						<h5>Comentarios</h5>';
				$resultado2 = $conexion->ejecutarConsulta("SELECT a.codigo_usuario, a.comentario, b.nombre_usuario, b.url_imagen_perfil
					FROM tbl_comentarios a
					INNER JOIN tbl_usuarios b
					ON a.codigo_usuario = b.codigo_usuario
					WHERE codigo_publicacion = codigo_publicacion"); 
				                  while (($fila2 = $conexion->obtenerFila($resultado2))) {
                     	echo '<div class="card-comment">
								<img class="img-circle img-comment" src='.$fila2["url_imagen_perfil"].'>
								<span class="profile-name">'.$fila2["nombre_usuario"].'</span>
								<p class="comment">'.$fila2["comentario"].'</p>
							  </div>';
                     }
			echo '</div>
						</div><br>';
          }
		}
	}
	/*SELECT a.codigo_usuario, a.comentario, b.nombre_usuario, b.url_imagen_perfil
FROM tbl_comentarios a
INNER JOIN tbl_usuarios b
ON a.codigo_usuario = b.codigo_usuario
WHERE codigo_publicacion = #CODIGO PUBLICACION RESPECTIVA#*/
?>