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
    return view('welcome');
});

//Rotas Admin
Route::group(['middleware' => ['auth'], 'namespace' => 'Admin'], function(){
	Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
		Route::get('/', 'AdminController@index')->name('index');

        // Rotas de Oportunidades
        Route::get('opportunitys', 'OpportunitysController@index')->name('opportunitys.index');
		Route::get('opportunitys/create', 'OpportunitysController@create')->name('opportunitys.create');
		Route::post('opportunitys/create', 'OpportunitysController@store')->name('opportunitys.store');
		Route::get('opportunitys/{opportunity}/edit', 'OpportunitysController@edit')->name('opportunitys.edit');
		Route::patch('opportunitys/update/{opportunity}', 'OpportunitysController@update')->name('opportunitys.update');
		Route::delete('opportunitys/delete/{opportunity}', 'OpportunitysController@destroy')->name('opportunitys.destroy');
	});
});

Auth::routes();