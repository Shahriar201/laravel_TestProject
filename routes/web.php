<?php


Route::get('/', function () {
    return view('layout.web.layout');
});

Route::get('about/me','HomeController@about')->name('about');
Route::get('contact/me', 'HomeController@contact')->name('contact');

//Post crude here 
Route::get('write/post','PostController@index')->name('write.post');

Route::get('add/category', 'PostController@create')->name('add.category');
Route::post('store/category', 'PostController@store')->name('store.category');
Route::get('all/category', 'PostController@show')->name('all.category');

Route::get('view/category/{id}', 'ViewController@view')->name('view.category');
Route::get('delete/category{id}', 'ViewController@delete')->name('delete/category');
