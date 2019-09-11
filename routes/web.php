<?php

Route::resource('sent','SentController');

Route::get('inbox/add', 'InboxController@addcreate')->name('addcreate');

Route::post('inbox/addstore', [
    'as' => 'addstore',
    'uses' => 'InboxController@addstore'
]);
Route::resource('addstore', 'InboxController' , ['except' => 'addstore']);

Route::get('destroy/{id}','InboxController@destroy');

Route::resource('receiver','ReceiverController');

// Route::get('456/create/{id}', [
//     'as' => 'sentcreate',
//     'uses' => 'SentController@create'
// ]);
// Route::resource('create', 'SentController' , ['except' => 'create']);

Route::get('receive/create/{id}', [
    'as' => 'receivercreate',
    'uses' => 'ReceiverController@create'
]);
Route::resource('create', 'ReceiverController' , ['except' => 'create']);

Route::resource('inbox','InboxController');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('inbox/marksignature/{id}', [
    'as' => 'marksignature',
    'uses' => 'InboxController@marksignature'
]);
Route::resource('marksignature', 'InboxController' , ['except' => 'marksignature']);


Route::post('inbox/marksignaturestore/{id}', [
    'as' => 'marksignaturestore',
    'uses' => 'InboxController@marksignaturestore'
]);
Route::resource('marksignaturestore', 'InboxController' , ['except' => 'marksignaturestore']);

/*------------reciever-------------------*/

Route::get('receiver/markforward/{id}', [
    'as' => 'markforward',
    'uses' => 'ReceiverController@markforward'
]);
Route::resource('markforward', 'ReceiverController' , ['except' => 'markforward']);

Route::post('receiver/markforwardstore/{id}', [
    'as' => 'markforwardstore',
    'uses' => 'ReceiverController@markforwardstore'
]);
Route::resource('markforwardstore', 'ReceiverController' , ['except' => 'markforwardstore']);

Route::get('receiver/marksignature/{id}', [
    'as' => 'receivermarksignature',
    'uses' => 'ReceiverController@marksignature'
]);
Route::resource('marksignature', 'ReceiverController' , ['except' => 'marksignature']);


Route::post('receiver/marksignaturestore/{id}', [
    'as' => 'receivermarksignaturestore',
    'uses' => 'ReceiverController@marksignaturestore'
]);
Route::resource('marksignaturestore', 'ReceiverController' , ['except' => 'marksignaturestore']);









Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
