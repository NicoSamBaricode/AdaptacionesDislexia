import spacy
import json

nlp = spacy.load("es_core_news_md")

text = "Carlos y santiago coleccionaron 123 cartas. Les regalaron 70 más. ¿Cuántas tienen en total?"

# Procesa el texto
doc = nlp(text)

# Inicializar listas para cantidades, objetos, acciones y pregunta
cantidades = []
objetos = []
acciones = []
actores = []
pregunta = []

# Dividir el texto en oraciones
oraciones = [oracion for oracion in doc.sents]

for i, oracion in enumerate(oraciones):
    print(f"\nOración {i + 1}: {oracion.text}")
    # Analizar cada oración
    for token in oracion:
        # Obtén el texto del token, el part-of-speech tag y el dependency label
        token_text = token.text
        token_pos = token.pos_
        token_dep = token.dep_
        # Esto es solo por formato
        print(f"{token_text:<12}{token_pos:<10}{token_dep:<10}")

        if token.pos_ == "PROPN" and (token.dep_ == "nsubj" or token.dep_ == "conj") :
            actores.append(token_text)

        # Agregar a cantidades si el token es un número
        if token.pos_ == "NUM":
            cantidades.append(token_text)

        # Agregar a objetos si el token es un sustantivo y su dependencia es "obj"
        if token.pos_ == "NOUN" and (token.dep_ == "obj" or token.dep_== "obl"):
            objetos.append(token_text)

        # Verificar si el token es un verbo y su dependencia es "ROOT"
        if token.pos_ == "VERB" and token.dep_ == "ROOT":
            # acciones.append(token.lemma_)  # Obtener el lema (forma base) del verbo
            acciones.append(token.text)  # Obtener el lema (forma base) del verbo
    # Verificar si la oración es una pregunta
    if "?" in oracion.text:
        # Analizar la pregunta
        for token in oracion:
            # Verificar si el token es un verbo
            if token.pos_ == "VERB":
                # pregunta.append(token.lemma_)  # Obtener el lema del verbo en la pregunta
                pregunta.append(token.text)  # Obtener el lema del verbo en la pregunta
for ent in doc.ents:
    # Imprime en pantalla el texto de la entidad y su etiqueta
    print(ent.text, ent.label_)
    # if ent.label_ == "PER":  # Verificar si la entidad es una persona
    #     actor = ent.text
    #     actores.append(actor)

# Crear un diccionario con los datos
data = {"cantidades": cantidades, "actores": actores, "objetos": objetos, "acciones": acciones, "pregunta": pregunta}

# Convertir el diccionario a formato JSON
json_data = json.dumps(data, ensure_ascii=False)

# Imprimir la frase tokenizada y el JSON
print("\nResumen:")
print("Frase tokenizada:", text)
print("Análisis JSON:", json_data)
