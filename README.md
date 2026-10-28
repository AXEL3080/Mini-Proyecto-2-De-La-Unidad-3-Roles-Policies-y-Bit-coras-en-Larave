<div align="center">

# 🚀 Mini Proyecto 2: Roles, Policies y Bitácoras en Laravel

<p align="center">
  <b>Sistema de E-Commerce desarrollado en Laravel 11 con seguridad avanzada y control de acceso.</b>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/Tailwind_CSS-3.8-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/SQLite-07405E?style=for-the-badge&logo=sqlite&logoColor=white" alt="SQLite">
</p>

</div>

---

## 🎯 Sobre el Proyecto
Este proyecto forma parte de la **Unidad 3** y está enfocado en robustecer la seguridad, la gestión de datos y la trazabilidad de acciones en una aplicación web con **Laravel 11**.

---

## ✨ Características Principales

* 🛡️ **Control de Acceso (RBAC):** Diferenciación de permisos y vistas según el rol del usuario (Administradores y Clientes).
* 🔒 **Políticas de Autorización (`Policies`):** Uso de `ProductoPolicy` para proteger las acciones del controlador y restringir el acceso con códigos `403` ante accesos no autorizados.
* 📝 **Sistema de Bitácoras (`Logs`):** Canal personalizado (`Log::channel('productos')`) que registra automáticamente cada alta, modificación y eliminación de productos con estampa de tiempo y ID de usuario.
* 🔗 **Relaciones Dinámicas (Muchos a Muchos):** Estructura de base de datos donde un producto puede pertenecer a múltiples categorías y viceversa, gestionadas mediante una tabla pivote y un menú desplegable dinámico.

---

## 💻 Estructura de la Base de Despliegue
> La base de datos se estructura mediante la tabla `productos`, que almacena la información principal de cada producto como su nombre, descripción, precio y existencia; la tabla `categorias`, que guarda los nombres de las categorías como Hogar, Higiene o Electrónica; y una tabla pivote intermedia, nombrada habitualmente como `categoria_producto`, la cual contiene las llaves foráneas `producto_id` y `categoria_id` para conectar ambas partes a través de una relación de muchos a muchos utilizando `belongsToMany`.

---

## ⚙️ Instalación Local

Sigue estos pasos para clonar y echar a andar el proyecto en tu máquina:

1. **Clona el repositorio:**
   
git clone https://github.com/AXEL3080/Mini-Proyecto-2-De-La-Unidad-3-Roles-Policies-y-Bit-coras-en-Larave.git

3. **Entra al directorio:**
   
cd Mini-Proyecto-2-De-La-Unidad-3-Roles-Policies-y-Bit-coras-en-Larave

5. **Instala las dependencias:**

composer install

6. **Configura el archivo de entorno:**

cp .env.example .env
php artisan key:generate

7. **Ejecuta las migraciones y seeders:**

php artisan migrate --seed

8. **Inicia el servidor:**

php artisan serve

<p align="center">
  <img src="https://media1.tenor.com/m/AQa-sGBW6JYAAAAC/luffy-gordo-luffy-gordinho.gif" width="350" alt="Luffy gordo">
</p>

---
<p align="center">Desarrollado con 💻 para la materia académica.</p>
