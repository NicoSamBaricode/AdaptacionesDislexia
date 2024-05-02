
        // function imprimirDiv() {
        //     var contenidoDiv = document.getElementById('imprimirContenido').innerHTML;
        //     var ventanaImpresion = window.open('', '_blank');
        //     ventanaImpresion.document.write('<html><head><title>Adaptacion:</title></head><body>');
        //     ventanaImpresion.document.write('<link rel="stylesheet" type="text/css" href="../TrabajoFinal/css/styles.css">');
        //     ventanaImpresion.document.write(contenidoDiv);
        //     ventanaImpresion.document.write('</body></html>');
        //     ventanaImpresion.document.close();
        //     ventanaImpresion.print();
        // }
        function imprimirDiv() {
            var contenidoDiv = document.getElementById('bodyAdaptacion').innerHTML; // Asegúrate de que esto apunte al contenedor correcto
            var ventanaImpresion = window.open('', '_blank');
        
            ventanaImpresion.document.write('<html><head><title>Adaptacion:</title>');
            ventanaImpresion.document.write('<link rel="stylesheet" type="text/css" href="../TrabajoFinal/css/styles.css">');
            ventanaImpresion.document.write('</head><body>');
            ventanaImpresion.document.write(contenidoDiv);
            ventanaImpresion.document.write('</body></html>');
        
            ventanaImpresion.document.close(); // Cerrar el documento para streaming
        
            // Asegúrate de que la ventana ha cargado antes de imprimir
            ventanaImpresion.onload = function() {
                ventanaImpresion.print();
                ventanaImpresion.close();
            };
        }