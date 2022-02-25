<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgentController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/prix', [HomeController::class, 'price'])->name('sort.price');
Route::get('/surface', [HomeController::class, 'area'])->name('sort.area');
Route::get('/annonces/create', [HomeController::class, 'create'])->name('annonces.create');
Route::post('/annonces/create', [HomeController::class, 'store'])->name('annonces.store');
Route::get('/annonces{id}', [HomeController::class, 'show'])->name('annonces.show');
Route::get('/annonces/{id}', [HomeController::class, 'delete'])->name('annonces.delete');

Route::get('/annonces/edit/{id}', [HomeController::class, 'edit'])->name('annonces.edit');
Route::post('/annonces/update/{id}', [HomeController::class, 'update'])->name('annonces.update');

Route::get('/agent/create', [AgentController::class, 'createAgent'])->name('agent.create');
Route::post('/agent/create', [AgentController::class, 'storeAgent'])->name('agent.store');
Route::get('/agent/{id}', [AgentController::class, 'delete'])->name('agent.delete');
Route::get('agent', [AgentController::class, 'showAgent'])->name('agent.show');

