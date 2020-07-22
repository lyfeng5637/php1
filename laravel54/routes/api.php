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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::match(['get', 'post', 'put', 'delete'],'user/{user_id}', 'usersController@getRequest');

Route::get('user/{user_id}', 'usersController@getData');
Route::post('user', 'usersController@postData');

Route::post('user/update', 'usersController@updateData');
Route::get('user/delete/{user_id}', 'usersController@deleteData');
