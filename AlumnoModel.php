<?php
class AlumnoModel
{
	private $pdo ;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=example', 'root', '') ;
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
		}
		catch(Exception $e)
		{
			die($e->getMessage()) ;
		}
	}

	public function Listar()
	{
		try
		{
			$result = array() ;

			$stm = $this->pdo->prepare("SELECT * FROM empleados") ;
			$stm->execute() ;

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Alumno() ;

				$alm->__SET('id', $r->id) ;
				$alm->__SET('nombre', $r->nombre) ;
				$alm->__SET('apellido', $r->apellido) ;
				$alm->__SET('sexo', $r->sexo) ;
				$alm->__SET('fechaNacimiento', $r->fechaNacimiento) ;

				$result[] = $alm ;
			}

			return $result ;
		}
		catch(Exception $e)
		{
			die($e->getMessage()) ;
		}
	}

	public function Obtener($id)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM empleados WHERE id = ?") ;

			$stm->execute(array($id)) ;

			$r = $stm->fetch(PDO::FETCH_OBJ) ;

			$alm = new Alumno() ;

			$alm->__SET('id', $r->id) ;
			$alm->__SET('nombre', $r->nombre) ;
			$alm->__SET('apellido', $r->apellido) ;
			$alm->__SET('sexo', $r->sexo) ;
			$alm->__SET('fechaNacimiento', $r->fechaNacimiento) ;

			return $alm ;
		} catch (Exception $e)
		{
			die($e->getMessage()) ;
		}
	}

	public function Eliminar($id)
	{
		try
		{
			$stm = $this->pdo->prepare("DELETE FROM empleados WHERE id = ?") ;

			$stm->execute(array($id)) ;
		} catch (Exception $e)
		{
			die($e->getMessage()) ;
		}
	}

	public function Actualizar(Alumno $data)
	{
		try
		{
			$sql = "UPDATE empleados SET
						nombre          = ?,
						apellido        = ?,
						sexo            = ?,
						fechaNacimiento = ?
				    WHERE id = ?" ;

			$this->pdo->prepare($sql)->execute(
				array(
					$data->__GET('nombre'),
					$data->__GET('apellido'),
					$data->__GET('sexo'),
					$data->__GET('fechaNacimiento'),
					$data->__GET('id')
					)
				) ;
		} catch (Exception $e)
		{
			die($e->getMessage()) ;
		}
	}

	public function Registrar(Alumno $data)
	{
		try
		{
		$sql = "INSERT INTO empleados (nombre, apellido, sexo, fechaNacimiento)
		        VALUES (?, ?, ?, ?)" ;

		$this->pdo->prepare($sql)->execute(
			array(
				$data->__GET('nombre'),
				$data->__GET('apellido'),
				$data->__GET('sexo'),
				$data->__GET('fechaNacimiento')
				)
			) ;
		} catch (Exception $e)
		{
			die($e->getMessage()) ;
		}
	}
}