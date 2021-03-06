<?php

use App\Http\Controllers\AlunoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Resource;
use App\Http\Controllers\EscolaController;
use App\Http\Controllers\TelefoneController;
use App\Http\Controllers\AlergiaController;
use App\Http\Controllers\AlergiaAlunoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\UsuarioController;

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

Route::resource('/escola', EscolaController::class);

Route::post('/escola/storeJson', [EscolaController::class, 'storeJsonData'])->name('escola.storeJsonData');

Route::resource('/telefone', TelefoneController::class);

Route::post('/telefone/storeJson', [TelefoneController::class, 'storeJsonData'])->name('telefone.storeJsonData');

Route::resource('/aluno', AlunoController::class);

Route::resource('/alergia', AlergiaController::class);

Route::post('/alergia/storeJson', [AlergiaController::class, 'storeJsonData'])->name('alergia.storeJsonData');

Route::resource('/alergia_aluno', AlergiaAlunoController::class);

Route::resource('/professor', ProfessorController::class);

Route::resource('/endereco', EnderecoController::class);

Route::post('/endereco/storeJson', [EnderecoController::class, 'storeJsonData'])->name('endereco.storeJsonData');
