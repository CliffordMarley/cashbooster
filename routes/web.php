<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class,'index'])->name('dashboard')->middleware('auth');;
Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard')->middleware('auth');;


Route::get('login', [AuthController::class,'index'])->name('login');
Route::post('login', [AuthController::class,'authenticate']);
Route::get('logout', [AuthController::class,'logout'])->name('logout');

Route::get('admins/delete/{id}', [Admin\AdminController::class,'destroy'])->name('admin.delete');

Route::resource('admins', Admin\AdminController::class)->middleware('auth');

Route::get('/players', [UserController::class,'getAllPlayers'])->name('players.index')->middleware('auth');

Route::get('games', [Admin\GamesController::class,'index'])->name('games.index')->middleware('auth');
Route::get('games/plays', [Admin\GamesController::class,'plays'])->name('games.outcomes')->middleware('auth');

Route::resource('reports', ReportsController::class)->middleware('auth');
