<?php

Route::get('/', 'PageController@index');
Route::get('contact', 'PageController@contact');
Route::post('contact', 'PageController@contactData');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route pengurusan users
Route::middleware(['auth'])->group(function () {

    Route::get('users', 'UserController@index');
    Route::get('users/create', 'UserController@create');
    Route::post('users/create', 'UserController@store');
    Route::get('users/{id}/edit', 'UserController@edit');
    Route::patch('users/{id}/edit', 'UserController@update');
    Route::delete('users/{id}', 'UserController@destroy');

    // Route pengurusan faculty
    Route::get('faculty', 'FacultyController@index');
    Route::get('faculty/datatables', 'FacultyController@datatables')->name('faculty.datatables');
    Route::get('faculty/create', 'FacultyController@create');
    Route::post('faculty/create', 'FacultyController@store');
    Route::get('faculty/{id}/edit', 'FacultyController@edit');
    Route::patch('faculty/{id}/edit', 'FacultyController@update');
    Route::delete('faculty/{id}', 'FacultyController@destroy');
    
});

// Route::resource('faculty', 'FacultyController');
