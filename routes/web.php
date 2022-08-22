<?php

use Illuminate\Support\Facades\Route;

use  App\Http\Controllers\{
    AlunoController,
    CursoController,
    homecontroller,
    CandidatoProfessorController,
    SetmeController
};
use App\Models\Aluno;

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


///ROUTAS DAS VIEWS
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
Route::get('/register.candidato', [CursoController::class,'index'])->name('curso');

//Route::view('/register/candidato/professor', 'register.candidato.register_candidato_professor');

Route::get('/register/candidato/professor', [SetmeController::class,'CandidatoProfessor']);


Route::get('/register/candidato/professor/disciplina', [SetmeController::class,'disciplina'])->name('setme.disciplina');


// ROUTAS PARA CADASTROS / REGISTRO
Route::get('/register/candidato/aluno',[AlunoController::class,'register'])->name("aluno.register");
Route::post('/register/candidato',[CandidatoProfessorController::class,'storage'])->name("candidato_professor.storage");
