<?php

// Route::get('inbox/add', 'InboxController@addcreate')->name('addcreate');

// Route::post('inbox/addstore', [
//     'as' => 'addstore',
//     'uses' => 'InboxController@addstore'
// ]);
// Route::resource('addstore', 'InboxController' , ['except' => 'addstore']);

Route::resource('inbox','InboxController');

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
