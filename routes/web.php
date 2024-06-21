<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\AdminMenuController;

//HOME
Route::get('/', [HomeController::class, 'index'])->name('home');

//BOOK A TABLE AND CONTACT
Route::post('/book-table', [HomeController::class, 'bookTable'])->name('bookTable');
Route::post('/contact', [HomeController::class, 'storeContact'])->name('contact.store');

// MENU
Route::get('/admin/menus', [AdminMenuController::class, 'index'])->name('admin.menus.index');
Route::get('/admin/menus/create', [AdminMenuController::class, 'create'])->name('admin.menus.create');
Route::post('/admin/menus', [AdminMenuController::class, 'store'])->name('admin.menus.store');

Route::get('/admin/menus/{menu}/edit', [AdminMenuController::class, 'edit'])->name('admin.menus.edit');
Route::put('/admin/menus/{menu}', [AdminMenuController::class, 'update'])->name('admin.menus.update');
Route::delete('/admin/menus/{menu}', [AdminMenuController::class, 'destroy'])->name('admin.menus.destroy');

//USER
Route::get('/signin', function () {
  return view('user.signin');
})->name('signin');

Route::get('/signup', function () {
  return view('user.signup');
})->name('signup');



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