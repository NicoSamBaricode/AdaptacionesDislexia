<?php
include_once('DbConnection.php');
include_once('logs.class.php');
$log = new log_class();

class Usuario extends conexionDb
{

	public function __construct()
	{

		parent::__construct();
	}

	public function check_login($usuario, $pasword)
	{

		$sql = "SELECT * FROM usuarios WHERE alias = '$usuario' AND pasword = '$pasword' AND estado =!0";
		$query = $this->conexion->query($sql);

		if ($query->num_rows > 0) {
			$row = $query->fetch_array();
			return $row['id_usuario'];
		} else {
			return false;
		}
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
	public function cont_u()
	{

		$contador_u = "SELECT COUNT(*) total FROM usuarios";

		$query2 = $this->conexion->query($contador_u);

		if ($query2->num_rows > 0) {
			$fila = $query2->fetch_array();
			return $fila['total'];
		} else {
			return false;
		}
	}
	// mostrar datos de la tabla de usuarios
	public function mostrarDatos()
	{
		$query = "SELECT * FROM usuarios WHERE estado != 0";
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
	public function mostrarDatosOrdenado()
	{
		$query = "SELECT * FROM usuarios order by nombre WHERE estado != 0 ";
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
	public function mostrarDatosCompletos()
	{
		$query = "SELECT usuarios.interno,usuarios.id_usuario,usuarios.nombre,usuarios.apellido,usuarios.Fecha_nacimiento,usuarios.mail,usuarios.alias,usuarios.rol,usuarios.legajo,usuarios.gde,usuarios.estado,sector.nombre as NombreSector FROM `usuarios` left JOIN `sector` on sector.Sector_id = usuarios.sector_id WHERE estado != 0";
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
	// Insertar datos a la tabla de usuarios
	public function insertarDatos($post)
	{
		$log = new log_class();
		$nombre = $this->conexion->real_escape_string($_POST['nombre']);
		$apellido = $this->conexion->real_escape_string($_POST['apellido']);
		$contr = $this->conexion->real_escape_string($_POST['pasword']);
		$alias = $this->conexion->real_escape_string($_POST['alias']);
		$mail = $this->conexion->real_escape_string($_POST['mail']);
		$sector = $this->conexion->real_escape_string($_POST['sector']);
		$rol = $this->conexion->real_escape_string($_POST['rol']);
		$gde = $this->conexion->real_escape_string($_POST['gde']);
		$legajo = $this->conexion->real_escape_string($_POST['legajo']);
		$edificio = $this->conexion->real_escape_string($_POST['edificio']);
		$cuil = $this->conexion->real_escape_string($_POST['cuil']);
		$interno = $this->conexion->real_escape_string($_POST['interno']);
		$contratacion = $this->conexion->real_escape_string($_POST['contratacion']);
		$tng = $this->conexion->real_escape_string($_POST['tng']);
		$obs = $this->conexion->real_escape_string($_POST['obs']);
		$fecha_nacimiento = $this->conexion->real_escape_string($_POST['nacimiento']);

		$query = "INSERT INTO usuarios(nombre,apellido,mail,alias,rol,sector_id,pasword,legajo,gde,edificio,cuil,interno,contratacion,tng,obs,Fecha_nacimiento) VALUES ('$nombre','$apellido','$mail','$alias','$rol','$sector','$contr','$legajo','$gde','$edificio','$cuil','$interno','$contratacion','$tng','$obs','$fecha_nacimiento')";
		//echo ($query);
		$sql = $this->conexion->query($query);
		if ($sql == true) {
			echo "<script> alert('Se insertaron los datos con exito'); window.location='Lista_Usuarios.php'</script> ";
			$log->insertarLog($_SESSION['user'], "Se ha creado un nuevo Usuario");
		} else {
			echo "<script> alert('Fallo al insertar datos'); </script>";
			$log->insertarLog($_SESSION['user'], "Fallo al crear nuevo Usuario");
		}
	}
	//borrar usuarios
	public function borrar_usuario($id)
	{
		$log = new log_class();
		$query = "DELETE FROM usuarios WHERE id_usuario = '$id'";
		$sql = $this->conexion->query($query);
		if ($sql == true) {
			$log->insertarLog($_SESSION['user'], "Se borro el Usuario con id: " . $id);
			echo "<script> alert('Se borraron los datos con exito'); window.location='Lista_Usuarios.php'</script> ";
		} else {
			echo "<script> alert('Fallo al borrar datos'); </script>";
			$log->insertarLog($_SESSION['user'], "Fallo al borrar nuevo Usuario");
		}
	}
	// Saca datos de una sola fila filtrado por id
	public function mostrarFilaPorId($id)
	{
		$query = "SELECT * FROM usuarios WHERE id_usuario = '$id' AND estado != 0";
		$result = $this->conexion->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		} else {
			echo "<script> alert('No se encontro el registro de usuario'); </script>";
		}
	}
	public function mostrarFilaPorIdConNombre($id)
	{
		$query = "SELECT usuarios.edificio,usuarios.cuil,usuarios.interno,usuarios.contratacion,usuarios.tng,usuarios.estado,usuarios.obs, usuarios.sector_id,usuarios.id_usuario,usuarios.nombre,usuarios.pasword,usuarios.apellido,usuarios.mail,usuarios.alias,usuarios.rol,usuarios.legajo,usuarios.Fecha_nacimiento,usuarios.gde,usuarios.estado,sector.nombre as NombreSector FROM `usuarios` left JOIN `sector` on sector.Sector_id = usuarios.sector_id WHERE id_usuario = '$id' AND estado != 0";
		$result = $this->conexion->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		} else {
			echo "<script> alert('No se encontro el registro de usuario'); </script>";
		}
	}

	// actualiza datos en la tabla
	public function actualizarFila($postData)

	{
		$log = new log_class();
		$id = $this->conexion->real_escape_string($_POST['id_usuario']);
		$nombre = $this->conexion->real_escape_string($_POST['nombre']);
		$apellido = $this->conexion->real_escape_string($_POST['apellido']);
		$contr = $this->conexion->real_escape_string($_POST['pasword']);
		$alias = $this->conexion->real_escape_string($_POST['alias']);
		$mail = $this->conexion->real_escape_string($_POST['mail']);
		$rol = $this->conexion->real_escape_string($_POST['rol']);
		$gde = $this->conexion->real_escape_string($_POST['gde']);
		$legajo = $this->conexion->real_escape_string($_POST['legajo']);
		$estado = $this->conexion->real_escape_string($_POST['estado']);
		$sector = $this->conexion->real_escape_string($_POST['sector']);
		$edificio = $this->conexion->real_escape_string($_POST['edificio']);
		$cuil = $this->conexion->real_escape_string($_POST['cuil']);
		$interno = $this->conexion->real_escape_string($_POST['interno']);
		$contratacion = $this->conexion->real_escape_string($_POST['contratacion']);
		$tng = $this->conexion->real_escape_string($_POST['tng']);
		$obs = $this->conexion->real_escape_string($_POST['obs']);

		if (!empty($id) && !empty($postData)) {

			$query = "UPDATE usuarios SET edificio ='$edificio', cuil='$cuil', interno='$interno',contratacion='$contratacion',tng='$tng',obs='$obs', nombre = '$nombre', apellido = '$apellido', mail = '$mail', alias = '$alias', rol = '$rol', pasword = '$contr',legajo = '$legajo',gde = '$gde',estado = '$estado',sector_id = '$sector' WHERE id_usuario = '$id'";

			$sql = $this->conexion->query($query);
			if ($sql == true) {
				$log->insertarLog($_SESSION['user'], "Se ha modificado el Usuario con id: " . $id);
				echo "<script> alert('Se actualizaron los datos con exito'); window.location='Lista_Usuarios.php'</script> ";
			} else {
				$log->insertarLog($_SESSION['user'], "Fallo al modificar Usuario");
				echo "<script> alert('Fallo al actualizar datos');window.location='Lista_Usuarios.php'</script>  </script>";
			}
		}
	}
	public function SetEstadoInactivo($id){
		if (!empty($id) ) {
			$log = new log_class();
			$query = "UPDATE usuarios SET estado = 0 WHERE id_usuario = '$id'";

			$sql = $this->conexion->query($query);
			if ($sql == true) {
				$log->insertarLog($_SESSION['user'], "Se ha modificado el Usuario con id: " . $id);
				echo "<script> alert('Se actualizaron los datos con exito'); window.location='Lista_Usuarios.php'</script> ";
			} else {
				$log->insertarLog($_SESSION['user'], "Fallo al modificar Usuario");
				echo "<script> alert('Fallo al actualizar datos');window.location='Lista_Usuarios.php'</script>  </script>";
			}
		}
	}
	// actualiza datos en la tabla
	public function actualizarDatosParaUsuario($postData)

	{
		$log = new log_class();
		$id = $this->conexion->real_escape_string($_POST['id_usuario']);

		$contr = $this->conexion->real_escape_string($_POST['pasword']);

		$mail = $this->conexion->real_escape_string($_POST['mail']);

		$gde = $this->conexion->real_escape_string($_POST['gde']);
		$legajo = $this->conexion->real_escape_string($_POST['legajo']);
		$edificio = $this->conexion->real_escape_string($_POST['edificio']);
		$cuil = $this->conexion->real_escape_string($_POST['cuil']);
		$interno = $this->conexion->real_escape_string($_POST['interno']);
		$contratacion = $this->conexion->real_escape_string($_POST['contratacion']);
		$tng = $this->conexion->real_escape_string($_POST['tng']);
		$obs = $this->conexion->real_escape_string($_POST['obs']);
		$nacimiento = $this->conexion->real_escape_string($_POST['nacimiento']);



		if (!empty($id) && !empty($postData)) {

			$query = "UPDATE usuarios SET edificio ='$edificio', cuil='$cuil', interno='$interno',contratacion='$contratacion',tng='$tng',obs='$obs', mail = '$mail', pasword = '$contr',legajo = '$legajo',gde = '$gde', Fecha_nacimiento = '$nacimiento' WHERE id_usuario = '$id'";

			$sql = $this->conexion->query($query);
			if ($sql == true) {
				$log->insertarLog($_SESSION['user'], "Se ha modificado el Usuario con id: " . $id);
				echo "<script> alert('Se actualizaron los datos con exito'); window.location='panel.php'</script> ";
			} else {
				$log->insertarLog($_SESSION['user'], "Fallo al modificar Usuario");
				echo "<script> alert('Fallo al actualizar datos');window.location='panel.php'</script>  </script>";
			}
		}
	}

	public function mostrarDatosBusqueda($query)
	{

		$result = $this->conexion->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		} else {

			echo "No se encontraron datos";

			return array();
		}
	}
	public function autorizacionDolar()
	{
		$aut="Authorization: BEARER eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE3MDcyMjk4MjUsInR5cGUiOiJleHRlcm5hbCIsInVzZXIiOiJuaWNvbGFzLnNhbW1hcmNvQGdtYWlsLmNvbSJ9.rNJrvoacFVm2l5U_tNlirx96DN5wcHxI2gg0zMKZWQWoC9RPkRLx2tBt-ikWcDJLg0W0jBoUHjcvDiqjAgkPeA";
		return $aut;
		
	}
}
