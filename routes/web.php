<?php

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

Auth::routes();

Route::get('/home','HomeController@index');



/**********************Employee Controller*************************************/
Route::get('/Dashboard/employeeHome', 'EmployeeController@index');
Route::post('/Dashboard/employeeHome/store', 'EmployeeController@store');
Route::get('/Dashboard/employeeHome/{id}/Edit', 'EmployeeController@edit');
Route::post('/Dashboard/employeeHome/{id}/store', 'EmployeeController@update');
Route::post('/Dashboard/employeeHome/{id}/Delete', 'EmployeeController@destroy');




/****************Company Controller**************************/
Route::get('/Dashboard/companyHome', 'CompanyController@index');
Route::post('/Dashboard/companyHome/store', 'CompanyController@store');
Route::get('/Dashboard/companyHome/{id}/Edit', 'CompanyController@edit');
Route::post('/Dashboard/companyHome/{id}/store', 'CompanyController@update');
Route::post('/Dashboard/companyHome/{id}/Delete', 'CompanyController@destroy');
Route::get('/Dashboard/{name}/{id}/employees','CompanyController@allEmployees');
