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

Route::get('/', 'DashboardController@index');//->middleware('sessionCheck');
Route::get('/dashboard', 'DashboardController@index');//->middleware('sessionCheck');
Route::get('/login', 'UsersController@login')->name('login');

Route::get('/users', 'UsersController@index')->name('users_list');//->middleware('sessionCheck');

Route::post('/users/create', 'UsersController@create');//->middleware('sessionCheck');
Route::get('/organisations', 'OrganisationsController@index')->name('organisations-list');//->middleware('sessionCheck');
Route::post('/createOrganisation', 'OrganisationsController@create');//->middleware('sessionCheck');
Route::get('/cases', 'CasesController@list')->name('case-list');//->middleware('sessionCheck');

Route::get('/viewCase','CasesController@view');//->middleware('sessionCheck');
Route::get('/cases/delete', 'CasesController@destroy');//->middleware('sessionCheck');

Route::get('/reports', 'ReportsController@index')->name('reports-list');//->middleware('sessionCheck');
Route::get('/viewReport', 'ReportsController@show');//->middleware('sessionCheck');

Route::post('/cases/transfer', 'CaseTransferController@store');
Route::get('/users/{id}/delete', 'UsersController@destroy');//->middleware('sessionCheck');
