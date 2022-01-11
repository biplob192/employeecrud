<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutocompleteSearchController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CorrespondentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\AdsPriceController;
use App\Http\Controllers\ChequeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAuth;


Route::get('/district', [DistrictController::class, 'index']);
Route::view('/in', 'index');
Route::get('/email', [EmailController::class, 'index']);
Route::get('/111', [TestController::class, 'getCorres']);
Route::get('/search', [EmployeeController::class, 'search']);
Route::get('/test', [TestController::class, 'index']);
Route::get('/ajaxcall', [TestController::class, 'ajaxcall']);
Route::get('/division', [DivisionController::class, 'getDivisions']);
Route::get('/autocomplete-search', [AutocompleteSearchController::class, 'index'])->name('autocomplete.search.index');
Route::get('/autocomplete-search-query', [AutocompleteSearchController::class, 'query'])->name('autocomplete.search.query');
Route::get('/gd-search-query', [AdController::class, 'query'])->name('gd.search.query');
// Route::middleware([CheckAuth::class])->group(function () {
// });

Route::get('/dbtest', 'App\Http\Controllers\DatabaseController@dbConn');
// Route::get('/addstaff', function () {
//     return view('office_staff');
// });
// Route::post('/addstaff', [StaffController::class, 'store']);
// Route::get('/mlist', [StaffController::class, 'mlist']);

// Route::get('/delete/{id}', [StaffController::class, 'delete']);
// Route::get('/edit/{id}', [StaffController::class, 'edit']);
// Route::post('/updatemember', [StaffController::class, 'updateMember']);

Route::post('/login', [LoginController::class, 'postLogin']);
Route::get('/login', [LoginController::class, 'login']);
Route::get('/dashboard', [HomeController::class, 'dashboard']);
Route::get('/', [HomeController::class, 'home']);

// Protected route for Login users
Route::middleware([CheckAuth::class])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout']);
});

// Route::middleware()->group();

// Routes for Role or Permission
Route::group(['middleware' => ['ckauth','role_or_permission:admin|super_admin|edit']],function () {
  
});

// Routes for Super Admin
Route::group(['middleware' => [CheckAuth::class,'role:super_admin']],function () {
    Route::post('/user', [userController::class, 'store']);
    Route::put('/user/{id}', [userController::class, 'update']);
    Route::post('/user_update', [userController::class, 'user_update']);
});

// Routes for Admin & Super Admin
Route::group(['middleware' => [CheckAuth::class,'role:admin|super_admin']],function () {
    Route::delete('/correspondent/{id}', [CorrespondentController::class, 'delete']);
    Route::delete('/employee/{id}', [EmployeeController::class, 'delete']);
    Route::delete('/ad/{id}', [AdController::class, 'delete']);
    Route::delete('/ad_price/{id}', [AdsPriceController::class, 'destroy']);
    Route::delete('/cheque/{id}', [chequeController::class, 'destroy']);
    Route::delete('/commission/{id}', [CommissionController::class, 'destroy']);
    Route::post('/overwrite-wallet', [CorrespondentController::class, 'overwriteWallet']);
});

// Routes for Editor
Route::group(['middleware' => [CheckAuth::class,'role:admin|super_admin|editor']],function () {    
    Route::get('/users', [userController::class, 'index']);
    Route::get('/ad/{id}/edit', [AdController::class, 'edit']);
    Route::put('/ad/{id}', [AdController::class, 'update']);
    Route::get('/employee', [EmployeeController::class, 'create']);
    Route::post('/employee', [EmployeeController::class, 'store']);    
    Route::get('/employee/{id}', [EmployeeController::class, 'show']);
    Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit']);
    Route::put('/employee/{id}', [EmployeeController::class, 'update']); 
    Route::get('/ad_price', [AdsPriceController::class, 'create']);
    Route::post('/ad_price', [AdsPriceController::class, 'store']);
    Route::get('/ad_prices', [AdsPriceController::class, 'index']);
    Route::get('/ad_price/{id}', [AdsPriceController::class, 'show']);
    Route::get('/ad_price/{id}/edit', [AdsPriceController::class, 'edit']);
    Route::put('/ad_price/{id}', [AdsPriceController::class, 'update']);
    Route::get('/cheque/{id}/edit', [chequeController::class, 'edit']);
    Route::put('/cheque/{id}', [chequeController::class, 'update']);
    Route::get('/commission/{id}/edit', [CommissionController::class, 'edit']);
    Route::put('/commission/{id}', [CommissionController::class, 'update']);
    Route::get('/corrwallets', [CorrespondentController::class, 'indexWallets']);    
});

// Routes for All
Route::group(['middleware' => [CheckAuth::class,'role:admin|super_admin|editor|user']],function () {
    Route::get('/correspondent', [CorrespondentController::class, 'create']);
    Route::post('/correspondent', [CorrespondentController::class, 'store']);
    Route::get('/correspondents', [CorrespondentController::class, 'index']);    
    Route::get('/correspondent/{id}', [CorrespondentController::class, 'show']);
    Route::get('/correspondent/{id}/edit', [CorrespondentController::class, 'edit']);
    Route::put('/correspondent/{id}', [CorrespondentController::class, 'update']); 
    Route::get('getDistrict', [CorrespondentController::class, 'getDistrict'])->name('getDistrict');
    Route::get('getUpazila', [CorrespondentController::class, 'getUpazila'])->name('getUpazila');    
    Route::get('/employees', [EmployeeController::class, 'index']);
    Route::get('/ad', [AdController::class, 'create']);
    Route::post('/ad', [AdController::class, 'store']);
    Route::get('/ads', [AdController::class, 'indexV2']);
    Route::get('/ads/export', [AdController::class, 'exportAds']);
    Route::get('/ad/{id}', [AdController::class, 'show']);
    Route::get('/ad/{id}/bill', [AdController::class, 'print_bill']);
    Route::get('/address', [AdController::class, 'getAddress']);
    Route::get('/filt_ads', [AdController::class, 'filterAds']);
    Route::post('/ads_filter_date', [AdController::class, 'filterAdsDate']);
    Route::get('/bill', [AdController::class, 'printBill']);
    Route::get('/cheque', [chequeController::class, 'create']);
    Route::post('/cheque', [chequeController::class, 'store']);
    Route::get('/cheques', [chequeController::class, 'index']);
    Route::get('/cheque/{id}', [chequeController::class, 'show']);    
    Route::get('/gdprice', [chequeController::class, 'getGdPrice']);
    Route::get('/commission', [chequeController::class, 'createCommission']);
    Route::post('/commission', [CommissionController::class, 'store']);
    Route::get('/commissions', [CommissionController::class, 'index']);    
});

Route::get('/apihit', [TestController::class, 'apiHit']);  