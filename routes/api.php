<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PortafolioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('portafolios', PortafolioController::class);

//php artisan route:list --path=api

// Route::get('/portafolios',[PortafolioController::class,'index']);

// Route::post('/portafolios',[PortafolioController::class,'store']);

// Route::get('/portafolios/{portafolio}',[PortafolioController::class,'show']);

// Route::put('/portafolios/{portafolio}',[PortafolioController::class,'update']);

// Route::delete('/portafolios/{portafolio}',[PortafolioController::class,'destroy']);

// Ruta pública para el manejo de inicio de sesión del usuario
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Grupo de rutas protegidas
Route::middleware(['auth:sanctum'])->group(function ()
{
    // Ruta para el cierre de sesión
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

