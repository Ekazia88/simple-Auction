<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\SetbidController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CategoryController;

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
    return view('welcome');
});

//Authentication Route
Route::get('/Authentification', [AuthController::class, 'index'])->name('Authx');
Route::get('/Login/Admin',[AuthController::class,'indexadmin']);
Route::post('/postregister', [AuthController::class, 'postregister'])->name('postregister');
Route::post('/proseslogin',[AuthController::class, 'proseslogin'])->name('proseslogin');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');
Route::post('/Admin/store',[AuthController::class,'prosesloginadmin'])->name('adminlogin');

//Dashboard Route
Route::get('/Dashboard/Admin', [HomeController::class, 'index'])->name('dashboardadmin');
Route::get('/Dashboard/Officer', [HomeController::class, 'index3'])->name('dashboardofficer');
Route::get('/Home', [HomeController::class, 'index2'])->name('home');

//Admin And Officer Route
Route::group(['middleware' => ['auth','Ceklevel:admin,officer']], function(){
//Product Management Route
    Route::get('/Product', [ProductController::class,'index'])->name('product');
    Route::post('/product/store', [ProductController::class, 'store'])->name('storeproduct');
    Route::post('/Product/update',[ProductController::class, 'update'])->name('updateproduct');
    Route::get('/Product/edit/{id}',[ProductController::class, 'edit'])->name('editproduct');
    Route::get('/Product/show/{id}',[ProductController::class, 'show'])->name('showproduct');
    Route::delete('/Product/{id}', [ProductController::class, 'delete']);

//Category Management Route
    Route::get('/Category', [CategoryController::class,'index'])->name('category');
    Route::post('/Category/store', [CategoryController::class, 'store'])->name('storecat');
    Route::post('/Category/update',[CategoryController::class, 'update'])->name('updatecat');
    Route::get('/Category/edit/{id}',[CategoryController::class, 'edit'])->name('editcat');
    Route::delete('/Category/{id}', [ProductController::class, 'delete']);

//Report Route
    Route::post('input_auction',[ReportController::class,'report_auction'])->name('input_auction');
    Route::get('/Report/Auction',[ReportController::class,'report_auction'])->name('report_auction');
    Route::post('input_history',[ReportController::class,'report_history'])->name('input_history');
    Route::get('/Report/History/',[ReportController::class,'report_history'])->name('report_history');
    Route::get('export_auction', [ReportController::class,'export_auction']);
    Route::get('export_history/{auction_status}', [ReportController::class,'export_history'])->name('ExportH');

});
//Bidder Route
Route::group(['middleware' => ['auth','Ceklevel:admin']], function(){
//Admin Management Route
    Route::get('/Admin Management', [AdminController::class, 'index'])->name('AdminManagement');
    Route::post('/Admin Management/store',[AdminController::class, 'storeadmin'])->name('storeadmin');
    Route::get('/Admin Management/edit/{id}',[AdminController::class,'editadmin']);
    Route::post('/Admin Management/update',[AdminController::class, 'updateadmin']);
    Route::delete('/Admin Management/{id}', [AdminController::class, 'deleteadmin']);

//Officer Management Route
    Route::get('/Officer Management', [OfficerController::class, 'index'])->name('OfficerManagement');
    Route::post('/Officer Management/store',[OfficerController::class, 'store'])->name('storeofficer');
    Route::get('/Officer Management/edit/{id}',[OfficerController::class,'edit']);
    Route::post('/Officer Management/update',[OfficerController::class, 'update']);
    Route::delete('/Officer Management/{id}', [OfficerController::class, 'delete']);

//Bidder Management Route
    Route::get('/User Management', [UserController::class, 'index'])->name('UserManagement');
    Route::post('/User Management/store',[UserController::class, 'store'])->name('storeuser');
    Route::get('/User Management/edit/{id}',[UserController::class,'edit']);
    Route::post('/User Management/update',[UserController::class, 'update']);
    Route::delete('/User Management/{id}', [UserController::class, 'delete']);
        
    });
Route::group(['middleware' => ['auth','Ceklevel:officer']], function(){
//Auction Route    
    Route::get('/Auction', [AuctionController::class,'index'])->name('Auctionx');
    Route::post('/Auction/store',[AuctionController::class,'store'])->name('Astore');
    Route::post('/Auction/update',[AuctionController::class,'update'])->name('Aupdate');
    Route::get('/Auction/edit/{id}',[AuctionController::class,'edit']);    
    Route::get('/Auction/show/{id}',[AuctionController::class,'show']);
    Route::delete('/Auction/{id}',[AuctionController::class,'delete']);
    
//Bid Route
    Route::get('/Bid',[BidController::class,'index'])->name('Bid');
    Route::get('/Bid/status/{id}',[BidController::class,'status']);
});

Route::group(['middleware' =>['auth','Ceklevel:bidder']], function(){
    Route::get('/Bid/show/{id}', [SetbidController::class,'show'])->name('setbid');
    Route::post('/Setbid/store',[SetbidController::class,'store']);
    Route::get('/Setbid/data',[SetbidController::class,'data'])->name('History');
    Route::get('/product/{namec}', [HomeController::class,'Procat']);
});
