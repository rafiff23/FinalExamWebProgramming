<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuccessController;
use Illuminate\Support\Facades\App;
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
Route::redirect('/','/en');

Route::group(['prefix' => '{language}','middleware' => 'language'], function () {
    Route::get('/', function () {
        return view('index');
    });
    //authentication
    Route::get('/register', [AuthController::class, 'ShowRegister']);
    Route::post('/register', [AuthController::class, 'RegisterUser']);
    Route::get('/login', [AuthController::class, 'ShowLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'LoginUser']);
    

    //profile
    Route::get('/profile', [ProfileController::class, 'ShowProfile'])->name('profile')->middleware('auth');
    Route::put('/profile', [ProfileController::class, 'EditProfile']);

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/cart/success', [SuccessController::class, 'ShowSuccess']);
        Route::get('/home', [HomeController::class, 'ShowHomePage'])->name('home');
        Route::get('/history', [HistoryController::class, 'ShowHistory'])->name('history');
        Route::get('/history/{history}', [HistoryController::class, 'ShowDetailHistory']);
        Route::get('/home/{home}', [HomeController::class, 'ShowDetail']);
        Route::post('/home/{home}', [HomeController::class, 'BuyItem']);
        Route::get('/cart', [OrderController::class, 'ShowOrders'])->name('cart');
        Route::post('/cart', [OrderController::class, 'CheckOutOrders']);
        Route::delete('/cart/{cart}', [OrderController::class, 'DeleteOrder']);
        Route::resource('admin', AdminController::class)->middleware('admin');
        Route::resource('/item', ItemController::class)->middleware('admin');
    });
});
Route::post('/logout', [AuthController::class, 'LogoutUser'])->name('logout');
