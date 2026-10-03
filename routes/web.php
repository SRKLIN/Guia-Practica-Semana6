<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComercioController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\EventoTransaccionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/taskboard', function () {
    return 'Bienvenido a TaskBoard, tu pasarela de pagos.';
});

Route::get('/acerca-de', function () {
    return 'TaskBoard es una pasarela de pagos que permite a comercios afiliados recibir pagos y dar seguimiento a sus transacciones.';
});

Route::get('/contacto', function () {
    return 'Carlos Molina - carlos.molina@gmail.com';
});

// Rutas de Comercios con Route Model Binding (Guía 2 - Sección 13.2)
Route::get('/comercios', [ComercioController::class, 'index']);
Route::get('/comercio/{comercio}', [ComercioController::class, 'show']);

// Rutas de Transacciones con Route Model Binding (Guía 2 - Sección 14)
Route::get('/transacciones', [TransaccionController::class, 'index']);
Route::get('/transaccion/{transaccion}', [TransaccionController::class, 'show']);

// Rutas de Eventos de Transacción (Guía 2 - Sección 15)
Route::get('/eventos-transaccion', [EventoTransaccionController::class, 'index']);

Route::get('/estados', function () {
    return [
        'Iniciada',
        'Procesando',
        'Aprobada',
        'Rechazada',
        'Liquidada'
    ];
});

Route::get('/transaccion/demo', function () {
    return [
        'id' => 1,
        'comercio' => 'Café Amanecer',
        'monto' => 25.50,
        'moneda' => 'USD',
        'estado' => 'Aprobada'
    ];
});