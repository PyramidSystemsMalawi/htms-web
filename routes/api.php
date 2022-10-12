<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function(){
    Route::post('users/auth', 'UsersController@authenticate');
    Route::post('users', 'UsersController@store');
    Route::get('users', 'UsersController@all');
    Route::post('users/update_password', 'UsersController@updatePIN');
    Route::get('users/{user_id}', 'UsersController@find');

    Route::resource('exhibit', 'ExhibitController');

});

Route::prefix('v1')->group(function(){
    Route::get('organisations/officers', 'UsersController@matchByOrganisation');
    Route::get('organisations/reports', 'ReportsController@getOrgReports');

    Route::resource('organisations', 'OrganisationsController');
    Route::resource('cases', 'CasesController');
    Route::resource('victims', 'VictimsController');
    Route::resource('suspects', 'SuspectsController');
    Route::resource('notes', 'NotesController');
    Route::resource('assessments', 'VictimsAssesmentController');
    Route::resource('districts', 'DistrictController');
    Route::get('qualifiers', 'QualifiersController@list');
    Route::post('qualifiers/responses', 'QualifierResponsesController@store');
    Route::get('qualifiers/responses', 'QualifierResponsesController@index');
    Route::get('qualifier/responses/victim', 'VictimsController@getInterviewResponses');

});







