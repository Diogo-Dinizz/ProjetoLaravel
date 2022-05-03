<?php

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

/* voce pode declarar ou nao de resto deixa 
 para simplificar e ficar rapido, no caso ali
 de profissao que nao declarei.
*/ 

/*! normalize.css v8.0.1 | MIT License | 
github.com/necolas/normalize.css */

 /*---declaração das variaveis sendo aki 
   o codigo mãe*/

/* Aula 1,2,3 e acho que ate 4 */

use App\Http\Controllers\NoticeController;

Route::get('/',[NoticeController::class,'index']);
Route::get('/notices/create',[NoticeController::class,'create'])->middleware('auth');
Route::get('/notices/{id}',[NoticeController::class,'show']);
Route::post('/notices',[NoticeController::class, 'store']);
Route::delete('/notices/{id}',[NoticeController::class,'destroy'])->middleware('auth');
Route::get('/notices/edit/{id}',[NoticeController::class,'edit'])->middleware('auth');
Route::put('/notices/update/{id}',[NoticeController::class,'update'])->middleware('auth');

Route::get('/contato', function () {
    return view('contato');
});

Route::get('/dashboard',[NoticeController::class, 'dashboard'])->middleware('auth'); 

Route::post('/notices/join/{id}',[NoticeController::class, 'joinNotice'])->middleware('auth');

Route::delete('/notices/leave/{id}',[NoticeController::class, 'leaveNotice'])->middleware('auth');

Route::auth();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

 