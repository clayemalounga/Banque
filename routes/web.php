<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompteController;
use App\Models\Compte;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/clients',[ClientController::class,'AfficherClient'])->name('clients.list');
Route::get('/clients/create',[ClientController::class,'create'])->name('clients.create');
Route::post('/clients/create',[ClientController::class,'store'])->name('clients.store');
Route::get('/clients/delete/{id}',[ClientController::class,'delete'])->name('clients.delete');
Route::get('/clients/edite/{id}',[ClientController::class,'edit'])->name('clients.edit');
Route::post('/clients/update/{id}',[ClientController::class,'update'])->name('clients.update');


Route::get('/comptes',[CompteController::class,'index'])->name('comptes.liste');
Route::get('/comptes/create',[CompteController::class,'create'])->name('comptes.create');
Route::post('/comptes/create',[CompteController::class,'store'])->name('comptes.store');
Route::get('/comptes/delete/{id}',[CompteController::class,'delete'])->name('comptes.delete');
Route::get('/comptes/edite/{id}',[CompteController::class,'edite'])->name('comptes.edite');
Route::post('/clients/update/{id}',[CompteController::class,'update'])->name('comptes.update');

