"# rutas-symfony"

## Configuración del Entorno

Se ha realizado una modificación en el proyecto para que se genere automáticamente un archivo .env.example después de instalar o actualizar las dependencias. Este archivo sirve como plantilla para definir las variables de entorno necesarias para tu aplicación.

## Instalación de Dependencias

Antes de configurar el entorno, asegúrate de instalar o actualizar las dependencias del proyecto. Puedes hacerlo ejecutando el siguiente comando en la terminal:

```bash
  composer install
```

o, si ya tienes las dependencias instaladas y deseas actualizarlas:

```bash
    composer update
```

## Establecer el Entorno Correcto

Para configurar el entorno adecuado, puedes o ejecutar alguno de los siguientes comandos en la terminal:

-   **Para el entorno de desarrollo:** puedes renombrar el archivo .env.example a .env.development o utilizar este comando, el cual copiará el contenido del archivo .env.example a .env.development, estableciendo así las variables de entorno necesarias para el desarrollo.

```bash
composer run env
```

Para configurar el entorno adecuado, puedes renombrar el archivo .env.example a .env.development o ejecutar el siguiente comandos en la terminal:

-   **Para el entorno de produccion:** puedes renombrar el archivo .env.example a .env o utilizar este comando, el cual copiará el contenido del archivo .env.example a .env, estableciendo así las variables de entorno necesarias para el desarrollo.


```bash
composer run env:production
```

## Conservación de Configuraciones Locales
Si ya has configurado valores en tu archivo .env y deseas conservar estas configuraciones al cambiar a un entorno de desarrollo, asegúrate de renombrar el archivo .env a .env.development.
De este modo, al ejecutar los comandos de configuración, podrás mantener tus valores locales sin sobrescribirlos.