<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dibujar vectores</title>
</head>
<body>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.12.0/p5.min.js"></script>

  <script>
    function dibujarVector(numero) {
      // Obtener la longitud del vector
      let longitud = numero.toString().length;

      // Crear un lienzo
      let canvas = document.createElement("canvas");
      canvas.width = longitud * 100;
      canvas.height = 100;
      document.body.appendChild(canvas);

      // Crear un contexto de dibujo
      let ctx = canvas.getContext("2d");

      // Dibujar los vectores
      for (let i = 0; i < longitud; i++) {
        // Calcular la longitud del vector
        let longitudVector = numero % 10;

        // Dibujar el vector
        ctx.beginPath();
        ctx.moveTo(i * 100, 0);
        ctx.lineTo(i * 100, longitudVector * 10);
        ctx.stroke();

        // Actualizar el número
        numero = Math.floor(numero / 10);
      }
    }

    // Obtener el número del usuario
    let numero = prompt("Ingrese un número:");

    // Dibujar el vector
    dibujarVector(numero);
  </script>

</body>
</html>
