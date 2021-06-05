<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BansosCategoryController;
use App\Http\Controllers\BansosDonationController;
use App\Http\Controllers\BansosReceiverController;
use App\Http\Controllers\BansosBankController;
use App\Http\Controllers\BansosContributorController;
use App\Http\Controllers\BansosItemController;
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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/bank', [BansosBankController::class, 'index'])->name('bank');
