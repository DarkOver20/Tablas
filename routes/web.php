<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\InventarioController;

Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario');
Route::post('/inventario', [InventarioController::class, 'store'])->name('inventario.store');
Route::put('/inventario/{id_libro}', [InventarioController::class, 'update'])->name('inventario.update');
Route::delete('/inventario/{id_libro}', [InventarioController::class, 'destroy'])->name('inventario.destroy');Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
