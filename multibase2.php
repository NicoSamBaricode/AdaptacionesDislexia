<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertir Número</title>
    <style>
        .bar {
            margin: 2px;
            display: inline-block;
        }

        .centenas {
            background-color: red;
            height: 30px;
        }

        .decenas {
            background-color: green;
            height: 20px;
        }

        .unidades {
            background-color: blue;
            height: 10px;
        }
    </style>
</head>

<body>
    <div id="vector-container"></div>
    <input type="text" id="numeroInput" placeholder="Número">
    <button id="calcularButton">Calcular</button>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            class ConvertirNumero {
                representarVector(numero) {
                    const vectorContainer = $("#vector-container");
                    vectorContainer.html("");

                    if (numero < 0 || numero > 999) {
                        alert("Por favor, ingresa un número entre 0 y 999.");
                        return;
                    }

                    const numeroString = numero.toString();
                    for (let i = 0; i < numeroString.length; i++) {
                        const digit = parseInt(numeroString[i]);
                        const { color, altura } = this.obtenerColorAltura(i);
                        for (let j = 0; j < digit; j++) {
                            const bar = $("<div>").addClass("bar").css({
                                "width": "20px",
                                "height": altura + "px",
                                "background-color": color
                            });
                            vectorContainer.append(bar);
                        }
                    }
                }

                obtenerColorAltura(posicion) {
                    let color, altura;
                    if (posicion === 0) {
                        color = "red";
                        altura = 30;
                    } else if (posicion === 1) {
                        color = "green";
                        altura = 20;
                    } else {
                        color = "blue";
                        altura = 10;
                    }
                    return { color, altura };
                }

              
            }

            const convertirNumero = new ConvertirNumero();

            $("#calcularButton").click(function () {
                const numeroInput = $("#numeroInput").val();
                const numero = parseInt(numeroInput);
                if (!isNaN(numero)) {
                    convertirNumero.representarVector(numero);                    
                } else {
                    alert("Por favor, ingresa un número válido.");
                }
            });
        });
    </script>
</body>

</html>
