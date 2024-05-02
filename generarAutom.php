<?php include_once('adaptaciones.class.php');


?>
<div class="alert alert-warning" role="alert">
    Para realizar la adaptacion correspondiente primero genere automaticamente un
    problema matematico para alumnos con dislexia del primer ciclo..
</div>
<div class="row mb-2">

    <div class="col">
        <select class="form-control" id="selectGrado">
            <option value="">Seleccionar Grado</option>
            <option value="1">1°</option>
            <option value="2">2°</option>
            <option value="3">3°</option>
        </select>
    </div>
    <div class="col">
        <select class="form-control" id="selectOperacion">
            <option>Operación</option>
            <option value="Suma">Suma</option>
            <option value="Resta">Resta</option>
            <option value="multiplicacion">Multiplicación</option>
            <option value="division">División</option>
        </select>
    </div>
    <div class="col" style="max-width: fit-content;">
        <button class="btn btn-secondary" id="random">
            Generar contenidos Automaticamente
        </button>
    </div>
</div>
<textarea class="form-control" rows="4" id="contenidoParaAdaptar" name="contenidoParaAdaptar"></textarea>
<script>
    $(document).ready(function() {
        $('#selectOperacion').hide(); // Ocultar inicialmente el select de operación

        $('#selectGrado').change(function() {
            var gradoSeleccionado = $(this).val();
            $('#selectOperacion').show().html('<option>Operación</option>'); // Reset y mostrar el select de operación

            if (gradoSeleccionado === "1" || gradoSeleccionado === "2") {
                $('#selectOperacion').append('<option value="Suma">Suma</option><option value="Resta">Resta</option>');
            } else if (gradoSeleccionado === "3") {
                $('#selectOperacion').append('<option value="Suma">Suma</option><option value="Resta">Resta</option><option value="Multiplicación">Multiplicación</option><option value="División">División</option>');
            }
        });

        $("#random").on("click", function(event) {
            event.preventDefault();
            var grado = $('#selectGrado').val();
            var operacion = $('#selectOperacion').val();
            Swal.fire({
                title: 'Esperando respuesta...',
                onBeforeOpen: () => {
                    Swal.showLoading();
                }
            });
            $.ajax({
                url: 'ajax-procesar-filtros.php',
                type: 'POST',
                data: {
                    grado: grado,
                    operacion: operacion
                },
                dataType: 'json',
                success: function(response) {
                    Swal.close();
                    $('#contenidoParaAdaptar').val(response.contenido); // Actualizar el textarea
                },
                error: function(xhr, status, error) {
                    Swal.close();
                    console.error(xhr.responseText); // Imprimir el error en la consola del navegador
                    alert('Error al procesar la solicitud: ' + error); // Mostrar un mensaje de error al usuario
                }
            });
        });

    });
</script>