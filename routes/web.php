<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticaADController;
use App\Http\Controllers\CrachaController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});
Route::POST('/welcome', [AutenticaADController::class, 'validaUsuarioADApp']);
Route::get('/welcome', [AutenticaADController::class, 'index']);
Route::POST('/cracha', [CrachaController::class, 'gerarPdf'])->name('gerar.pdf');
