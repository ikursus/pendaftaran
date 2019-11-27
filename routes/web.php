<?php

Route::get('/', 'PageController@index');
Route::get('contact', 'PageController@contact');
Route::post('contact', 'PageController@contactData');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route papar senarai user
Route::get('users', 'UserController@index');
Route::get('users/create', 'UserController@create');
Route::post('users/create', 'UserController@store');
Route::get('users/{id}/edit', 'UserController@edit');
Route::patch('users/{id}/edit', 'UserController@update');
Route::delete('users/{id}', 'UserController@destroy');
