<?php

Auth::routes(['verify'=>true]);

Route::get('/', 'HomeController@index')->name('home') ->middleware('verified');

Route::get('/home',function(){

    return 'Home';
});



Route::get('/dashboard',function(){

    return 'dashboard';
});
