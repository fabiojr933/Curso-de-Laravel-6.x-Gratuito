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
/*
Route::middleware([])->group(function () {
Route::prefix('admin')->group(function () {
Route::namespace ('Admin')->group(function () {
Route::name('admin.')->group(function () {
Route::get('dasboard', 'TesteController@teste')->name('dasboard');

Route::get('financeiro', 'TesteController@teste')->name('financeiro');

Route::get('/', 'TesteController@teste')->name('home');
});
});
});
});*/
/*
Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');
Route::post('products', 'ProductController@create')->name('products.create');
Route::get('/products/{id}', 'ProductController@show')->name('products.show');
Route::get('/products', 'ProductController@index')->name('products.index');
Route::post('/products', 'ProductController@store')->name('products.store');
Route::put('/products/{id}', 'ProductController@update')->name('products.update');
Route::delete('/products/{id}', 'ProductController@destroy')->name('products.destroy');
 */
Route::get('login', function () {
    return 'Login';
});

Route::resource('products', 'ProductController')->middleware('auth');

Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'admin',
    'name' => 'admin.',
], function () {
    Route::get('dasboard', 'TesteController@teste')->name('dasboard');
    Route::get('financeiro', 'TesteController@teste')->name('financeiro');
    Route::get('/', 'TesteController@teste')->name('home');
});

Route::get('/redirect1', function () {
    return redirect('/redirect2');
});

Route::redirect('/redirect3', '/contato');

Route::get('/redirect2', function () {
    return 'redirect 02';
});

Route::get('/produtos/{id?}', function ($id = '') {
    return "paramentros {$id}";
});

Route::get('/categoria/{id}', function ($id) {
    return $id;
});

Route::match(['get', 'post'], 'match', function () {
    return 'Aceita os verbos http que vc indicar';
});

Route::any('/tudo', function () {
    return 'Todos tipos de verbos http get post delete';
});

Route::get('/contato', function () {
    return view('contato');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
