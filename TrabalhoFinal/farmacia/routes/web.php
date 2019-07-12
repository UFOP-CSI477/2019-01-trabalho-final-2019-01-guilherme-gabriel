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



Route::get('/', 'RemedioController@index')->name('/');

Route::get('/controleEstoque/remedio', 'RemedioController@telaEstoque')->name('/controleEstoque/remedio');

Route::get('/controleEstoque/compra', 'CompraController@index')->name('/controleEstoque/compra');

Route::get('/comprar', 'RemedioController@show')->name('/comprar');

Route::get('/retirarEstoque/{id}', ['as' => 'remedio.updateEstoque', 'uses' => 'RemedioController@updateEstoque']);

Route::get('/controleEstoque', 'Controller@estoque')->name('/controleEstoque');

Route::resource('remedios', 'RemedioController');

Route::resource('compras', 'CompraController');

Route::get('/autentica', 'RemedioController@autentica')->name('/autentica');

Route::post('/home/buscar', 'RemedioController@searchRemedio')->name('/home/buscar');

Route::get('/home/filtrado', 'ClienteController@filtrar')->name('/home/filtrado');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
