<?php
// Este archivo debe estar ubicado correctamente en el servidor.
include_once('adaptaciones.class.php');

header('Content-Type: application/json'); // Establecer el tipo de contenido como JSON

// Iniciar la clase de contenidos
$contenidoAAdaptar = new contenidos();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $grado = isset($_POST['grado']) ? $_POST['grado'] : '';
    $operacion = isset($_POST['operacion']) ? $_POST['operacion'] : '';

    // Puedes hacer filtrado aquí según los parámetros
    $filas = $contenidoAAdaptar->mostrarDatosFiltrados($grado, $operacion);

    // Suponiendo que los datos se acumulan en $filas
    $datos = [];
    foreach ($filas as $fila) {
        $datos[] = $fila['descripcion']; // Asegúrate de que 'descripcion' es la columna correcta
    }

    $respuesta = [
        'grado' => $grado,
        'operacion' => $operacion,
        'contenido' => implode("\n", $datos) // Convertir las descripciones en un solo string
    ];

    echo json_encode($respuesta);
} else {
    echo json_encode(['error' => 'Método no permitido']);
}
?>
