<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interacción con API REST desde PHP</title>
    <!-- Agregar SweetAlert y jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

    <form id="miFormulario">
        <textarea id="texto" name="texto" rows="4" cols="50">Carlos y Santiago coleccionaron 101 figuritas. Les regalaron 70 más. ¿Cuántas tienen en total?</textarea><br>
        <button type="button" onclick="enviarFormulario()">Enviar Texto</button>
    </form>

    <div id="respuesta"></div>

    <script>
        function enviarFormulario() {
            // Mostrar mensaje de espera
            Swal.fire({
                title: 'Esperando respuesta...',
                onBeforeOpen: () => {
                    Swal.showLoading();
                }
            });

            // Obtener el texto del campo de entrada
            var textoEntrada = $('#texto').val();

            // Realizar la solicitud AJAX a ajaxconexionapi.php
            $.ajax({
                type: 'POST',
                url: 'ajaxconexionapi.php',
                data: { texto: textoEntrada },
                dataType: 'json',
                success: function(data) {
                    // Cerrar mensaje de espera
                    Swal.close();
                    console.log(data)
                    // Mostrar respuesta
                   
                    $('#respuesta').html(JSON.stringify(data));
                    // $('#respuesta').html(data.acciones[0]);
                },
                error: function(error) {
                    console.error('Error:', error);
                    Swal.close();
                }
            });
        }
    </script>

</body>
</html>
