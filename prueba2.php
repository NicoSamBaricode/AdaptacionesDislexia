<?php
function enviarTexto($textoEntrada) {
    // URL de tu API REST
    $url = 'http://127.0.0.1:8000/analizar';

    // Datos que enviarás en la solicitud
    $data = array('texto' => $textoEntrada);

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

    // Decodificar la respuesta JSON
    $response = json_decode($result, true);

    // Imprimir la respuesta
    print_r($response);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['texto'])) {
    $textoEntrada = $_POST['texto'];
    echo '<div>Esperando respuesta...</div>';
    enviarTexto($textoEntrada);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interacción con API REST desde PHP</title>
</head>
<body>

    <form method="post" action="">
        <textarea name="texto" rows="4" cols="50"></textarea><br>
        <button type="submit">Enviar Texto</button>
    </form>

</body>
</html>
