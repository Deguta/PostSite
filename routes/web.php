<?php

Route::get('/', function () {
    return view('top');
});

Route::resource('bulletin-board', 'PostsController', ['only' => ['index','create', 'store','show','edit', 'update','destroy']]);

Route::resource('comment', 'CommentsController',['only' => ['store']]);

// お問い合わせの送信メールのルーティング
Route::get('/contact/index', 'ContactController@index')->name('contact.index');
Route::post('/contact/confirm', 'ContactController@confirm')->name('contact.confirm');
Route::post('/contact/complete', 'ContactController@send')->name('contact.send');