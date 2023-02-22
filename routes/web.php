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


use App\Http\Controllers\PhonebookController;

Route::get('/', [PhonebookController::class, 'index']);
Route::get('/contatos/adicionar', [PhonebookController::class, 'create']);
Route::get('/contatos/{id}', [PhonebookController::class, 'show']);

Route::post('/contatos', [PhonebookController::class, 'store']);
Route::delete('/contatos/{id}', [PhonebookController::class, 'destroy']);
Route::get('/contatos/editar/{id}', [PhonebookController::class, 'edit']);
Route::put('/contatos/atualizar/{id}', [PhonebookController::class, 'update']);