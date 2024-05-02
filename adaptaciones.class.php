<?php
include_once('DbConnection.php');
include_once('logs.class.php');
$log = new log_class();

class contenidos extends conexionDb
{

	public function __construct()
	{

		parent::__construct();
	}


	// todo el arreglo completo  
	public function detalle($sql)
	{

		$query = $this->conexion->query($sql);

		$row = $query->fetch_array();

		return $row;
	}
	// cast
	public function escape_string($value)
	{

		return $this->conexion->real_escape_string($value);
	}
	// contador de usuarios

	// mostrar datos de la tabla de usuarios
	public function mostrarDatos()
	{
		$query = "SELECT descripcion FROM contenidos ORDER BY RAND() LIMIT 1";
		$result = $this->conexion->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		} else {
			echo "Base de datos vacia";
		}
	}
	public function mostrarDatosFiltrados($grado = null, $operacion = null)
	{
		if (($grado != null) && ($operacion != null)) {
			$query = "SELECT descripcion FROM contenidos where grado=$grado and operacion='$operacion' ORDER BY RAND() LIMIT 1";
		}else{
			$query = "SELECT descripcion FROM contenidos ORDER BY RAND() LIMIT 1";

		}
		//echo ($query);
		$result = $this->conexion->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		} else {
			echo "Base de datos vacia";
		}
	}
}
