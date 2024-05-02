<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pictogramId'])) {
    // Obtener el ID del pictograma desde la solicitud AJAX
    $pictogramId = $_POST['pictogramId'];

    // URL de la API de Arasaac con el ID del pictograma
    $apiUrl = 'https://api.arasaac.org/api/pictograms/' . $pictogramId;

    // Realizar la solicitud a la API de Arasaac
    $result = file_get_contents($apiUrl);

    // Obtener los encabezados HTTP de la respuesta
    $headers = $http_response_header;

    // Inicializar la variable para almacenar la URL de la imagen
    $imageUrl = null;

    // Buscar el encabezado 'Content-Type' que indica que el contenido es una imagen
    foreach ($headers as $header) {
        if (strpos($header, 'Content-Type: image/') !== false) {
            // Si se encuentra, asumir que la respuesta es una imagen y almacenar la URL
            $imageUrl = $apiUrl;
            break;
        }
    }

    // Imprimir la URL de la imagen o un mensaje de error
    if ($imageUrl !== null) {
        // Devolver la URL de la imagen como JSON
        echo json_encode(['image' => $imageUrl]);
    } else {
        echo json_encode(['error' => 'No se pudo encontrar la URL de la imagen en la respuesta']);
    }
} else {
    // Manejar el caso en que la solicitud no sea válida
    echo json_encode(['error' => 'Solicitud no válida']);
}
?>
