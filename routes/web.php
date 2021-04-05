<?php

Route::get('/', function () {
    return view('top');
});

Route::resource('bulletin-board', 'PostsController', ['only' => ['index','create', 'store','show','edit', 'update','destroy']]);

Route::resource('comment', 'CommentsController',['only' => ['store']]);

Log::channel('single')->error('Something happends');
