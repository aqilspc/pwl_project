<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BansosBankController;
use App\Http\Controllers\BansosDonationController;
use App\Http\Controllers\BansosReceiverController;
use App\Http\Controllers\BansosCategoryController;
use App\Http\Controllers\BansosContributorController;
use App\Http\Controllers\BansosItemController;
use App\Http\controllers\ReportController;
use App\Http\Controllers\WebController;
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
    return redirect('homepage');
});

Auth::routes();
//web
Route::get('/homepage', [WebController::class, 'index']);
Route::get('/login/auth', [WebController::class, 'login_auth']);
//home dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home');
//logout
Route::post('/log_out_admin', [UserController::class, 'log_out_admin']);
Route::get('/log_out_customer', [UserController::class, 'log_out_customer']);
//register
Route::post('/register_auth', [WebController::class, 'register_auth']);
Route::post('/donation_donate/{id}', [WebController::class, 'donateNow']);
//Bank
Route::get('/bank', [BansosBankController::class, 'index'])->name('bank');
Route::post('/bank_add', [BansosBankController::class, 'create'])->name('bank_add');
Route::post('/bank_update/{id}', [BansosBankController::class, 'update'])->name('bank_update');
Route::get('/bank_delete/{id}', [BansosBankController::class, 'delete'])->name('bank_delete');
//Category
Route::get('/category', [BansosCategoryController::class, 'index'])->name('category');
Route::post('/category_add', [BansosCategoryController::class, 'create'])->name('category_add');
Route::post('/category_update/{id}', [BansosCategoryController::class, 'update'])->name('category_update');
Route::get('/caetegory_delete/{id}', [BansosCategoryController::class, 'delete'])->name('category_delete');
//Contributor
Route::get('/contributor', [BansosContributorController::class, 'index'])->name('contributor');
Route::post('/contributor_add', [BansosContributorController::class, 'create'])->name('contributor_add');
Route::post('/contributor_update/{id}', [BansosContributorController::class, 'update'])->name('contributor_update');
Route::get('/contributor_delete/{id}', [BansosContributorController::class, 'delete'])->name('contributor_delete');
//Donation
Route::get('/donation', [BansosDonationController::class, 'index'])->name('donation');
Route::post('/donation_add', [BansosDonationController::class, 'create'])->name('donation_add');
Route::post('/donation_update/{id}', [BansosDonationController::class, 'update'])->name('donation_update');
Route::get('/donation_delete/{id}', [BansosDonationController::class, 'delete'])->name('donation_delete');
//Item
Route::get('/transaction', [BansosItemController::class, 'index'])->name('transaction');
Route::post('/transaction_add', [BansosItemController::class, 'create'])->name('transaction_add');
Route::post('/transaction_update/{id}', [BansosItemController::class, 'update'])->name('transaction_update');
Route::get('/transaction_delete/{id}', [BansosItemController::class, 'delete'])->name('transaction_delete');
//Receiver
Route::get('/receiver', [BansosReceiverController::class, 'index'])->name('receiver');
Route::post('/receiver_add', [BansosReceiverController::class, 'create'])->name('receiver_add');
Route::post('/receiver_update/{id}', [BansosReceiverController::class, 'update'])->name('receiver_update');
Route::get('/receiver_delete/{id}', [BansosReceiverController::class, 'delete'])->name('receiver_delete');
//Report
Route::get('/report', [ReportController::class, 'index'])->name('report');
Route::post('/report_detail', [ReportController::class, 'create'])->name('report_detail');



