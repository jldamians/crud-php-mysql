<?php
class Alumno
{
	private $id ;
	private $nombre ;
	private $apellido ;
	private $sexo ;
	private $fechaNacimiento ;

	public function __GET($k) { return $this->$k ; }
	public function __SET($k, $v) { return $this->$k = $v ; }
}