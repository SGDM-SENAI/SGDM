<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Resource;
use App\Http\Controllers\EscolaController;
use App\Http\Controllers\TelefoneController;

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
    return view('welcome');
});

// Route::get('admin/settings',function(){
//     return view('escola.create');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 Route::resource('/escola',EscolaController::class);
 
 Route::resource('/telefone',TelefoneController::class);
 
 Route::resource('/aluno',TelefoneController::class);
