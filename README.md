## Cómo instalar este proyecto

**Necesitas node.js instalado**<br>
**Necesitas composer instalado**<br>
**Necesitas xampp o similar instalado**<br>

Añade como repositorio en remoto a tu repositorio local con el siguiente comando de Git

    git remote add origin https://github.com/RuMont/TareaLaravel.git

Haz un pull para obtener todos los archivos y commits en tu repositorio local

    git pull origin master

Ahora abres el cmd en la carpeta del repositorio local (puedes abrir una consola dentro de Visual Studio Code con CTRL + Ñ) y ejecutas los siguientes comandos

Para node:

    npm install
    
Para composer:

    composer install

Para migrar las tablas creadas a phpmyadmin:

    php artisan migrate

Para ejecutar los seeders:

    php artisan migrate:refresh --seed

Y ya podrías visualizar en tu navegador este proyecto con la dirección de localhost.
