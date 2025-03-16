# Proyecto Final: Tienda de Escalada

## Introducción

Este proyecto consiste en una **tienda online de productos de escalada**, desarrollada en PHP siguiendo el patrón de diseño **MVC (Modelo-Vista-Controlador)**. La aplicación permite a los usuarios explorar productos, añadirlos al carrito de compras, iniciar sesión y gestionar su cuenta. Los administradores tienen acceso a funcionalidades adicionales, como añadir o eliminar productos.

El proyecto final ha sido desarrollado utilizando tecnologías como **PHP**, **MariaDB**, **Docker** (con Nginx, PHP-FPM y Redis), y **CSS** para el diseño.

---

## Diseño

### Estructura de la página

La página web tiene un diseño sencillo y funcional, con las siguientes secciones:

1. **Header**:
   - Barra de navegación con enlaces a:
     - **Inicio**: Página principal con opciones para explorar productos por categoría.
     - **Productos**: Listado de todos los productos o filtrados por categoría (Indoor, Clásica/Deportiva, Alta Montaña).
     - **Carrito**: Vista del carrito de compras.
     - **Login/Logout**: Enlace para iniciar sesión o cerrar sesión (dependiendo del estado del usuario).
     - **Administración** (solo para administradores): Enlace para añadir nuevos productos.

2. **Main**:
   - Utilizado normalmente para mostrar los productos, pero la parte que en mi opinión mas puede gustar, es en el inicio, la posibilidad de seleccionar tres tipos diferentes de escalada para mostrar productos por su tipo, sin quitar la posibilidad de cargarlos todos desde el inicio, o pulsando en productos en el header.

3. **Footer**:
   - Información básica como el copyright y el nombre de la tienda.

### Estilos CSS

Los estilos están definidos en un archivo `styles.css`, que incluye:
- Efectos de hover en los botones y enlaces.
- Diseño limpio y moderno con colores neutros y tipografía legible.

---

## Desarrollo

### Tecnologías utilizadas

- **PHP**: Para la lógica del servidor y la interacción con la base de datos.
- **MariaDB**: Como sistema de gestión de bases de datos.
- **Docker**: Para crear un entorno de desarrollo con los siguientes servicios:
  - **Nginx**: Servidor web.
  - **PHP-FPM**: Procesador de PHP.
  - **Redis**: Para manejo de sesiones
- **CSS**: Para el diseño y la presentación de la página.

### Funcionalidades implementadas

1. **Listado de productos**:
   - Los productos se muestran en la página de inicio y en la sección de productos.
   - Se pueden filtrar por categoría (Indoor, Clásica/Deportiva, Alta Montaña).

2. **Carrito de compras**:
   - Gracias al uso de la sesión, si el usuario ha añadido productos al carrito e inicia sesión posteriormente, los productos de la sesión se le asignarán al usuario con el que inicie sesión.
   - Los usuarios pueden añadir productos al carrito, también los admin.

4. **Inicio de sesión**:
   - Los usuarios pueden iniciar sesión con su email y contraseña.
   - Los administradores tienen acceso a funcionalidades adicionales.

5. **Administración de productos**:
   - Los administradores pueden añadir nuevos productos.

### Métodos utilizados

- **ProductosDAO**:
  - `getAllProductos()`: Obtiene todos los productos de la base de datos.
  - `getProductosByTipo($tipo)`: Filtra productos por categoría.
  - `getProductoById($id)`: Obtiene un producto específico por su ID.
  - `addProducto($nombre, $descripcion, $precio, $imagen, $tipo)`: Añade un nuevo producto (solo para administradores).
  - `deleteProducto($id)`: Elimina un producto (solo para administradores).

- **UsuariosDAO**:
  - `getUsuarioByEmail($email)`: Obtiene un usuario por su email.
  - `verificarCredenciales($email, $password)`: Verifica las credenciales del usuario.
  - `crearUsuario($nombre, $email, $password, $rol)`: Crea un nuevo usuario.
- **CarritoDAO**:
  - `obtenerProducto`: Obtiene un unico producto para mostrarlo solo al hacer clic en uno.
  - `añadirProducto`: Verifica si el producto está en el carrito, si no está lo añade, pero si lo está, aumenta su cantidad, siempre y cuando el id coincida.
  - `actualizarCantidad`: Es principalmente la lógica que sigue añadirProducto para que los productos de los usuarios no se mezclen y se almacenen por id.
  - `obtenerProductos`: Mediante una consulta, utiliza el id del usuario para obtener todos los productos almacenados en el carrito cuya clave foranea coincide con el id del usuario y los obtiene todos con "fetchall"

---

## Dificultades y problemas comunes

Durante el desarrollo del proyecto, me he encontrado con varios problemas:

1. **Rutas incorrectas**:
   - Problemas con las rutas relativas y absolutas.
   - Solución: Ajustar las rutas usando `__DIR__` y `require_once`.

2. **Redeclaración de clases**:
   - Errores como `Cannot declare class ProductosDAO`.
   - Solución: Usar `require_once` en lugar de `require` o `include`.

3. **Sesiones en Docker**:
   - Problemas con el manejo de sesiones en un entorno Docker.
   - Solución: Configurar correctamente Redis.

4. **Estilos CSS no aplicados**:
   - Los estilos no se aplicaban debido a rutas incorrectas o problemas de caché.
   - Solución: Verificar las rutas y utilizar el navegador de incógnito.
---

## Conclusión

Ha sido complicado en bastantes aspectos, sobretodo el hecho de que surgiese demasiado a menudo el error `Cannot declare class X`, me ha hecho perder mucho tiempo, pero en general útil para aplicar conceptos de desarrollo web, como el patrón MVC, la gestión de bases de datos con PHP y MariaDB, y la creación de un entorno de desarrollo con Docker.


### Mejoras futuras:
- Implementar un sistema que permita añadir un producto varias veces de una sola vez.
- Añadir más funciones de filtrado.
- Borrar un producto.
- Mejorar la gestión de sesiones con Redis.
