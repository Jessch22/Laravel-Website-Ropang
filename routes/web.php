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

Route::delete('/admin/menus/{id}', [AdminController::class, 'destroy'])->name('admin.menus.destroy');
Route::delete('admin/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');

// CART
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('other-page.cart');
Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');


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
