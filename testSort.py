data = {"cantidades":{"valores":["5","1"],"posiciones":[16,37]},"actores":{"valores":["Pablito"],"posiciones":[2]},"objetos":{"valores":["manzanas"],"posiciones":[18]},"acciones":{"valores":["tenía","comió","quedan"],"posiciones":[10,31,52]}}

# Crear una lista de tuplas (posición, categoría, valor)
items = []

for categoria, detalles in data.items():
    valores = detalles["valores"]
    posiciones = detalles["posiciones"]
    
    for valor, posicion in zip(valores, posiciones):
        items.append((posicion, categoria, valor))

# Ordenar la lista de tuplas por posición
items.sort()

# Imprimir los valores en orden
for posicion, categoria, valor in items:
    print(f"En la posición {posicion}: {categoria} - {valor}")