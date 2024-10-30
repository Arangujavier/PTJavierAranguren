# PTJavierAranguren ##
## Prueba técnica de Tesicnor ##
### Despliege ###
El despliege se realiza sobre la plataforma Xampp.
Esta dispone de distintas fucionalidades, siendo la usada en este caso la de Apache, esta nos permite crear un servidor web donde ejecutar el programa.
### Instalación ###
Se debe disponer de docker para realizar la instalación:
1. Clonar el repositorio.
2. Acceder al repositorio descargado.
3. Abrir consola en este directorio.
4. Ejecutar en la consola: `docker build -t pt_tesicnor .`
5. Ejecutar en la consola: `docker run -p 8080:80 pt_tesicnor`
6. Acceder a la siguiente url: http://localhost:8080/Frontend.html
### Tecnologías ###
Se utilizan las siguientes:
  - Docker
  - Git, gitHub.
  - Php, javascript, html, css, sql.
  - Composer-> PhpUnit.
### Etapas ###

1. Obtener de la API toda la información relativa a las películas de &quot;Star Wars&quot;.
   
2. De la información obtenida, quedarse con los siguientes datos:
  - 2.1 ID en IMDB
  - 2.2 Título 
  - 2.3 Año 
  - 2.4 Descripción breve de la trama (Plot)
    
3. Consolidar la información en una base de datos.
   
4. Ofrecer la información en una tabla o en una lista. Se tiene que poder filtrar los resultados por título y año.
5. Implementar programa en docker.
6. Usar react en la interfaz gráfica.

---
## 1: API ##
- Aprender como funciona la API
- Obtener peliculas.
- Filtrar pelicula:  &quot;Star Wars&quot;.
## 2: Obtener información pelicula ##
- Crear objeto con los siguientes campos: ID en IMDB, Título, Año y Descripción breve de la trama (Plot)
- Crear funciones que permitan modificar y trabajar con estos campos.
## 3: Crear BBDD para almacenar el objeto pelicula ##
- Crear BBDD.
- Conexion con BBDD.
- Operaciones con BBDD.
## 4: Crear interfaz para mostrar la información ##
- Mostrar información con filtro.
- Aplicar Css.
## 5: Implementar Docker ##
- Ejecución completa del programa en un contenedor.
- Prueba del contenedor mediante github actions.
## 6: Implementar React ##
