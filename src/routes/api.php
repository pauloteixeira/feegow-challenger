<?php

use Illuminate\Http\Request;

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

Route::get('/specialties/list', 'FeegowApiController@listSpecialties')->name("specialties.list");
Route::get('/patient/source/list', 'FeegowApiController@listPatiantSource')->name("patient.list.source");
Route::post('/professionals/list', 'FeegowApiController@listProfessionals')->name("professionals.list");
Route::post('/appointment/save', 'AppointmentController@save')->name("appointment.save");
