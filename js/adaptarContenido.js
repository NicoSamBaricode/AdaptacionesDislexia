class ConvertirNumero {
    constructor() {
        this.vectorContainer = $("#bodyAdaptacion");
    }

    numeroAMultibase(numero) {

        const numeroString = numero.toString();
        const centenas = Math.floor(numero / 100);
        const residuoDecenas = numero % 100;
        const decenas = Math.floor(residuoDecenas / 10);
        const unidades = residuoDecenas % 10;

        for (let j = 0; j < centenas; j++) {
            const bar = $("<div>").addClass("col centenas bar")
            this.vectorContainer.append(bar);
        }
        for (let j = 0; j < decenas; j++) {
            const bar = $("<div>").addClass("col decenas bar")
            this.vectorContainer.append(bar);
        }
        for (let j = 0; j <unidades; j++) {
            const bar = $("<div>").addClass("col unidades bar")
            this.vectorContainer.append(bar);
        }

    }

  
}

class AdaptadorContenido {
    constructor() {
        this.convertirNumero = new ConvertirNumero();
    }

    async adaptarContenido() {
        const contenidoParaAdaptar = $("#contenidoParaAdaptar").val();
        $("#contenidoOpenDislexyc").text(contenidoParaAdaptar).css("font-family", "openDislexyc");
        await this.interpretadorLenguajeNatural();
    }

    interpretadorLenguajeNatural() {
        // Mostrar mensaje de espera
        Swal.fire({
            title: 'Esperando respuesta...',
            onBeforeOpen: () => {
                Swal.showLoading();
            }
        });

        // Obtener el texto del campo de entrada
        const textoEntrada = $('#contenidoParaAdaptar').val();

        // Realizar la solicitud AJAX a ajaxconexionapi.php
        $.ajax({
            type: 'POST',
            url: 'ajaxConexionApi.php',
            data: {
                texto: textoEntrada
            },
            dataType: 'json',
            success: (data) => {
                // Cerrar mensaje de espera
                Swal.close();
                console.log(data);

                // Llamada a la función principal
                this.procesarDatos(data);
            },
            error: (error) => {
                console.error('Error:', error);
                Swal.close();
            }
        });
    }

    async procesarDatos(data) {
        Swal.fire({
            title: 'Cargando...',
            allowOutsideClick: false,
            onBeforeOpen: () => {
                Swal.showLoading();
            }
        });
        for (let i = 0; i < data.length; i++) {
            if (data[i].categoria == "actores") {
                await this.obtenerPictorama(36935);
            } else {
                const valor = data[i].valor;
                const id = await this.buscarPictorama(valor);
                if (id) {
                    await this.obtenerPictorama(id);
                }
            }

            // Este bloque se ejecutará al final del bucle e imprime el igual (en teoria)
            // if (i === data.length - 1) {
            //     await this.obtenerPictorama(3423);
            //     Swal.close();
            // }
        }
    }

    buscarPictorama(palabra) {
        return new Promise((resolve, reject) => {
            console.log(palabra)
            // Verificar que la palabra no esté vacía
            if (palabra.trim() !== '') {
                if (isNaN(palabra)) {
                    $.ajax({
                        url: 'ajaxBuscarPictorama.php',
                        method: 'POST',
                        data: {
                            palabra: palabra
                        },
                        dataType: 'json',
                        success: (data) => {
                            if (data.length > 0) {
                                const primerId = data[0]._id;
                                // Resuelve la promesa con el primer ID
                                resolve(primerId);
                            } else {
                                // Rechaza la promesa con un mensaje de error
                                reject('No se encontraron resultados');
                            }
                        },
                        error: (error) => {
                            console.error('Error:', error);
                            reject('Error al buscar el pictograma');
                        },
                        complete: () => {

                        }
                    });
                } else {
                    var convertirNumero = new ConvertirNumero();
                    const numero = parseInt(palabra);
                    convertirNumero.numeroAMultibase(numero);
                    convertirNumero=null;
                    resolve();
                }
            } else {
                // Rechaza la promesa con un mensaje de error
                reject('Ingresa una palabra para buscar.');
            }
        });
    }

    obtenerPictorama(id) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: 'ajaxObtenerPictorama.php',
                method: 'POST',
                data: {
                    pictogramId: id
                },
                dataType: 'json',
                success: (response) => {
                    if (response && response.image) {
                        const img = new Image();
                        img.src = response.image;

                        img.onload = function() {
                            const imgElement = $('<img>', {
                                'src': response.image,
                                'class': 'img-fluid',
                                'style': 'max-width:10rem'
                            });
                            const imgColumn = '<div class="col" id=' + id + '></div>';

                            $('#bodyAdaptacion').append(imgColumn);
                            $('#' + id + '').append(imgElement);
                            // Resuelve la promesa después de agregar la imagen
                            resolve();
                        };
                    } else {
                        console.error("La respuesta de la API no contiene la URL de la imagen esperada.");
                        reject('Error al obtener el pictograma');
                    }
                },
                error: (error) => {
                    console.error('Error:', error);
                    reject('Error al obtener el pictograma');
                },
                complete: () => {
                    // Cierra la alerta después de completar la operación

                }
            });
        });
    }
}