<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;


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

Route::get('/', [LivroController::class, 'index'])->name('index');

Route::resource('livros', 'App\Http\Controllers\LivroController');
Route::post('/livros/update', [LivroController::class, 'update'])->name('livros.update');

