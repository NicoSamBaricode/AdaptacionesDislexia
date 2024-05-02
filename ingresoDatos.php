<div class="row">
    <div class="col-xl-12">
        <div class="card mt-4">
            <div class="card-header">
                <i class="fas fa-chart-area me-1"></i>
                Adaptacion de contenidos
            </div>
            <div class="card-body">
                <div class="div " id="contenedorIngresoDatos">
                    <div class="alert alert-warning" role="alert">
                        Para realizar la adaptacion correspondiente ingrese un
                        problema matematico para alumnos con dislexia del primer ciclo..
                    </div>

                    <textarea class="form-control" rows="4" id="contenidoParaAdaptar" name="contenidoParaAdaptar">Carlos y santiago coleccionaron 123 cartas. Les regalaron 70 más. ¿Cuántas tienen en total?</textarea>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col" style="max-width: fit-content;">
                        <button class="btn btn-primary" id="botonAdaptar">
                            Adaptar contenidos
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card mt-4">
            <div class="card-header">
                <i class="fas fa-chart-area me-1"></i>
                Contenido Adaptado.
            </div>
            <div class="card-body" id="imprimirContenido">
                <div class="row">
                    <div class="col">
                        <p id="contenidoOpenDislexyc"></p>
                    </div>
                </div>
                <div class="row" id="bodyAdaptacion">

                </div>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col" style="max-width: fit-content;">
                        <button class="btn btn-secondary imprimir">
                            Imprimir <i class="fas fa-print fa-fw"></i>
                        </button>
                    </div>
                    <div class="col" style="max-width: fit-content;">
                        <button class="btn btn-secondary enviar">
                            Enviar <i class="fas fa-envelope-open-text fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <p id="respuesta"></p>
    </div>
</div>
<script src="..//TrabajoFinal/js/adaptarContenido.js"></script>
<script src="..//TrabajoFinal/js/gestorImpresion.js"></script>
<script>
    $(document).ready(function() {
        $("#botonAdaptar").on("click", function(event) {
            $('#bodyAdaptacion').html("");
            event.preventDefault();
            var adaptadorContenido = new AdaptadorContenido();
            adaptadorContenido.adaptarContenido();
            adaptadorContenido = null;
        });
        $(".imprimir").on("click", function(event) {
            event.preventDefault();
            imprimirDiv()

        });
    });
</script>