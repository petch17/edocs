<?php

Route::resource('sent','SentController');

Route::get('inbox/add', 'InboxController@addcreate')->name('addcreate');

Route::post('inbox/addstore', [
    'as' => 'addstore',
    'uses' => 'InboxController@addstore'
]);
Route::resource('addstore', 'InboxController' , ['except' => 'addstore']);

Route::resource('receiver','ReceiverController');

Route::get('create/{id}', [
    'as' => 'receivercreate',
    'uses' => 'ReceiverController@create'
]);
Route::resource('create', 'ReceiverController' , ['except' => 'create']);

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




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
