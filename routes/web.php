<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\AdminMenuController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// MENU
Route::get('/admin/menus', [AdminMenuController::class, 'index'])->name('admin.menus.index');
Route::get('/admin/menus/create', [AdminMenuController::class, 'create'])->name('admin.menus.create');
Route::post('/admin/menus', [AdminMenuController::class, 'store'])->name('admin.menus.store');
Route::get('/admin/menus/{menu}/edit', [AdminMenuController::class, 'edit'])->name('admin.menus.edit');
Route::put('/admin/menus/{menu}', [AdminMenuController::class, 'update'])->name('admin.menus.update');
Route::delete('/admin/menus/{menu}', [AdminMenuController::class, 'destroy'])->name('admin.menus.destroy');
