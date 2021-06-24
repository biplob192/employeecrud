<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ConrrespondentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\AdsPriceController;
use App\Http\Middleware\CheckAuth;

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
// Route::view('/', 'index');
// Route::middleware([CheckAuth::class])->group(function () {

// });


Route::view('/tc', 'tc');
Route::get('/dbtest', 'App\Http\Controllers\DatabaseController@dbConn');
Route::get('/addstaff', function () {
    return view('office_staff');
});
Route::post('/addstaff', [StaffController::class, 'addStaff']);
Route::get('/mlist', [StaffController::class, 'mlist']);

// Route::get('/delete/{id}', [StaffController::class, 'delete']);
// Route::get('/edit/{id}', [StaffController::class, 'edit']);
// Route::post('/updatemember', [StaffController::class, 'updateMember']);

Route::post('/login', [LoginController::class, 'postLogin']);
Route::get('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/', [HomeController::class, 'home']);
Route::get('/dashboard', [HomeController::class, 'dashboard']);


// Correspondent CRUD Routes

Route::get('/correspondent', [ConrrespondentController::class, 'create']);
Route::post('/correspondent', [ConrrespondentController::class, 'store']);


// protected route
Route::middleware([CheckAuth::class])->group(function () {
    Route::get('/correspondents', [ConrrespondentController::class, 'index']);
    Route::get('/correspondent/{id}', [ConrrespondentController::class, 'show']);
    Route::get('/correspondent/{id}/edit', [ConrrespondentController::class, 'edit']);
    Route::put('/correspondent/{id}', [ConrrespondentController::class, 'update']);
    Route::delete('/correspondent/{id}', [ConrrespondentController::class, 'delete']);


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
    Route::get('/ad/{id}/bill', [AdController::class, 'create_bill']);
    Route::put('/ad/{id}', [AdController::class, 'update']);
    Route::delete('/ad/{id}', [AdController::class, 'delete']);


    //Ad_Price CRUD Routes

    Route::get('/ad_price', [AdsPriceController::class, 'create']);
    Route::post('/ad_price', [AdsPriceController::class, 'store']);
    Route::get('/ad_prices', [AdsPriceController::class, 'index']);
    Route::get('/ad_price/{id}', [AdsPriceController::class, 'show']);
    Route::get('/ad_price/{id}/edit', [AdsPriceController::class, 'edit']);
    Route::put('/ad_price/{id}', [AdsPriceController::class, 'update']);
    Route::delete('/ad_price/{id}', [AdsPriceController::class, 'destroy']);

});





