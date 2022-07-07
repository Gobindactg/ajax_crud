<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PagesController;

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

Route::get('/pdf', [PagesController::class, 'pdf'])->name('pdf');
Route::get('/customer', [PagesController::class, 'studentView'])->name('studentView');
Route::post('/addCustomer', [PagesController::class, 'addCustomer'])->name('addCustomer');

Route::get('/showCustomer/{id}', [PagesController::class, 'showCustomer'])->name('showCustomer');

Route::get('/updateCustomer/{id}', [PagesController::class, 'updateCustomer'])->name('updateCustomer');

Route::post('/updateCustomers', [PagesController::class, 'updateData'])->name('updateData');

Route::post('/deleteCustomers/{id}', [PagesController::class, 'deleteCustomer'])->name('deleteCustomer');
