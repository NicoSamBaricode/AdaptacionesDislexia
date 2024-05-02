from fastapi import FastAPI, HTTPException
from pydantic import BaseModel
import spacy
from typing import List
app = FastAPI()
nlp = spacy.load("es_core_news_md")

class TextoEntrada(BaseModel):
    texto: str

@app.get("/")
def read_root():
    return {"mensaje": "¡Hola, Bienvenidos a mi api-rest de analisis de texto natural!"}


from fastapi import FastAPI
from pydantic import BaseModel

app = FastAPI()

class TextoEntrada(BaseModel):
    texto: str


@app.post("/analizarOrdenado")
def analizar_texto(texto_entrada: TextoEntrada):
    text = texto_entrada.texto

    doc = nlp(text)

    # Inicializar diccionarios para cantidades, objetos, acciones y actores
    cantidades = {"valores": [], "posiciones": []}
    objetos = {"valores": [], "posiciones": []}
    acciones = {"valores": [], "posiciones": []}
    actores = {"valores": [], "posiciones": []}

    # Mantener un índice para rastrear la posición actual en el texto original
    posicion_actual = 0

    # Analizar todo el texto
    for token in doc:
        # Obtén el texto del token, el part-of-speech tag y el dependency label
        token_text = token.text
        # Obtén la posición del token en el texto original
        token_inicio = posicion_actual + token.idx

        if token.pos_ == "PROPN" and (token.dep_ == "nsubj" or token.dep_ == "conj"):
            actores["valores"].append(token_text)
            actores["posiciones"].append(token_inicio)

        # Agregar a cantidades si el token es un número
        if token.pos_ == "NUM":
            cantidades["valores"].append(token_text)
            cantidades["posiciones"].append(token_inicio)

        # Agregar a objetos si el token es un sustantivo y su dependencia es "obj"
        if token.pos_ == "NOUN" and (token.dep_ == "obj" or token.dep_ == "obl"):
            objetos["valores"].append(token_text)
            objetos["posiciones"].append(token_inicio)

        # Verificar si el token es un verbo y su dependencia es "ROOT"
        if token.pos_ == "VERB":
            acciones["valores"].append(token.lemma_)
            acciones["posiciones"].append(token_inicio)

    # Crear un diccionario con los datos
    data = {"cantidades": cantidades, "actores": actores, "objetos": objetos, "acciones": acciones}
    items = []

    for categoria, detalles in data.items():
        valores = detalles["valores"]
        posiciones = detalles["posiciones"]
    
        for valor, posicion in zip(valores, posiciones):
            items.append((posicion, categoria, valor))

    # Ordenar la lista de tuplas por posición
    items.sort()

    # Retornar los valores ordenados
    resultados = [{"posicion": posicion, "categoria": categoria, "valor": valor} for posicion, categoria, valor in items]
    return resultados

@app.post("/analizar")
def analizar_texto(texto_entrada: TextoEntrada):
    text = texto_entrada.texto

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
      
        # Analizar cada oración
        for token in oracion:
            # Obtén el texto del token, el part-of-speech tag y el dependency label
            token_text = token.text          

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

    # Crear un diccionario con los datos
    data = {"cantidades": cantidades, "actores": actores, "objetos": objetos, "acciones": acciones, "pregunta": pregunta}

     
    return data

@app.post("/TestingAnalizar")
def analizar_texto(texto_entrada: TextoEntrada):
    text = texto_entrada.texto

    doc = nlp(text)

    # Inicializar listas para cantidades, objetos, acciones y pregunta
    cantidades = []
    objetos = []
    acciones = []
    actores = []
    pregunta = []
    
    # Inicializar lista para almacenar la información de cada token
    info_tokens = []

    # Dividir el texto en oraciones
    oraciones = [oracion.text for oracion in doc.sents]  # Convertir a texto

    for i, oracion in enumerate(doc.sents):
        # Agregar información de la oración
        info_tokens.append(f"\nOración {i + 1}: {oracion.text}")

        # Analizar cada oración
        for token in oracion:
            # Obtén el texto del token, el part-of-speech tag y el dependency label
            token_text = token.text
            token_pos = token.pos_
            token_dep = token.dep_
            # Agregar información de cada token
            info_tokens.append(f"{token_text:<12}{token_pos:<10}{token_dep:<10}")

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

    # Agregar la información de los tokens al diccionario
    data = {
        "oraciones": oraciones,
        "cantidades": cantidades,
        "actores": actores,
        "objetos": objetos,
        "acciones": acciones,
        "pregunta": pregunta,
        "info_tokens": info_tokens  # Agregar la lista de información de tokens
    }
    
    return data
if __name__ == '__main__':
    import uvicorn

    uvicorn.run(app, host="127.0.0.1", port=8000, reload=True)
