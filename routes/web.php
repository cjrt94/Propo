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

Auth::routes();


Route::group(['middleware' => 'auth', 'prefix' => 'admin'  ], function () {

    Route::get('/', function () {
        return view('home');
    });

    //Products
    Route::get('/productos', 'ProductController@index')->name('indexProduct');
    Route::get('/productos/nuevo', 'ProductController@new')->name('newProduct');
    Route::post('/productos/crear', 'ProductController@store')->name('storeProduct');
    Route::get('/productos/editar/{product}', 'ProductController@edit')->name('editProduct');
    Route::put('/productos/update/{product}', 'ProductController@update')->name('updateProduct');
    Route::get('productos/filtrar}', 'ProductController@filter')->name('filterProduct');



    //Clients

    Route::get('/clientes', 'ClientController@index')->name('indexClient');
    Route::get('/clientes/nuevo', 'ClientController@new')->name('newClient');
    Route::post('/clientes/crear', 'ClientController@store')->name('storeClient');
    Route::get('/clientes/editar/{client}', 'ClientController@edit')->name('editClient');
    Route::put('/clientes/update/{client}', 'ClientController@update')->name('updateClient');

    Route::get('/provinces/{department}','ProvinceController@getProvinces')->name('getProvinces');
    Route::get('/districts/{province}','DistrictController@getDistricts')->name('getDistricts');
    Route::get('/clientes/filtrar}', 'ClientController@filter')->name('filterClient');



    //Propos

    Route::get('/cotizaciones', 'PropoController@index')->name('indexPropo');
    Route::get('/cotizaciones/nueva', 'PropoController@new')->name('newPropo');
    Route::post('/cotizaciones/crear', 'PropoController@store')->name('storePropo');
    Route::get('/cotizaciones/ver/{propo}', 'PropoController@view')->name('viewPropo');

    Route::get('cotizaciones/contacts/{client}','ClientController@getContacts')->name('getContacts');
    Route::get('cotizaciones/addresses/{client}','ClientController@getAddresses')->name('getAddresses');



});
