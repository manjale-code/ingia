<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SalesmanController;

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
    return view('auth/login');
});

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/manager', 'ManagerController@index')->name('manager')->middleware('manager');
Route::get('/pharmacist', 'PharmacistController@index')->name('pharmacist')->middleware('pharmacist');
Route::get('/salesman', 'SalesmanController@index')->name('salesman')->middleware('salesman');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//medicine
Route::get('/Adminlte.index', [App\Http\Controllers\MedicineController::class, 'index'])->name('Adminlte.index');
Route::get('/Adminlte.create', [App\Http\Controllers\MedicineController::class, 'create'])->name('Adminlte.create');
Route::post('/Adminlte.store', [App\Http\Controllers\MedicineController::class, 'store'])->name('Adminlte.store');
Route::get('/Adminlte.edit{id}', [App\Http\Controllers\MedicineController::class, 'edit'])->name('Adminlte.edit');
Route::put('/Adminlte.update', [App\Http\Controllers\MedicineController::class, 'update'])->name('Adminlte.update');
Route::delete('/Adminlte.destroy{id}', [App\Http\Controllers\MedicineController::class, 'destroy'])->name('Adminlte.destroy');
