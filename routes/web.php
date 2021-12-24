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
Route::group(['middleware' => ['admin']], function(){
    Route::get('/updateProduct/{id}',[\App\Http\Controllers\ProductController::class,'getUpdateProductPage']);

    Route::get('/deleteUser/{id}',[\App\Http\Controllers\UserController::class,'deleteUser']);

    Route::post('/insertProduct',[\App\Http\Controllers\ProductController::class, 'insertProduct']);

    Route::get('/insertProduct',[\App\Http\Controllers\ProductController::class,'getInsertProductPage']);

    Route::put('/updateProduct',[\App\Http\Controllers\ProductController::class,'updateProduct']);

    Route::get('/manageUser', [\App\Http\Controllers\UserController::class,'getManageUserPage']);
});

Route::group(['middleware' => ['customer']], function(){
    Route::get('/transactionDetail/{id}',[\App\Http\Controllers\DetailController::class, 'getDetailTransactionPage']);

    Route::get('/deleteCart/{id}',[\App\Http\Controllers\CartController::class, 'deleteCart']);

    Route::get('/transaction',[\App\Http\Controllers\TransactionController::class, 'getTransactionPage']);

    Route::get('/cart',[\App\Http\Controllers\CartController::class, 'getCartPage']);

    Route::get('/checkout',[\App\Http\Controllers\TransactionController::class, 'addTransaction']);

    Route::post('/addCart',[\App\Http\Controllers\CartController::class, 'addCart']);

    Route::get('/updateProfile',[\App\Http\Controllers\UserController::class,'getUpdateProfilePage']);

    Route::put('/updateProfile',[\App\Http\Controllers\UserController::class,'updateProfile']);
});

Route::group(['middleware' => ['nonguest']], function(){
    Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout']);
});

Route::group(['middleware' => ['guest']], function(){
    Route::post('/login', [\App\Http\Controllers\UserController::class,'login']);

    Route::get('/login', [\App\Http\Controllers\UserController::class,'getLoginPage']);

    Route::post('/register', [\App\Http\Controllers\UserController::class,'register']);

    Route::get('/register', [\App\Http\Controllers\UserController::class,'getRegisterPage']);
});

Route::get('/detail/{id}',[\App\Http\Controllers\ProductController::class, 'getDetailPage']);

Route::get('/search/{type}', [\App\Http\Controllers\ProductController::class, 'getSearchPage']);

#kalu dia ga ada param lempar ke all aja
Route::get('/search', [\App\Http\Controllers\ProductController::class, 'search']);

Route::get('/', [\App\Http\Controllers\ProductController::class, 'getHomePage']);
