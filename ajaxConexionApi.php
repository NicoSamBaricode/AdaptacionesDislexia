<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['texto'])) {
    $url = 'http://127.0.0.1:8000/analizarOrdenado';

    // Datos que enviarás en la solicitud
    $data = array('texto' => $_POST['texto']);

    // Configuración de la solicitud
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => json_encode($data),
        ),
    );

    // Crear contexto para la solicitud
    $context  = stream_context_create($options);

    // Realizar la solicitud
    $result = file_get_contents($url, false, $context);

    header('Content-Type: application/json');
    echo $result;
}