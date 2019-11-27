<?php

Route::get('/', 'PageController@index');
Route::get('contact', 'PageController@contact');
Route::post('contact', 'PageController@contactData');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
