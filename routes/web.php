<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
Auth::routes();

//HOME
Route::get('/', [IndexController::class, 'index'])->name('index');

//HOME - BOOK A TABLE AND CONTACT
Route::post('/book-table', [IndexController::class, 'bookTable'])->name('bookTable');
Route::post('/storeContacts', [IndexController::class, 'storeContact'])->name('storeContact');

//ADMIN
Route::get('/admin', [AdminController::class, 'index'])->name('screens.admindashboard');
Route::post('/updateUserRole', [AdminController::class, 'updateRole'])->name('updateUserRole');
Route::post('/updateReserveStatus', [AdminController::class, 'updateReserveStatus'])->name('updateReserveStatus');
Route::post('/updateContactStatus', [AdminController::class, 'updateContactStatus'])->name('updateContactStatus');


Route::delete('/admin/menus/{id}', [AdminController::class, 'destroy'])->name('admin.menus.destroy');
Route::delete('admin/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
Route::delete('admin/reservation/{id}', [AdminController::class, 'destroyReservation'])->name('admin.reservation.destroy');
Route::delete('admin/contact/{id}', [AdminController::class, 'destroyContact'])->name('admin.contact.destroy');

Route::get('/admin/menus/{id}/edit', [AdminController::class, 'edit'])->name('admin.menus.edit');
Route::put('/admin/menus/{id}', [AdminController::class, 'update'])->name('admin.menus.update');

// CART
Route::post('/add-to-cart', [CartController::class, 'addToCart']);
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index');
Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/update', [CartController::class, 'updateCart']);

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

Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home');
