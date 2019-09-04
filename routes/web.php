<?php

Route::get('inbox/add', 'InboxController@addcreate')->name('addcreate');

Route::post('inbox/addstore', [
    'as' => 'addstore',
    'uses' => 'InboxController@addstore'
]);
Route::resource('addstore', 'InboxController' , ['except' => 'addstore']);

Route::resource('receiver','ReceiverController');

Route::resource('inbox','InboxController');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('marksignature/{id}', [
    'as' => 'marksignature',
    'uses' => 'InboxController@marksignature'
]);
Route::resource('marksignature', 'InboxController' , ['except' => 'marksignature']);


Route::post('marksignaturestore/{id}', [
    'as' => 'marksignaturestore',
    'uses' => 'InboxController@marksignaturestore'
]);
Route::resource('marksignaturestore', 'InboxController' , ['except' => 'marksignaturestore']);


Route::post('create/{id}', [
    'as' => 'create',
    'uses' => 'ReceiverController@create'
]);
Route::resource('create', 'ReceiverController' , ['except' => 'create']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
