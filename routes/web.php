<?php

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

Route::get('/', function () {
    return redirect(route('employees.index'));
})->name('home');

Route::resource('/employees','EmployeController');
Route::patch('employees/{employee}/restore','EmployeController@restore')->name('employees.restore');
Route::delete('employees/{employee}/totalDelete','EmployeController@forceDelete')->name('employees.totalDelete');


Route::get('/{employee}/contrato','ContractController@create')->name('contract.create');
Route::post('/contrato/{employee}','ContractController@store')->name('contract.store');

Route::get('/queryforarea','EmployeController@queryforarea')->name('queryforarea');
Route::get('/queryforcargo','EmployeController@queryforcargo')->name('queryforcargo');
