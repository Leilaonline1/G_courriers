<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PieceJointeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CourrierEnvController;
use App\Http\Controllers\CourrierRecuController;
use App\Http\Controllers\ArchiveCourrierEnvController;
use App\Http\Controllers\ArchiveCourrierRecuController;
use App\Http\Controllers\TypeCourrierController;


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
    return redirect("/login");
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/dashboard', DashboardController::class);
Route::resource('/pieceJointes', PieceJointeController::class);
Route::resource('/services', ServiceController::class);
Route::resource('/courrierEnvs', CourrierEnvController::class);
Route::resource('/courrierRecus',CourrierRecuController::class);
Route::resource('/archiveCourrierEnvs', ArchiveCourrierEnvController::class);
Route::resource('/archiveCourrierRecus', ArchiveCourrierRecuController::class);
Route::resource('/typeCourriers', TypeCourrierController::class);


