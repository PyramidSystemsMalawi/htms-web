<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


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


Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/login', 'UsersController@login')->name('login');
Route::get('/users', 'UsersController@index')->name('users_list')->middleware('auth');
Route::post('/users/login', 'AuthController@doLogin');
Route::get('/users/logout', 'AuthController@logout');
Route::post('/users/create', 'UsersController@create')->middleware('auth');
Route::get('/organisations', 'OrganisationsController@index')->name('organisations-list')->middleware('auth');
Route::post('/createOrganisation', 'OrganisationsController@create')->middleware('auth');
Route::get('/cases', 'CasesController@list')->name('case-list')->middleware('auth');

Route::get('/viewCase','CasesController@view')->middleware('auth');
Route::get('/cases/delete', 'CasesController@destroy')->middleware('auth');

Route::get('/reports', 'ReportsController@index')->name('reports-list')->middleware('auth');
Route::get('/viewReport', 'ReportsController@show')->middleware('auth');

Route::post('/cases/transfer', 'CaseTransferController@store');
Route::get('/users/{id}/delete', 'UsersController@destroy')->middleware('auth');

Route::get('/qualifiers', 'QualifiersController@index')->name('qualifiers-list')->middleware('auth');
Route::post('/qualifiers', 'QualifiersController@store')->middleware('auth');
Route::post('/qualifiers/update', 'QualifiersController@update')->middleware('auth');
Route::get('/qualifiers/delete', 'QualifiersController@destroy')->middleware('auth');

Route::get('/victims-list', 'VictimsController@list')->name('victims')->middleware('auth');
Route::get('viewVictim','VictimsController@view')->middleware('auth');
Route::get('/districts', 'SettingsController@index')->name('districts')->middleware('auth');
Route::post('/districts', 'SettingsController@store')->middleware('auth');
