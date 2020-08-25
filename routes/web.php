<?php

use Illuminate\Support\Facades\Auth;
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
	// return view('welcome');

	$links = \App\Link::all();

	return view('welcome', ['links' => $links]);
	
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/department', 'DepartmentController@index')->name('department');
Route::post('/department', 'DepartmentController@create')->name('department');

Route::get('/position', 'PositionController@index')->name('position');
Route::post('/position', 'PositionController@create')->name('position');

Route::get('/employee', 'EmployeeController@index')->name('employee');
Route::post('/employee', 'EmployeeController@create')->name('employee');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile', 'ProfileController@create')->name('profile');

Route::get('/employee/profile/detail/{id}','EmployeeController@show')->name('detail');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//file_export_import
Route::post('file-import', 'EmployeeController@fileImport')->name('file-import');
Route::get('file-export', 'EmployeeController@fileExport')->name('file-export');

Route::post('file-import', 'PositionController@fileImport')->name('file-import');
Route::get('file-export-csv', 'PositionController@fileExportCSV')->name('file-export-csv');
Route::get('file-export-xlsx', 'PositionController@fileExportXLSX')->name('file-export-xlsx');

//file_pdf
Route::get('/employee/pdf','EmployeeController@createPDF');
Route::get('/position/pdf','PositionController@createPDF');
Route::get('/profile/pdf','ProfileController@createPDF');
