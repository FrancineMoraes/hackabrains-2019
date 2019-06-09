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

Route::post('user/store', 'UserController@store');
Route::post('mapping/store', 'MappingController@store');
Route::get('mapping_types/index', 'MappingTypeController@index');
//Route::post('', 'Auth\LoginController@login');

Route::group(['middleware' => ['web']], function () {
    // your routes here
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
