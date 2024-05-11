<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\TautanController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


//Login
Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/logout', [AuthenticationController::class, 'logout'])->middleware(['auth:sanctum']);
Route::get('/siapa', [AuthenticationController::class, 'siapa'])->middleware(['auth:sanctum']); //-> cek siapa yang login

//Admin
Route::post('/tambahAdmin', [AdminController::class, 'store'])->middleware(['auth:sanctum', 'admin_role']);
Route::get('/lihatAdmin', [AdminController::class, 'show'])->middleware(['auth:sanctum', 'admin_role']);
Route::delete('/lihatAdmin/{idAdmin}', [AdminController::class, 'delete'])->middleware(['auth:sanctum', 'admin_role']);

//Tautan
Route::post('/tambahTautan', [TautanController::class, 'store'])->middleware(['auth:sanctum', 'tautan_role']);
Route::post('/updateTautan/{id}', [TautanController::class, 'update'])->middleware(['auth:sanctum', 'tautan_role']);
Route::delete('/lihatTautan/{idTautan}', [TautanController::class, 'delete'])->middleware(['auth:sanctum', 'tautan_role']);
Route::get('/lihatTautan', [TautanController::class, 'show']);






