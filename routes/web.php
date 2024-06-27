<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\AdminController;
Auth::routes();

//HOME
Route::get('/', [IndexController::class, 'index'])->name('index');

//HOME - BOOK A TABLE AND CONTACT
Route::post('/book-table', [IndexController::class, 'bookTable'])->name('bookTable');
Route::post('/contacts', [IndexController::class, 'storeContact'])->name('storeContact');

//ADMIN
Route::get('/admin', [AdminController::class, 'index'])->name('screens.admindashboard');
Route::post('/updateUserRole', [AdminController::class, 'updateRole'])->name('updateUserRole');

Route::delete('/admin/menus/{id}', [AdminController::class, 'destroy'])->name('admin.menus.destroy');

Route::get('/admin/menus/{id}/edit', [AdminController::class, 'edit'])->name('admin.menus.edit');
Route::put('/admin/menus/{id}', [AdminController::class, 'update'])->name('admin.menus.update');

Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
Route::delete('/admin/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');

//FOOTER - OTHER PAGE
Route::get('/FAQ', function () {
  return view('other-page.faq');
})->name('faq');

Route::get('/TermsofServices', function () {
  return view('other-page.tos');
})->name('tos');

Route::get('/privacyPolicy', function () {
  return view('other-page.ppolicy');
})->name('ppolicy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
