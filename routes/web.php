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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('link','LinkController');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('admin/users', 'Rolescontroller',['names' => [
  'index' => 'users',
  'create' => 'users.create',
  'store' => 'users.store'
]]);
// Route::resource('admin/advertise', 'Advertcontroller',['names' => [
//   'index' => 'advert.index',
//   'create' => 'advert.create',
//   'store' => 'advert.store'
// ]]);
Route::resource('admin', 'AdminController');
Route::resource('ads', 'Advertcontroller');
Route::resource('campaign', 'CampaignController');
Route::get('{code}', ['uses' =>'VisitorController@index']);
