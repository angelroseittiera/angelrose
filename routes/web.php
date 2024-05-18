<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AuthController::class, 'home'])->name('home');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('submit-register', [AuthController::class, 'submitregister'])->name('register.post');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('submit-login', [AuthController::class, 'submitlogin'])->name('login.post');

// admin
Route::get('adminhome', [AuthController::class, 'adminhome'])->name('adminhome');
Route::get('viewuser', [AuthController::class, 'viewuser'])->name('viewuser');
Route::get('edit/{id}', [AuthController::class, 'edituser'])->name('edit');
Route::post('edit-details', [AuthController::class, 'edituserdetails'])->name('edit.post');
Route::get('delete/{id}', [AuthController::class, 'deleteuser'])->name('delete');
Route::get('addproduct', [ProductController::class, 'addproduct'])->name('addproduct');
Route::post('add-product', [ProductController::class, 'createproduct'])->name('addproduct.post');
Route::get('viewproduct', [ProductController::class, 'viewproduct'])->name('viewproduct');
Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
Route::post('edit-product', [ProductController::class, 'editproduct'])->name('editproduct.post');
Route::get('delete/{id}', [ProductController::class, 'deleteproduct'])->name('delete');

// user
Route::get('userhome', [AuthController::class, 'userhome'])->name('userhome');
Route::get('products', [ProductController::class, 'store'])->name('products');
Route::get('addcart/{id}', [CartController::class, 'addcart'])->name('addcart');
Route::post('addcart', [CartController::class, 'addtocart'])->name('addcart.post');
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('buy/{id}', [CartController::class, 'buy'])->name('buy');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');










