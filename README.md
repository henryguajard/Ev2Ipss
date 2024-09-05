# 📋 Proyecto de Gestión de Usuarios y Proyectos en Laravel 11

Este proyecto es una aplicación construida con Laravel 11, en la cual los usuarios pueden registrarse, y una vez que estén activos, podrán crear y gestionar proyectos.

## 🚀 Requisitos

Antes de comenzar, asegúrate de tener instalados los siguientes componentes:

- ⚡ PHP >= 8.1
- 🎶 Composer
- 🛢️ MySQL o cualquier base de datos compatible
- 🖥️ Node.js (para manejar dependencias de frontend)
- 🌐 Laravel 11

## 🛠️ Instalación

Sigue estos pasos para instalar y configurar el proyecto en tu máquina local.

1. **Clona el repositorio:**

   ```bash
   git clone https://github.com/usuario/proyecto-laravel.git
   cd proyecto-laravel

🌟 ## Funcionalidades

1. Registro y autenticación de usuarios
Los usuarios pueden registrarse mediante el formulario de registro disponible en la ruta /users/register. Una vez registrados, sus cuentas deben estar activas para poder acceder a las funcionalidades de la aplicación.

📝 Ruta para registro: /users/register
🔐 Ruta para login: /login
2. Creación de proyectos
Una vez que el usuario esté autenticado y activo, podrá acceder a la vista de creación de proyectos y gestionar sus propios proyectos.

🛠️ Ruta para crear proyectos: /backoffice.proyecto
3. Autenticación y autorización
❌ Los usuarios inactivos no podrán autenticarse.
📁 Los proyectos solo pueden ser gestionados por el usuario que los creó.
🔑 Rutas Principales
GET /: Página de inicio
GET /login: Muestra el formulario de inicio de sesión
POST /login: Valida el login del usuario
GET /users/register: Muestra el formulario de registro de usuario
POST /users/register: Maneja el registro de nuevos usuarios
GET /backoffice: Dashboard del usuario autenticado
GET /backoffice.proyecto: Vista para la creación de proyectos
🔄 Consideraciones Adicionales
Migraciones: El sistema utiliza migraciones para gestionar la estructura de la base de datos, incluyendo las tablas para usuarios y proyectos.
Validaciones: Se asegura que el registro de usuarios sea correcto y que solo los usuarios activos puedan iniciar sesión y crear proyectos.
💡 Bootstrap: La aplicación incluye Bootstrap para el diseño y la maquetación de las vistas del frontend.