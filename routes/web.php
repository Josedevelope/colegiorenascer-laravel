<?php

use Illuminate\Support\Facades\Route;

use  App\Http\Controllers\{
    CursoController,
    homecontroller
};

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

Route::get('/',[homecontroller::class, 'index'])->name('home');;

Route::get('/info-colegiorenascer/contacto', function(){
    return view('contactpage.contact');
})->name('contacto');



Route::get('/sobre', function(){
    return view('sobrepage.sobre');
})->name('sobre');

Route::get('/galeria', function(){
    return view('galeriapage.galeria');
})->name('galeria');

Route::get('/evento', function(){
    return view('eventospage.evento');
})->name('evento');



Route::get('/curso', [CursoController::class,'index'])->name('curso');
