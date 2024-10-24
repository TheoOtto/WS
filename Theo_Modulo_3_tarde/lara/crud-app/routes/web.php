<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\TurmaController;

Route::get('/', function () { //rota da pagina welcome
    return view('welcome');
});
Route::get('/home', function () {//rota da pagina home
    return view('alunos.home');
});
Route::get('/escolha', function () {//rota da pagina escolha
    return view('alunos.escolha');
});
Route::get('/loginaluno', function () {//rota da pagina login de aluno
    return view('alunos.loginaluno');
});
Route::get('/loginprofessor', function () {//rota da pagina login de professor
    return view('alunos.loginprofessor');
});


//define as rotas dos controllers
Route::resource('/aluno', AlunoController::class);
Route::resource('/professor', ProfessorController::class);
Route::resource('/disciplina', DisciplinaController::class);
Route::resource('/curso', CursoController::class);
Route::resource('/turma', TurmaController::class);

//rota de login de adm
Route::get('/admin',[AlunoController::class, 'mostralogin'])->name('alunos.login.form');
Route::post('/admin',[AlunoController::class, 'login'])->name('alunos.login');
Route::post('/admin/logout',[AlunoController::class, 'logout'])->name('alunos.logout');

//rota de login de aluno
Route::get('/loginaluno',[AlunoController::class, 'mostraloginaluno'])->name('alunos.loginaluno.form');
Route::post('/loginaluno',[AlunoController::class, 'loginaluno'])->name('alunos.loginaluno');
Route::post('/loginaluno/logout',[AlunoController::class, 'logout'])->name('alunos.logout');

//rota de login de professor
Route::get('/loginprofessor',[AlunoController::class, 'mostraloginprofessor'])->name('alunos.loginprofessor.form');
Route::post('/loginprofessor',[AlunoController::class, 'loginprofessor'])->name('alunos.loginprofessor');
Route::post('/loginprofessor/logout',[AlunoController::class, 'logout'])->name('alunos.logout');



