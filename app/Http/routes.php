<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/admin/jobs','AdminController@jobs');
Route::get('/admin/createjob','AdminController@createJob');
Route::get('/admin/editjob/{id}','AdminController@editJob');
Route::post('/admin/createjob','AdminController@createJobPost');
Route::post('/admin/editjob/{id}','AdminController@editJobPost');

Route::get('/admin/reviewjob/{id}','AdminController@reviewJob');
Route::post('/admin/reviewjob/{id}','AdminController@reviewJobPost');

Route::get('/admin/transactions','AdminController@transactions');
Route::get('/admin/createtransaction','AdminController@createTransaction');
Route::get('/admin/edittransaction/{id}','AdminController@editTransaction');
Route::post('/admin/createtransaction','AdminController@createTransactionPost');
Route::post('/admin/edittransaction/{id}','AdminController@editTransactionPost');

Route::get('/user/job/{id}','UserController@job');
Route::get('/user/transactions','UserController@transactions');
Route::get('/user/claimJob/{id}','UserController@claimJob');
Route::get('/user/completeJob/{id}','UserController@completeJob');
Route::get('/user/jobs','UserController@jobs');