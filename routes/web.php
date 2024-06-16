<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\MenuController;

Route::get('/', [homeController::class, 'index']);

// MENU
// Route::get('/menu', [MenuController::class, 'index']->name('menu'));
// Route::get('/menu/create', [MenuController::class, 'create']->name('menu.create'));
// Route::get('/menu/edit{id}', [MenuController::class, 'edit']->name('menu.edit'));

// Route::post('/menu/store', [MenuController::class, 'store'])->name('menu.store');
// Route::put('/menu/update/{id}', [MenuController::class, 'update'])->name('menu.update');
// Route::delete('/menu/destroy{id}', [MenuController::class, 'destroy'])->name('menu.destroy');