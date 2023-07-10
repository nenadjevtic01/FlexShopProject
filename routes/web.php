<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['authorized'])->group(function(){
    Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('Logout');
});

Route::middleware(['admin'])->group(function(){
    Route::get('/adminpanel',[\App\Http\Controllers\AdminController::class,'index'])->name('Admin panel');
    Route::get('/answermessage/{id}',[\App\Http\Controllers\MessageController::class,'index'])->name('Answer message');
    Route::post('/answermessage',[\App\Http\Controllers\MessageController::class,'sendAnswer'])->name('Send answer');
    Route::get('/adduser',[\App\Http\Controllers\UserController::class,'index'])->name('Add user');
    Route::post('/adduser',[\App\Http\Controllers\UserController::class,'addUser'])->name('Insert user');
    Route::get('/removeuser',[\App\Http\Controllers\UserController::class,'indexRemove'])->name('Remove user');
    Route::post('/removeuser',[\App\Http\Controllers\UserController::class,'removeUser'])->name('Delete user');
    Route::get('/unblockuser/{id}',[\App\Http\Controllers\AdminController::class,'unblockUser'])->name('Unblock user');
    Route::get('/blockuser/{id}',[\App\Http\Controllers\AdminController::class,'blockUser'])->name('Block user');
    Route::get('/clearstats',[\App\Http\Controllers\AdminController::class,'clearStats'])->name('Clear stats');
    Route::get('/orders',[\App\Http\Controllers\AdminController::class,'showOrders'])->name('Show orders');
    Route::get('/orders/{id}',[\App\Http\Controllers\AdminController::class,'showSingleReceipt'])->name('Show single receipt');
    Route::get('/updateproduct/{id}',[\App\Http\Controllers\AdminController::class,'updateProduct'])->name('Update product');
    Route::post('/updateproduct',[\App\Http\Controllers\AdminController::class,'updateProductPrice'])->name('Update product price');
});

Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('Home');
Route::post('/messages',[\App\Http\Controllers\MessageController::class,'sendMessage'])->name('Send message');
Route::get('/products',[\App\Http\Controllers\ProductController::class,'index'])->name('Browse products');
Route::post('/addcart',[\App\Http\Controllers\CartController::class,'addToCart'])->name('Add to cart');
Route::post('/deletefromcart',[\App\Http\Controllers\CartController::class,'removeFromCart'])->name('Remove from cart');
Route::get('/clearfilter',function (){
    session()->forget('filter');
    return redirect()->route('Browse products');
});
Route::get('/contact',[\App\Http\Controllers\ContactController::class,'index'])->name('Contact');
Route::get('/products/{id}',[\App\Http\Controllers\ProductController::class,'showOne'])->name('Show one');
Route::get('/author',[\App\Http\Controllers\AuthorController::class,'index'])->name('Author');
Route::get('/cart',[\App\Http\Controllers\CartController::class,'index'])->name('Cart');

Route::middleware(['cartExist'])->group(function (){
    Route::get('/checkout',[\App\Http\Controllers\CheckoutController::class,'index'])->name('Checkout');
    Route::post('/confirmorder',[\App\Http\Controllers\CheckoutController::class,'confirmOrder'])->name('Confirm order');
});

Route::middleware(['notauthorized'])->group(function(){
    Route::get('/login',[\App\Http\Controllers\LoginController::class,'index'])->name('Login page');
    Route::post('/login',[\App\Http\Controllers\LoginController::class,'login'])->name('Login');
    Route::get('/register',[\App\Http\Controllers\RegisterController::class,'index'])->name('Register page');
    Route::post('/register',[\App\Http\Controllers\RegisterController::class,'register'])->name('Register');
});

