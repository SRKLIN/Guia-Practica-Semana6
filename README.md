# 🚀 Guías de Prácticas Laravel - TaskBoard: Pasarela de Pagos

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Git](https://img.shields.io/badge/Git-F05032?style=for-the-badge&logo=git&logoColor=white)
![GitHub](https://img.shields.io/badge/GitHub-181717?style=for-the-badge&logo=github&logoColor=white)

---

<p align="center">
  <img src="https://res.cloudinary.com/bcwlyire/image/upload/v1785118882/NUEVO-LOGO-UPED-A-COLOR-scaled_szoqws.jpg" alt="Logo UPED" width="300"/>
</p>

## 🏛️ Información Académica

- **Institución:** Universidad Pedagógica de El Salvador *Luis Alonso Aparicio*
- **Facultad:** Ingeniería
- **Asignatura:** Integración de Sistemas
- **Ciclo:** 02-2026
- **Docente:** Ing. Oscar Contreras
- **Proyecto Integrador:** TaskBoard - Pasarela de Pagos

---

## 📌 Descripción del Proyecto

Este repositorio contiene el trabajo de la **Semana 6** del proyecto **TaskBoard**, una plataforma de **Pasarela de Pagos** desarrollada en el framework **Laravel 11**.

En esta semana el proyecto deja de vivir únicamente en rutas y controladores: se construye toda la **capa de datos** con **Eloquent ORM**, el mapeador objeto-relacional de Laravel.

1. **Migraciones:** definición por código de las tablas `comercios`, `transaccions` y `evento_transaccions`, versionadas y ejecutadas con Artisan (`php artisan migrate`), más una migración adicional que agrega `telefono` y `correo_contacto` a los comercios.
2. **Modelos Eloquent:** `Comercio`, `Transaccion` y `EventoTransaccion`, con `$fillable` para controlar la asignación masiva.
3. **Relaciones:** `hasMany()` / `belongsTo()` entre comercio y transacción, y entre transacción y sus eventos de auditoría.
4. **Route Model Binding:** las rutas de detalle reciben directamente la instancia del modelo en lugar de un id suelto.

Los controladores de esta semana devuelven **JSON**; la interfaz visual con Blade se construye hasta la Semana 7.

---

## 📁 Estructura del Proyecto

A continuación se detalla la estructura principal del repositorio y del proyecto Laravel `taskboard`:

```text
taskboard/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── ComercioController.php            # Listado y detalle de comercios
│   │       ├── TransaccionController.php         # Listado y detalle de transacciones
│   │       └── EventoTransaccionController.php   # Historial y auditoría de eventos
│   └── Models/
│       ├── Comercio.php                          # hasMany(Transaccion)
│       ├── Transaccion.php                       # belongsTo(Comercio) + hasMany(EventoTransaccion)
│       └── EventoTransaccion.php                 # belongsTo(Transaccion)
├── config/                                       # Archivos de configuración general del sistema
├── database/
│   ├── migrations/
│   │   ├── create_comercios_table.php            # Comercios afiliados a la pasarela
│   │   ├── create_transaccions_table.php         # Monto, moneda, método de pago y estado
│   │   ├── add_telefono_and_correo_to_comercios_table.php
│   │   └── create_evento_transaccions_table.php  # Bitácora de cambios de estado
│   └── seeders/                                  # Datos iniciales de prueba
├── public/                                       # Punto de entrada de la aplicación (index.php) y assets
├── resources/
│   └── views/                                    # Vistas HTML / Plantillas Blade (ej. welcome.blade.php)
├── routes/
│   └── web.php                                   # Rutas con Route Model Binding
├── storage/                                      # Registros (logs), archivos cargados y caché de la app
├── vendor/                                       # Dependencias de PHP administradas por Composer
├── .env.example                                  # Variables de entorno de ejemplo
├── composer.json                                 # Configuración de Composer y paquetes
└── README.md                                     # Documentación principal del repositorio
```
