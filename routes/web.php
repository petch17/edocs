<?php

Route::group(['middleware' => ['web']], function () {
    Route::post('web-login', ['as'=>'web-login','uses'=>'Auth\LoginController@webLoginPost']);
});

// Route::get('inbox/indexcreate', 'InboxController@indexcreate')->name('indexcreate'); // index เอกสารสร้างเอง

// Route::get('inbox/indexforward', 'InboxController@indexforward')->name('indexforward'); // index เอกสารส่งต่อ

// เอกสารสร้างเอง
Route::get('inbox/add', 'InboxController@addcreate')->name('addcreate');

Route::post('inbox/addstore', [
    'as' => 'addstore',
    'uses' => 'InboxController@addstore'
]);
Route::resource('addstore', 'InboxController' , ['except' => 'addstore']);
// end เอกสารสร้างเอง

// เอกสารส่งต่อ
// Route::get('inbox/addforward', 'InboxController@addforward')->name('addforward');

// Route::post('inbox/addforwardstore', [
//     'as' => 'addforwardstore',
//     'uses' => 'InboxController@addforwardstore'
// ]);
// Route::resource('addforwardstore', 'InboxController' , ['except' => 'addforwardstore']);
// end เอกสารส่งต่อ

// add manager
Route::get('SCMNG', 'HomeController@SCMNG')->name('SCMNG');

Route::post('view/SCMNGstore', [
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

// Route::get('inbox/markrunnumber/{id}', [
//     'as' => 'inboxmarkrunnumber',
//     'uses' => 'InboxController@markrunnumber'
// ]);
// Route::resource('markrunnumber', 'InboxController' , ['except' => 'markrunnumber']);

// Route::post('inbox/markrunnumberstore/{id}', [
//     'as' => 'inboxmarkrunnumberstore',
//     'uses' => 'InboxController@markrunnumberstore'
// ]);
// Route::resource('markrunnumberstore', 'InboxController' , ['except' => 'markrunnumberstore']);

// Route::get('inbox/markforward/{id}', [
//     'as' => 'markforward',
//     'uses' => 'InboxController@markforward'
// ]);
// Route::resource('markforward', 'InboxController' , ['except' => 'markforward']);

// Route::post('inbox/markforwardstore/{id}', [
//     'as' => 'markforwardstore',
//     'uses' => 'InboxController@markforwardstore'
// ]);
// Route::resource('markforwardstore', 'InboxController' , ['except' => 'markforwardstore']);


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

/*------------receiver-------------------*/

Route::get('receiver/create', [
    'as' => 'receivercreate',
    'uses' => 'ReceiverController@create'
]);
Route::resource('create', 'ReceiverController' , ['except' => 'create']);

Route::post('receiver/receiverstore', [
    'as' => 'receiverstore',
    'uses' => 'ReceiverController@receiverstore'
]);
Route::resource('receiverstore', 'ReceiverController' , ['except' => 'receiverstore']);

Route::get('receiver/runnumber/{id}', [
    'as' => 'runnumber',
    'uses' => 'ReceiverController@runnumber'
]);
Route::resource('runnumber', 'ReceiverController' , ['except' => 'runnumber']);

Route::post('receiver/runnumberstore/{id}', [
    'as' => 'runnumberstore',
    'uses' => 'ReceiverController@runnumberstore'
]);
Route::resource('runnumberstore', 'ReceiverController' , ['except' => 'runnumberstore']);

Route::get('receiver/forward/{id}', [
    'as' => 'forward',
    'uses' => 'ReceiverController@forward'
]);
Route::resource('forward', 'ReceiverController' , ['except' => 'forward']);

Route::post('receiver/forwardstore/{id}', [
    'as' => 'forwardstore',
    'uses' => 'ReceiverController@forwardstore'
]);
Route::resource('forwardstore', 'ReceiverController' , ['except' => 'forwardstore']);

Route::get('receiver/marksignature/{id}', [
    'as' => 'receivermarksignature',
    'uses' => 'ReceiverController@receivermarksignature'
]);
Route::resource('marksignature', 'ReceiverController' , ['except' => 'marksignature']);

Route::post('receiver/marksignaturestore/{id}', [
    'as' => 'receivermarksignaturestore',
    'uses' => 'ReceiverController@receivermarksignaturestore'
]);
Route::resource('marksignaturestore', 'ReceiverController' , ['except' => 'marksignaturestore']);


/*------------end_receiver-------------------*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
