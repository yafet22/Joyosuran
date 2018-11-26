<?php

use App\Kelurahan;

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

Route::get('/information/create/ajax-state',function()
{
    $kecamatanid = Input::get('kecamatanid');
    $subcategories = Kelurahan::where('kecamatanid',$kecamatanid)->get();
    return $subcategories;
});

Route::get('myform/ajax/{id}',array('as'=>'myform.ajax','uses'=>'RegionalController@myformAjax'));
// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::get('/home', function () {
//     return view('home');
// });
// Route::get('/datamaster', function () {
//     return view('datamaster');
// });

Route::post('/loginPost', 'AdminController@loginPost');
Route::get('/logout', 'AdminController@logout');
Route::post('/editPost', 'AdminController@editPost');

Route::get('/datamaster', 'DataMasterController@index')->name('datamaster');
Route::get('/', 'MapController@index')->name('map');
Route::get('/map', 'MapController@index')->name('map');
Route::get('/datamaster/statusbangunan', 'StatusBangunanController@index')->name('statusbangunan');
Route::get('/datamaster/kecamatan', 'KecamatanController@index')->name('kecamatan');
Route::get('/datamaster/kelurahan', 'KelurahanController@index')->name('kelurahan');

Route::get('/regiondata', 'RegionalController@index')->name('indexadmin');

Route::resource('Regionals','RegionalController');
Route::resource('Buildings','BuildingController');
Route::resource('StatusBangunan','StatusBangunanController');
Route::resource('Kecamatans','KecamatanController');
Route::resource('Kelurahans','KelurahanController');

Route::get('dynamicModal/{id}',[ 'as'=>'dynamicModal',
    'uses'=> 'RegionalController@loadModal'
]);

Route::get('dynamicModal2/{id}',[
    'as'=>'dynamicModal2',
    'uses'=> 'BuildingController@loadModal'
]);

Route::get('dynamicModal3/{id}',[
    'as'=>'dynamicModal3',
    'uses'=> 'StatusBangunanController@loadModal'
]);

Route::get('dynamicModal4/{id}',[
    'as'=>'dynamicModal4',
    'uses'=> 'KecamatanController@loadModal'
]);

Route::get('dynamicModal5/{id}',[
    'as'=>'dynamicModal5',
    'uses'=> 'KelurahanController@loadModal'
]);

Route::get('showBuildings/{id}',[
    'as'=>'showBuildings',
    'uses'=> 'RegionalController@showBuildings'
]);

Route::get('/pieChart','BuildingController@getJumlahStatus');
Route::get('/excel','BuildingController@export')->name('excel');
Route::get('Building/pieChart', 'BuildingController@getJumlahStatus')->name('pieChart');