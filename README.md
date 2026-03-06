# dwes05 - Aplicación de Críticas de Películas 🎬

Proyecto de clase desarrollado para el módulo de **Desarrollo Web en Entorno Servidor (DWES)** del ciclo formativo de Grado Superior en **Desarrollo de Aplicaciones Web (DAW)**.

## 📋 Descripción

Aplicación web desarrollada con **Laravel 10** que permite a los usuarios registrados valorar y comentar películas. Cuenta con zona pública y zona privada, autenticación de usuarios y gestión completa de críticas.

## ✨ Funcionalidades

- Zona pública con listado de películas disponibles
- Registro e inicio de sesión de usuarios
- Zona privada con las críticas del usuario autenticado
- Crear una crítica (valoración del 1 al 5 + comentario)
- Borrar una crítica propia con confirmación
- Control para evitar que un usuario vote la misma película dos veces

## 🛠️ Tecnologías utilizadas

- PHP / Laravel 10
- MySQL
- Blade (motor de plantillas)
- Eloquent ORM
- HTML5 / CSS3

## 🗄️ Base de datos

La aplicación gestiona tres tablas principales:

- **generos** – Géneros cinematográficos
- **peliculas** – Películas con título, dirección, duración, argumento, año y género
- **criticas** – Críticas vinculadas a una película y a un usuario

## ⚙️ Instalación

1. Clona el repositorio:
```bash
git clone https://github.com/tu-usuario/dwes05.git
cd dwes05
```

2. Instala las dependencias:
```bash
composer install
```

3. Crea el archivo `.env` a partir del ejemplo y configura tu base de datos:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=root
DB_PASSWORD=
```

4. Ejecuta las migraciones y los seeders:
```bash
php artisan migrate
php artisan db:seed MFGSeeder
```

5. Arranca el servidor:
```bash
php artisan serve
```

6. Accede en tu navegador a `http://localhost:8000`

## 👤 Usuarios de prueba

| Usuario | Contraseña |
|---------|------------|
| MFG1    | (definida en el seeder) |
| MFG2    | (definida en el seeder) |

## 🔄 Patrón MVC

La aplicación sigue el patrón **Modelo - Vista - Controlador** de Laravel:
- **Modelos**: `GeneroMFG`, `PeliculaMFG`, `CriticaMFG`
- **Controladores**: `LoginController`, `CriticaControllerMFG`
- **Vistas**: plantillas Blade con layouts separados para zona pública y privada

## 👩‍💻 Autora

**María Fernández Gilarte**  
Estudiante de 2º DAW  
Marzo 2026
