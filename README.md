
# Proyecto usando enrutamiento Symfony

## Authors

- [@AVillaraux](https://github.com/AVillaraux)

## Contribuidores

- Jesús Misael Betanzos Betanzos ([@jesusmisael](https://github.com/jesusmisael))

## Instalación

1. Clonar el repositorio del proyecto desde GitHub

```bash
  git clone https://github.com/AVillaraux/rutas-symfony.git
```
2. Acceder al directorio del proyecto

Después de clonar el repositorio del proyecto desde GitHub, debes acceder al directorio del proyecto en tu terminal.
 - En Windows, puedes abrir el Explorador de Archivos y navegar hasta la carpeta donde clonaste el repositorio. Luego, mantén presionada la tecla `Shift` y haz clic derecho en un espacio vacío dentro de la carpeta. Selecciona "Abrir ventana de PowerShell aquí" o "Abrir ventana de comando aquí" para abrir una ventana de línea de comandos en la ubicación del proyecto.
-  Utilizando el comando cd seguido del nombre del directorio (tu_proyecto en este caso), te moverás al directorio correspondiente.
Por ejemplo, si clonaste el repositorio en tu directorio de inicio, el comando completo sería:

3. Instalar las dependencias del proyecto utilizando Composer

Después de acceder al directorio del proyecto, debes ejecutar el comando
```bash
  composer install
```
Esto instalará todas las dependencias del proyecto listadas en el archivo composer.json, incluyendo el framework Symfony y cualquier otra biblioteca requerida.
Asegúrate de tener Composer instalado en tu sistema antes de ejecutar este comando.
Puedes descargarlo desde el sitio web oficial de Composer (https://getcomposer.org/) e instalarlo siguiendo las instrucciones proporcionadas.

4. Configuración del entorno

- Crear un archivo `.env` basado en el archivo `.env.example` proporcionado.
- Configurar las variables de entorno necesarias, como la conexión a la base de datos y las credenciales de correo electrónico.
- Reemplaza `usuario`, `contraseña`, `servidor_smtp` y `puerto` con la información correspondiente de tu proveedor de servicios de correo.

5. Ejecución del proyecto
- Utiliza un servidor web local (por ejemplo, Apache) o un entorno de desarrollo como XAMPP para ejecutar tu proyecto.
- Asegúrate de tener PHP 8 instalado en tu sistema y configurado correctamente.
Puedes verificar la versión de PHP ejecutando `php -v` en la línea de comandos.
- Navega a `http://localhost/tu_proyecto/` en tu navegador web para acceder a tu proyecto .


## Estructura de carpetas
La estructura de carpetas  está diseñada para mantener el código organizado, modular y fácil de mantener.
Cada carpeta tiene un propósito específico y alberga componentes esenciales para el funcionamiento de la aplicación.

#### Carpetas y archivos:
Carpetas y archivos:

- app:
  - config:
    - App.php: Archivo de configuración de la aplicación Symfony.
    - DataBase.php: Archivo de configuración de la base de datos.
    - routing.yml: Archivo de configuración de enrutamiento de la aplicación.
  - Controller:
    - IndexController.php: Controlador para la página de inicio.
  - Helper:
    - General.php: Archivo de funciones de ayuda generales.
  - Integra:
    - Framework.php: Archivo de integración del framework Symfony.
  - Model:
    - PruebaModel.php: Modelo de datos para la prueba.
- resource views:
  - ejemplo:
    - get.php: Plantilla  para la acción "get".
    - post.php: Plantilla para la acción "post".
    - index.php: Plantilla para la página principal.
- .env: Archivo de entorno con variables de configuración.
- .gitignore: Archivo de configuración de Git para ignorar archivos y carpetas.
- .htaccess: Archivo de configuración de Apache.
- composer.json: Archivo de configuración de Composer.
- composer.lock: Archivo de bloqueo de Composer.
- index.php: Punto de entrada de la aplicación.
- README.md: Archivo de documentación del proyecto.

Explicación de las carpetas y archivos:

- app: Esta carpeta contiene la mayor parte del código de la aplicación, incluyendo la configuración, los controladores, los modelos, las vistas y los recursos.
  - config: Esta subcarpeta contiene los archivos de configuración de la aplicación, como la configuración de la base de datos, el enrutamiento y la seguridad.
  - Controller: Esta subcarpeta contiene las clases de controlador que manejan las solicitudes HTTP y devuelven respuestas.
  - Helper: Esta subcarpeta contiene archivos de funciones de ayuda que se pueden utilizar en todo el código de la aplicación.
  - Integra: Esta subcarpeta contiene el archivo de integración del framework Symfony.
  - Model: Esta subcarpeta contiene las clases de modelo que representan los datos de la aplicación.
- resource views: Esta subcarpeta contiene las plantillas que se utilizan para generar el HTML de la interfaz de usuario.
- .env: Este archivo contiene variables de configuración que se utilizan en la aplicación.
- .gitignore: Este archivo indica a Git qué archivos y carpetas debe ignorar.
- .htaccess: Este archivo contiene reglas de configuración para el servidor web Apache.
- composer.json: Este archivo contiene la información de dependencia de la aplicación y se utiliza para instalar las dependencias con Composer.
- composer.lock: Este archivo contiene una lista de las dependencias instaladas de la aplicación y sus versiones.
- index.php: Este archivo es el punto de entrada de la aplicación y es el primer archivo que se ejecuta cuando se solicita la aplicación.
- README.md: Este archivo contiene documentación sobre el proyecto, como instrucciones de instalación y uso.

## Configuración del enrutamiento

- Abre el archivo `app/config/routes.yaml` en el directorio del proyecto.
- Este archivo YAML define las rutas para tu aplicación
- Por defecto se agregan las siguientes líneas de código al archivo, que sirven para el proyecto a manera de ejemplo.

 ```yaml
  inicio:
    path: /
    controller: App\Controller\IndexController::index
    methods: GET

  ejemplo_GET:
    path: /ejemplo/{variable1}/{variable2}
    controller: App\Controller\IndexController::ejemploGET
    methods: GET

  ejemplo_POST:
    path: /ejemplo/
    controller: App\Controller\IndexController::ejemploPOST
    methods: POST
  ```

Ruta de inicio:

Ruta: / </br>
Controlador: App\Controller\IndexController::index </br>
Métodos HTTP: GET </br>
Esta ruta define la página principal de tu aplicación. Cuando un usuario navega a la raíz de tu sitio web (/), se invocará el método index del controlador IndexController.

Ruta ejemplo_GET:

Ruta: /ejemplo/{variable1}/{variable2} </br>
Controlador: App\Controller\IndexController::ejemploGET </br>
Métodos HTTP: GET </br>
Esta ruta define una ruta con dos variables: variable1 y variable2. Cuando un usuario navega a una URL como /ejemplo/valor1/valor2, se invocará el método ejemploGET del controlador IndexController. Los valores de las variables (valor1 y valor2) se pasarán al método como argumentos.

Ruta ejemplo_POST:

Ruta: /ejemplo/ </br>
Controlador: App\Controller\IndexController::ejemploPOST </br>
Métodos HTTP: POST
Esta ruta define una ruta que solo acepta solicitudes HTTP POST. Cuando un usuario envía un formulario a la URL /ejemplo/, se invocará el método ejemploPOST del controlador IndexController. Los datos del formulario se pasarán al método como parámetros.

Explicación de las líneas de código:

inicio:: Define el nombre de la ruta. </br>
path:: Especifica la URL de la ruta. </br>
controller:: Indica el controlador y el método que se invocará cuando se acceda a la ruta. </br>
methods:: Define los métodos HTTP permitidos para la ruta.
