<?php
try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['palabra'])) {
        // Obtener el ID del pictograma desde la solicitud AJAX
        $BuscarTexto = $_POST['palabra'];

        // URL de la API de Arasaac con el ID del pictograma
        $apiUrl = 'https://api.arasaac.org/api/pictograms/es/search/' . $BuscarTexto;

        // Realizar la solicitud a la API de Arasaac
        $result = @file_get_contents($apiUrl);

        // Verificar si hay un error en la solicitud
        if ($result === false) {
            throw new Exception('Error al realizar la solicitud a la API');
        }

        // Decodificar la respuesta JSON
        $response = json_decode($result, true);

        // Verificar si la respuesta es nula
        if ($response === null) {
            throw new Exception('La respuesta de la API es nula');
        }

        // Imprimir la respuesta
        echo json_encode($response);
    } else {
        // Manejar el caso en que la solicitud no sea válida
        echo json_encode(['error' => 'Solicitud no válida']);
    }
} catch (Exception $e) {
    // Manejar cualquier excepción capturada
    //echo json_encode(['error' => $e->getMessage()]);
    echo json_encode(["False"],true);
}
?>
