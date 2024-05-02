function cargarContenidoIndex() {
    $.ajax({
        url: 'contenido.php',
        type: 'GET',
        dataType: 'html',
        success: function(data) {
            $('#contenido').html(data);
        },
        error: function(error) {
            console.error('Error al cargar el contenido PHP:', error);
        }
    });
}

function cargarContenidoIngresar() {
    $.ajax({
        url: 'ingresoDatos.php',
        type: 'GET',
        dataType: 'html',
        success: function(data) {
            $('#contenido').html(data);
        },
        error: function(error) {
            console.error('Error al cargar el contenido PHP:', error);
        }
    });
}

function cargarPautas() {
    $.ajax({
        url: 'pautas.php',
        type: 'GET',
        dataType: 'html',
        success: function(data) {
            $('#contenido').html(data);
        },
        error: function(error) {
            console.error('Error al cargar el contenido PHP:', error);
        }
    });
}

function cargarGenerarContenido() {
    cargarContenidoIngresar()
    $.ajax({
        url: 'generarAutom.php',
        type: 'GET',
        dataType: 'html',
        success: function(data) {
            $('#contenedorIngresoDatos').empty();
            $('#contenedorIngresoDatos').html(data);
        },
        error: function(error) {
            console.error('Error al cargar el contenido PHP:', error);
        }
    });
}
function cargarTerminos() {
    cargarContenidoIngresar()
    $.ajax({
        url: 'terminosYCondiciones.php',
        type: 'GET',
        dataType: 'html',
        success: function(data) {
            $('#contenido').empty();
            $('#contenido').html(data);
        },
        error: function(error) {
            console.error('Error al cargar el contenido PHP:', error);
        }
    });
}