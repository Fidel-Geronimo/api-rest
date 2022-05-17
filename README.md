# API REST (Prueba Tecnica)

Prueba tecnica para la empresa "ATL Software".

## CRITERIOS
Ejercicio para Backend : 
- Hacer un API REST (preferiblemente sin usar a un framework) para manejar una lista de contactos.
- Tenemos que poder agregar nuevos contactos (nombre, apellido, email), listar los contactos y eliminar un contacto.
- Recomendación: La API tiene que seguir las buenas prácticas de arquitectura en capa para separar el acceso a los datos.
- Bonus 1 : Agregar reglas de validación para no permitir de ingresar a datos vacías
- Bonus 2: Permitir agregar uno o varios números de teléfono a cada contacto.
- La API se llama desde una herramienta como Postman

### Pre-requisitos 📋

Para probar la API hay que seguir algunos pasos:

1. Descargar la Base de datos MySql (se encuentra en el proyecto)
2. Importar la Base de datos a un gestor de base de datos MySql 
3. Revisar configuracion de la base de datos en el archivo -> "config/db.php"
4. Instalar PostMan (Para realizar peticiones HTPP)

## Ejecutando las pruebas ⚙️

1. Realizamos una peticion GET sin parametros para recibir todos los datos que nos ofrece la API REST ("http://localhost/api/Contacts/index")
![Postman 17_5_2022 7_34_32 p  m](https://user-images.githubusercontent.com/98572888/168895479-02d4eff8-5336-49c9-b7e7-5988ed985bef.png)

2. Realizamos una peticion GET con parametros para recibir todos los datos que nos ofrece la API REST  ("http://localhost/api/Contacts/index/1")
![Postman 17_5_2022 7_35_45 p  m](https://user-images.githubusercontent.com/98572888/168895653-e7be2a63-4398-469f-8730-9083e6ea341e.png)

3. Realizamos una peticion POST enviando un objeto JSON para insertar nuevos datos a la API REST ("http://localhost/api/Contacts/index")
![Postman 17_5_2022 7_40_03 p  m](https://user-images.githubusercontent.com/98572888/168896323-b3cec360-413a-4e96-aad8-46f9ec412ccc.png)

4. Realizamos una peticion DELETE enviando un id mediante la URL para elimina un datos en la API REST ("http://localhost/api/Contacts/index/1")
![Postman 17_5_2022 7_41_23 p  m](https://user-images.githubusercontent.com/98572888/168896526-b1a11ca2-4e78-44ef-9880-d6b62a4be6ce.png)

5. Realizamos una peticion PUT enviando un id mediante la URL y ademas un objeto JSON para editA un registro en la API REST ("http://localhost/api/Contacts/index/1")
![Postman 17_5_2022 7_43_20 p  m](https://user-images.githubusercontent.com/98572888/168896831-168f9f2a-56f7-4499-a024-2c9106b01c47.png)

## Construido con 🛠️

- PHP (sin frameworks)
- MySql (Gestor de BD )

## Autores ✒️

- Fidel Geronimo (fidelgeronimo18@gmail.com)


---
⌨️ con ❤️ por https://github.com/Fidel-Geronimo
