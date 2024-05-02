<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llamada a la API de Arasaac con PHP y jQuery</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <h1>Llamada a la API de Arasaac con PHP y jQuery</h1>

    <label for="palabra">Palabra:</label>
    <input type="text" id="palabra" name="palabra">
    <button type="button" onclick="buscarPictorama()">Buscar Pictorama</button>

    
    <div class="row"id="imageRow" >
        
    </div>

    <script>
        // Definir la función buscarPictorama en el ámbito global
        function buscarPictorama() {
            // Obtener la palabra ingresada por el usuario
            var palabra = $('#palabra').val();

            // Verificar que la palabra no esté vacía
            if (palabra.trim() !== '') {
                // Mostrar una alerta de carga
                Swal.fire({
                    title: 'Cargando...',
                    allowOutsideClick: false,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: 'ajaxBuscarPictorama.php',
                    method: 'POST',
                    data: {
                        palabra: palabra
                    },
                    dataType: 'json',
                    success: function(data) { // Verificar que hay elementos en la respuesta
                        if (data.length > 0) {
                            // Obtener el primer _id y mostrarlo
                            var primerId = data[0]._id;
                            

                            // Borrar la imagen anterior
                           // borrarImagen();

                            // Obtener el pictograma
                            obtenerPictorama(primerId);
                        } else {
                            $('#respuesta').html('<p>No se encontraron resultados</p>');
                            // Cerrar la alerta
                            Swal.close();
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                        $('#respuesta').html('<p>Error al buscar el pictograma</p>');
                        // Cerrar la alerta
                        Swal.close();
                    }
                });
            } else {
                alert('Ingresa una palabra para buscar.');
            }
        }

        // Función para obtener el pictograma por _id
        function obtenerPictorama(id) {
            $.ajax({
                url: 'ajaxObtenerPictorama.php',
                method: 'POST',
                data: {
                    pictogramId: id
                },
                dataType: 'json',
                success: function(response) {
                    // Verificar si la respuesta contiene la URL de la imagen
                    if (response && response.image) {
                        // Crear una nueva imagen en el documento
                        var img = new Image();

                        // Configurar el atributo src de la imagen con la URL recibida
                        img.src = response.image;

                        // Esperar a que la imagen se cargue antes de mostrarla
                        img.onload = function() {
                            // Crear un nuevo elemento de imagen de Bootstrap
                            var imgElement = $('<img>', {
                                'src': response.image,
                                'class': 'img-fluid', // Clase de Bootstrap para hacer que la imagen sea responsive
                                'style' : 'max-width:10rem'
                            });
                            var imgColumn = '<div class="col-md-2" id='+id+'></div>'
                            // Agregar la imagen al contenedor de la fila
                            $('#imageRow').append(imgColumn);
                            $('#'+id+'').append(imgElement);
                            // Cerrar la alerta
                            Swal.close();
                        };
                    } else {
                        console.error("La respuesta de la API no contiene la URL de la imagen esperada.");
                        // Cerrar la alerta
                        Swal.close();
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                    $('#respuesta').html('<p>Error al obtener el pictograma</p>');
                    // Cerrar la alerta
                    Swal.close();
                }
            });
        }

        // Función para borrar la imagen del contenedor
        function borrarImagen() {
            $('#imageRow').empty();
        }
    </script>

</body>

</html>
