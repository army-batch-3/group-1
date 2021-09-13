<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TranportationController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RestockController;

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

// UI


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
	
	//Transportation
	Route::post('/transpo', [TranportationController::class, 'create'])->name('transpo.create');
	Route::put('/transpo/update/{id}', [TranportationController::class, 'update'])->name('transpo.update');
	Route::delete('/transpo/delete/{id}', [TranportationController::class, 'delete'])->name('transpo.delete');

	//Supplier
	Route::post('/supplier', [SupplierController::class, 'create'])->name('supplier.create');
	Route::put('/supplier/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
	Route::delete('/supplier/delete/{id}', [SupplierController::class, 'delete'])->name('supplier.delete');

	//warehouse
	Route::post('/warehouse', [WarehouseController::class, 'create'])->name('warehouse.create');
	Route::put('/warehouse/update/{id}', [WarehouseController::class, 'update'])->name('warehouse.update');
	Route::delete('/warehouse/delete/{id}', [WarehouseController::class, 'delete'])->name('warehouse.delete');

	//Asset
	Route::post('/asset', [AssetController::class, 'create'])->name('asset.create');
	Route::put('/asset/update/{id}', [AssetController::class, 'update'])->name('asset.update');
	Route::delete('/asset/delete/{id}', [AssetController::class, 'delete'])->name('asset.delete');

	//Employee
	Route::post('/employee', [EmployeeController::class, 'create'])->name('employee.create');
	Route::put('/employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
	Route::delete('/employee/delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');

	//Restock
	Route::post('/restock', [RestockController::class, 'create'])->name('restock.create');
	Route::put('/restock/update/{id}', [RestockController::class, 'update'])->name('restock.update');
});

Route::post('/test', 'App\Http\Controllers\PageController@test')->name('test');

//https://docs.google.com/presentation/d/13Yqp9_tDOhSdSpWcC0MGFr1zoAEKchzr2EHfX523mH0/edit#slide=id.gee485c7f1b_0_0