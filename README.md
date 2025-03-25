Título
Sistema asistencial de adaptaciones matemáticas para alumnos con dislexia.

Introducción
Las dificultades específicas de aprendizaje (DEA) son alteraciones de base neurobiológica que afectan a los procesos cognitivos implicados en la lectura, la escritura y/o el cálculo aritmético. Dentro de las DEA se encuentran la dislexia, la discalculia y la disgrafia. En el presente trabajo se hará foco en la primera de ellas. Estas dificultades pueden tener un impacto significativo en el rendimiento académico de los alumnos, por lo que es importante que reciban las adaptaciones metodológicas necesarias. Debido a que adaptar contenidos puede ser una tarea compleja y laboriosa, que requiere de tiempo y conocimientos especializados, este sistema busca asistir al docente en la realización de dichas adaptaciones. Si bien este sistema puede escalarse a otras instituciones, se centrará en prestar asistencia al colegio Woodville de la ciudad de San Carlos de Bariloche, específicamente a docentes de primer ciclo del nivel primario.

Antecedentes
Antes de que los profesionales comenzaran a diagnosticar la dislexia, se consideraban faltos de estudio, desatentos, o de baja capacidad intelectual a alumnos que en realidad padecían esta condición. Hoy se sabe cómo detectar la dislexia a partir de los 4 o 5 años y se puede diagnosticar en primer grado. 
Las primeras “baterías” de evaluación de los procesos de lectoescritura datan del 1990, año en el que se publicó el “PROLEC- Evaluación de Procesos Lectores” (Cuetos Vega, F., Ruano Arriola, M. J., y Paz Rodríguez, M., 2007, PROLEC-R: Batería de Evaluación de los Procesos Lectores, revisada. Madrid: TEA Ediciones.). Sin embargo, en Argentina no ha sido hasta el año 2016 con la ley 27.306 que se declaró de interés nacional el abordaje integral e interdisciplinario de los sujetos que presentan dificultades específicas del aprendizaje. Dentro de los distintos aspectos que aborda esta ley, podemos destacar el artículo 6°, el cual destaca la importancia de la adaptación curricular (Argentina.gob.ar. (s.f.). Ley 27306/2016 - Ley Nacional de Educación. Recuperado de https://www.argentina.gob.ar/normativa/nacional/ley-27306-267234/texto). 

Descripción del área problemática
En la actualidad, se considera que aproximadamente el 8% de la población tiene dislexia (Pearson, R.,2017, Dislexia, Una forma diferente de leer, p. 21).    
Las adaptaciones para niños con dislexia son múltiples, entre ellas, la utilización de apoyo visual para favorecer la comprensión del texto escrito (Pearson, R.,2017, Dislexia, Una forma diferente de leer, p. 184).	 
Si bien existen diversos softwares de asistencia a las personas con dislexia (Voice Dream Reader, Grammarly, Reading Assistant, entre otros), actualmente no existe una herramienta de software que ayude al docente en la realización de las adaptaciones, y se realizan de manera manual en base a su conocimiento, sugerencias de profesionales que atienden de forma particular a sus alumnos o intervenciones de los psicopedagogos escolares. 

Justificación
En la actualidad, el Ministerio de Educación busca garantizar la educación para todos. Es por esto que hoy en día las aulas son “heterogéneas”, es decir, que hay multiplicidad de formas de aprender por parte de los niños, lo cual implica que el docente deba adoptar distintas formas de enseñar. En línea con lo solicitado por el Ministerio, el colegio Woodville busca que la educación sea personalizada, es decir, que no pretenda que todos los estudiantes aprendan lo mismo, al mismo tiempo y de la misma forma. 
En el marco del actual paradigma de la educación inclusiva a la que aspira el colegio, el docente atiende a múltiples tareas. Sumado a las tareas típicamente desarrolladas por los docentes (por ejemplo, reuniones de padres, cuidado del alumnado, intervención ante conflictos interpersonales, etc.), hoy en día se le solicita realizar una planificación individualizada para cada uno de sus alumnos entre los que se encuentran los niños con dislexia. 
A través de su asistencia, este sistema brindará beneficios para distintos miembros de la comunidad educativa. Los mismos serán enumerados a continuación:
Reducción de tiempos de planificación del docente.
Estandarización de adaptaciones matemáticas.
Transformación digital de los procesos de negocio.
Reducción de márgenes de error.
Reducción de tiempo de supervisión por parte de la psicopedagoga del colegio. 
Inclusión educativa del alumno.
Interpretación de texto y transformación a imágenes mediante inteligencia artificial (IA).
Generación aleatoria con IA de situaciones problemáticas adaptadas. 
Descripción de estrategias generales para el trabajo con niños con dislexia.
Conversión de números a multibase virtual.

Objetivo General Del Proyecto
Desarrollar un sistema multiplataforma de acceso libre, que asista al usuario en las adaptaciones metodológicas para niños con dislexia que asistan al primer ciclo de primaria.

Objetivos Específicos Del Proyecto
Comprender los desafíos y oportunidades que enfrentan los docentes al adaptar su enseñanza para niños con dislexia 
Identificar las dificultades específicas de lectura y escritura que presentan los niños con dislexia. 
Identificar las adaptaciones metodológicas que pueden ayudar a los niños con dislexia a superar estas dificultades.
Desarrollar un sistema multiplataforma de acceso libre que implemente una variedad de adaptaciones metodológicas para niños con dislexia del primer ciclo de primaria.
Desarrollar un interpretador de lenguaje natural que pueda generar imágenes de objetos, personas y conceptos descriptos en texto.
Elaborar un generador aleatorio de problemas matemáticos adaptados a niños con dislexia basados en Problemat – 1, Problemat – 2 y Problemat – 3 (Olaya Ruano, P., 2002, Problemat 1, 2 y 3, Ed. Promolibro).


Instructivo de implementación sistema Adaptaciones Para niños con Dislexia.
• Descargar toda la carpeta de Trabajo Final incluida en esta carpeta.
• Descargar e Instalar Xampp. https://www.apachefriends.org/es/index.html
• Descomprimir la carpeta de Trabajo final en la carpeta htdocs de Xampp
• Descargar e Instalar VsCode https://code.visualstudio.com/
• Descargar e Instalar Python. https://www.python.org/
• Descargar e Instalar Spacy pip install spaCy
• Descargar e Instalar modelo pre entrenado de spaCy: python -m spacy download
en_core_web_md
• Descargar e Instalar Fast api y su servidor Uvicorn pip install fastapi, pip install
uvicorn
• Ejecutar python -m uvicorn main:app –reload en consola para arrancar la api rest.
• Iniciar servicios de apache y BD de Xampp.
• Ingresar a MySQL Admin y crear una BD llamada “adaptaciones”
• Ejecutar el query guardado en adaptaciones.sql
• Ingresar en el navegador web http://localhost/TrabajoFinal/index.php
Una vez dentro, al ingresar a adaptar contenido->ingresar contenido, si escribe un
problema tipo, y selecciona en realizar adaptación, verá como se ira imprimiendo las
imágenes. Los números se representan en multibase lo que significa que para cada decena
centena y unidad tienen un color y tamaño correspondientes.
En el apartado de generar automáticamente levanta de la bd problemas tipo de forma
aleatoria.
Y en ayuda->ver tips y pautas se genera una lista con distintas directivas.
Por ultimo si se genero correctamente una adaptación, se puede imprimir lo generado.
