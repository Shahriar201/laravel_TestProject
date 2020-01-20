<?php


Route::get('/', function () {
    return view('layout.web.layout');
});

 Route::get('about/me','HomeController@about')->name('about');
 Route::get('contact/me', 'HomeController@contact')->name('contact');
 Route::post('contact/store', 'HomeController@store')->name('store.me');

//Category crude here 
Route::get('write/post','PostController@index')->name('write.post');

Route::get('add/category', 'PostController@create')->name('add.category');
Route::post('store/category', 'PostController@store')->name('store.category');
Route::get('all/category', 'PostController@show')->name('all.category');

Route::get('view/category/{id}', 'ViewController@view');
Route::get('delete/category{id}', 'ViewController@delete');
Route::get('edit/category{id}', 'PostController@edit');
Route::post('update.category{id}', 'PostController@update');

//Post crude is here.................
Route::post('store/post', 'CategoryController@store')->name('store.post');
Route::get('show/post', 'CategoryController@allpost')->name('show.post');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
