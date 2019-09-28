<?php

Route::group(['middleware' => ['web']], function () {
    Route::post('web-login', ['as'=>'web-login','uses'=>'Auth\LoginController@webLoginPost']);
});
// เอกสารสร้างเอง
Route::get('inbox/add', 'InboxController@addcreate')->name('addcreate');

Route::post('inbox/addstore', [
    'as' => 'addstore',
    'uses' => 'InboxController@addstore'
]);
Route::resource('addstore', 'InboxController' , ['except' => 'addstore']);
// end เอกสารสร้างเอง

// เอกสารส่งต่อ
Route::get('inbox/addforward', 'InboxController@addforward')->name('addforward');

Route::post('inbox/addforwardstore', [
    'as' => 'addforwardstore',
    'uses' => 'InboxController@addforwardstore'
]);
Route::resource('addforwardstore', 'InboxController' , ['except' => 'addforwardstore']);
// end เอกสารส่งต่อ

// add manager
Route::get('SCMNG', 'HomeController@SCMNG')->name('SCMNG');

Route::post('manager/SCMNGstore', [
    'as' => 'SCMNGstore',
    'uses' => 'HomeController@SCMNGstore'
]);
Route::resource('SCMNGstore', 'HomeController' , ['except' => 'SCMNGstore']);
//  end add manager

Route::resource('read','ReadController');

Route::resource('sent','SentController');

Route::resource('receiver','ReceiverController');

Route::resource('inbox','InboxController');

Route::get('destroy/{id}','InboxController@destroy');

Route::get('/', function () {
    return view('auth.login');
});

/*------------inbox marksignature-------------------*/

Route::get('read/markrunnumber/{id}', [
    'as' => 'readmarkrunnumber',
    'uses' => 'InboxController@markrunnumber'
]);
Route::resource('markrunnumber', 'InboxController' , ['except' => 'markrunnumber']);

Route::post('read/markrunnumberstore/{id}', [
    'as' => 'readmarkrunnumberstore',
    'uses' => 'InboxController@markrunnumberstore'
]);
Route::resource('markrunnumberstore', 'InboxController' , ['except' => 'markrunnumberstore']);

Route::get('read/markforward/{id}', [
    'as' => 'markforward',
    'uses' => 'InboxController@markforward'
]);
Route::resource('markforward', 'InboxController' , ['except' => 'markforward']);

Route::post('read/markforwardstore/{id}', [
    'as' => 'markforwardstore',
    'uses' => 'InboxController@markforwardstore'
]);
Route::resource('markforwardstore', 'InboxController' , ['except' => 'markforwardstore']);


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

/*------------end_inbox marksignature-------------------*/

/*------------read-------------------*/

// Route::get('read/create/{id}', [
//     'as' => 'readcreate',
//     'uses' => 'ReadController@create'
// ]);
// Route::resource('create', 'ReadController' , ['except' => 'create']);

// Route::get('read/markrunnumber/{id}', [
//     'as' => 'readmarkrunnumber',
//     'uses' => 'ReadController@markrunnumber'
// ]);
// Route::resource('markrunnumber', 'ReadController' , ['except' => 'markrunnumber']);

// Route::post('read/markrunnumberstore/{id}', [
//     'as' => 'readmarkrunnumberstore',
//     'uses' => 'ReadController@markrunnumberstore'
// ]);
// Route::resource('markrunnumberstore', 'ReadController' , ['except' => 'markrunnumberstore']);

// Route::get('read/markforward/{id}', [
//     'as' => 'markforward',
//     'uses' => 'ReadController@markforward'
// ]);
// Route::resource('markforward', 'ReadController' , ['except' => 'markforward']);

// Route::post('read/markforwardstore/{id}', [
//     'as' => 'markforwardstore',
//     'uses' => 'ReadController@markforwardstore'
// ]);
// Route::resource('markforwardstore', 'ReadController' , ['except' => 'markforwardstore']);

Route::get('read/marksignature/{id}', [
    'as' => 'readmarksignature',
    'uses' => 'ReadController@marksignature'
]);
Route::resource('marksignature', 'ReadController' , ['except' => 'marksignature']);

Route::post('read/marksignaturestore/{id}', [
    'as' => 'readmarksignaturestore',
    'uses' => 'ReadController@marksignaturestore'
]);
Route::resource('marksignaturestore', 'ReadController' , ['except' => 'marksignaturestore']);


/*------------end_read-------------------*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
