# CRUD con Laravel 10

Web que permite gestionar productos con CRUD, carga de imágenes, autenticación de usuarios y exportación a PDF.

---

## 🚀 Características

- CRUD de productos (crear, ver, editar, eliminar)
- Permite subir imagen con previsualización
- Genera PDF de los productos
- Sistema de autenticación (login, registro, logout)
- Diseño responsivo
- Middleware `auth` para proteger rutas

---

## ⚙️ Requisitos

- PHP >= 8.1
- Composer
- Node.js y npm
- MySQL o MariaDB
- XAMPP, Laragon o cualquier servidor local

---

## 🛠️ Instalación

### 1. Clonar el repositorio

```bash
git clone git@github.com:n0gu1/prueba.git
cd prueba
```

### 2. Instalar dependencias PHP

```bash
composer install
```

### 3. Instalar dependencias JS

```bash
npm install
npm run build
```

### 4. Copiar archivo `.env` y configurar

```bash
cp .env.example .env
```

Edita `.env` y configura la base de datos:

```
DB_DATABASE=nombre_de_la_base_de_datos
DB_USERNAME=usuario
DB_PASSWORD=contraseña
```

### 5. Generar clave de la app

```bash
php artisan key:generate
```

### 6. Ejecutar migraciones

```bash
php artisan migrate
```

### 7. Crear enlace simbólico para imágenes

```bash
php artisan storage:link
```

### 8. Iniciar el servidor

```bash
php artisan serve
```

Accede desde: [http://127.0.0.1:8000]

---

## 🔐 Autenticación

Se utilizó Laravel Breeze para la autenticación.

- Se puede registrarte desde `/register`
- Luego se reedireccionara al CRUD protegido

---

## 📦 Exportar PDF

En la vista de listado de productos hay un botón **"Descargar PDF"** que genera un archivo con todos los productos registrados usando `barryvdh/laravel-dompdf`.

---

## 📷 Subida y previsualización de imagen

El formulario de productos permite subir una imagen y previsualizarla antes de guardar. Las imágenes se almacenan en `storage/app/public/productos`.

