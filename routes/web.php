<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminMenuController;
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

// DELETE
Route::delete('/admin/menus/{id}', [AdminController::class, 'destroy'])->name('admin.menus.destroy');
Route::delete('admin/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
Route::delete('admin/reservation/{id}', [AdminController::class, 'destroyReservation'])->name('admin.reservation.destroy');
Route::delete('admin/contact/{id}', [AdminController::class, 'destroyContact'])->name('admin.contact.destroy');

// MENU
Route::get('/admin/menus/create', [AdminMenuController::class, 'create'])->name('admin.menus.create');
Route::post('/admin/menus', [AdminMenuController::class, 'store'])->name('admin.menus.store');
Route::get('/admin/menus/{id}/edit', [AdminMenuController::class, 'edit'])->name('admin.menus.edit');
Route::put('/admin/menus/{id}', [AdminMenuController::class, 'update'])->name('admin.menus.update');

// CART
Route::post('/add-to-cart', [CartController::class, 'addToCart']);
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index');
Route::post('/update-quantity', [CartController::class, 'updateQuantity']);
Route::post('/remove-item', [CartController::class, 'removeItem']);


//FOOTER - OTHER PAGE
Route::get('/FAQ', function () {
  return view('other-page.faq');
})->name('faq');

Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home');
