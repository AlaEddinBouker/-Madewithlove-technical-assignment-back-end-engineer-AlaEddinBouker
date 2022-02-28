<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\api\CartController as ApiCartController;

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

Route::get('/',[ProductController::class,'index'])->name('home');


//Cart Routes
Route::prefix('cart')->as('cart.')->group(function(){
    Route::get('/',[CartController::class,'index'])->name('show');
    Route::post('add',[CartController::class,'add'])->name('add');
    Route::get('/delete/{id}',[CartController::class,'delete'])->name('delete');
    Route::get('/checkout',[CartController::class,'checkout'])->name('checkout');

});
//End Cart Routes

Route::prefix('api')->group(function(){
    Route::get('/cart',[ApiCartController::class,'index'])->name('cart');
    Route::delete('cart/delete/{id}',[ApiCartController::class,'delete'])->name('delete');
});

