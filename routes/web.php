<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Forma de ingresar a todas las rutas
Route::resource('post', PostController::Class)->middleware('auth');

Auth::routes();

Route::get('/home', [PostController::class, 'index'])->name('home');  // Cuando el usuario escriba home lleva al CRUD

Route::group(['middleware' => 'auth'], function () {  // Si se autentica
    Route::get('/home', [PostController::class, 'index'])->name('home');  // Redirecciona al index
});
