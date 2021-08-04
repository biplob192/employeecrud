<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ConrrespondentController;
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
use App\Http\Middleware\CheckAuth;
use App\Http\Controllers\AutocompleteSearchController;

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
// Route::get('/', function () {
//     return view('welcome');
// });

// --------------------- Test Routes ------------------------------

Route::get('/district', [DistrictController::class, 'index']);
Route::view('/in', 'index');
Route::get('/email', [EmailController::class, 'index']);

Route::get('/search', [EmployeeController::class, 'search']);
Route::get('/test', [TestController::class, 'index']);
Route::get('/ajaxcall', [TestController::class, 'ajaxcall']);
Route::get('/division', [DivisionController::class, 'getDivisions']);
Route::get('/autocomplete-search', [AutocompleteSearchController::class, 'index'])->name('autocomplete.search.index');
Route::get('/autocomplete-search-query', [AutocompleteSearchController::class, 'query'])->name('autocomplete.search.query');
Route::get('/gd-search-query', [AdController::class, 'query'])->name('gd.search.query');


// --------------------- Test Routes ------------------------------




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
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/', [HomeController::class, 'home']);
Route::get('/dashboard', [HomeController::class, 'dashboard']);



// protected route
Route::middleware([CheckAuth::class])->group(function () {
    
    // Correspondent CRUD Routes
    
    Route::get('/correspondent', [ConrrespondentController::class, 'create']);
    Route::post('/correspondent', [ConrrespondentController::class, 'store']);
    Route::get('/correspondents', [ConrrespondentController::class, 'index']);
    Route::get('/correspondent/{id}', [ConrrespondentController::class, 'show']);
    Route::get('/correspondent/{id}/edit', [ConrrespondentController::class, 'edit']);
    Route::put('/correspondent/{id}', [ConrrespondentController::class, 'update']);
    Route::delete('/correspondent/{id}', [ConrrespondentController::class, 'delete']);
    Route::get('getDistrict',[ConrrespondentController::class, 'getDistrict'])->name('getDistrict');
    Route::get('getUpazila',[ConrrespondentController::class, 'getUpazila'])->name('getUpazila');



    //Employee CRUD Routes

    Route::get('/employee', [EmployeeController::class, 'create']);
    Route::post('/employee', [EmployeeController::class, 'store']);
    Route::get('/employees', [EmployeeController::class, 'index']);
    Route::get('/employee/{id}', [EmployeeController::class, 'show']);
    Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit']);
    Route::put('/employee/{id}', [EmployeeController::class, 'update']);
    Route::delete('/employee/{id}', [EmployeeController::class, 'delete']);


    //Ad CRUD Routes

    Route::get('/ad', [AdController::class, 'create']);
    Route::post('/ad', [AdController::class, 'store']);
    Route::get('/ads', [AdController::class, 'index']);
    Route::get('/ad/{id}', [AdController::class, 'show']);
    Route::get('/ad/{id}/edit', [AdController::class, 'edit']);
    Route::get('/ad/{id}/bill', [AdController::class, 'print_bill']);
    Route::put('/ad/{id}', [AdController::class, 'update']);
    Route::delete('/ad/{id}', [AdController::class, 'delete']);
    Route::get('/address', [AdController::class, 'getAddress']);
    
    Route::get('/bill', [AdController::class, 'printBill']); //Sample Bill Page


    //Ad_Price CRUD Routes

    Route::get('/ad_price', [AdsPriceController::class, 'create']);
    Route::post('/ad_price', [AdsPriceController::class, 'store']);
    Route::get('/ad_prices', [AdsPriceController::class, 'index']);
    Route::get('/ad_price/{id}', [AdsPriceController::class, 'show']);
    Route::get('/ad_price/{id}/edit', [AdsPriceController::class, 'edit']);
    Route::put('/ad_price/{id}', [AdsPriceController::class, 'update']);
    Route::delete('/ad_price/{id}', [AdsPriceController::class, 'destroy']);


    //Cheque CRUD Routes

    Route::get('/cheque', [chequeController::class, 'create']);
    Route::post('/cheque', [chequeController::class, 'store']);
    Route::get('/cheques', [chequeController::class, 'index']);
    Route::get('/cheque/{id}', [chequeController::class, 'show']);
    Route::get('/cheque/{id}/edit', [chequeController::class, 'edit']);
    Route::put('/cheque/{id}', [chequeController::class, 'update']);
    Route::delete('/cheque/{id}', [chequeController::class, 'destroy']);
    Route::get('/gdprice', [chequeController::class, 'getGdPrice']);
    

});





