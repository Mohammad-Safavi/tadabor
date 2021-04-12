<?php

use Illuminate\Support\Facades\Route;

Route::get('/','indexController@index')->name('site');

Route::get('index' , function(){
   return view('index');
});
Route::group(['prefix' => 'panel' , 'middleware' => 'auth'] , function() {
    Route::get('/','indexController@index_panel')->name('panel');
    Route::get('/item','ItemController@index')->name('item.index');
    Route::get('item/{item}/edit','ItemController@edit')->name('item.edit');
    Route::put('item/update/{item}','ItemController@update')->name('item.update');
    Route::get('navbar' , 'NavbarController@index')->name('navbar.index');
    Route::get('navbar/{navbar}/edit' , 'NavbarController@edit')->name('navbar.edit');
    Route::put('navbar/update/{navbar}' , 'NavbarController@update')->name('navbar.update');
    Route::put('navbar/update/icon/{icon}' , 'NavbarController@update_icon')->name('navbar.update-icon');
    Route::get('message' , 'MessageController@index')->name('message.index');
    Route::post('message/store' , 'MessageController@store')->name('message.store');
    Route::get('message/view/{message}' , 'MessageController@show')->name('message.show');
    Route::delete('message/delete/{message}' , 'MessageController@destroy')->name('message.destroy');
    Route::delete('message/delete-all', 'MessageController@destroyall')->name('message-delete.all');
    Route::get('page' , 'PageController@index')->name('page.index');
    Route::get('page/create' , 'PageController@create')->name('page.create');
    Route::post('page/store' , 'PageController@store')->name('page.store');
    Route::get('page/{page}/edit' , 'PageController@edit')->name('page.edit');
    Route::put('page/update/{page}' , 'PageController@update')->name('page.update');
    Route::delete('page/delete/{page}' , 'PageController@destroy')->name('page.destroy');
    Route::get('change-password', 'ChangePasswordController@index')->name('change.password-view');
    Route::get('change-password/{user}/edit', 'ChangePasswordController@edit')->name('change.password-view-manage');
    Route::post('change-password', 'ChangePasswordController@store')->name('change.password');
    Route::post('change-password/{user}', 'ChangePasswordController@store_manage')->name('change.password-manage');
    Route::get('manage/user', 'indexController@manage')->name('manage');
    Route::delete('manage/user/delete/{User}', 'indexController@deletemanage')->name('delete.manage');
    Route::get('category', 'CategoryController@index')->name('category.index');
    Route::post('category/store', 'CategoryController@store')->name('category.store');
    Route::delete('category/destroy/{category}', 'CategoryController@destroy')->name('category.destroy');
    Route::get('blog/create' , 'BlogController@create')->name('blog.create');
    Route::get('blog' , 'BlogController@index')->name('blog.index');
    Route::post('blog/store' , 'BlogController@store')->name('blog.store');
    Route::get('blog/{blog}/edit' , 'BlogController@edit')->name('blog.edit');
    Route::get('blog/check_slug' , 'BlogController@checkslug')->name('check.slug');
    Route::put('blog/update/{blog}' , 'BlogController@update')->name('blog.update');
    Route::delete('blog/delete/{blog}' , 'BlogController@destroy')->name('blog.delete');
    Route::get('user/' , 'userController@profile')->name('user.index');
    Route::put('user/{user}' , 'userController@edit_profile')->name('user.update');
    Route::get('setting' , 'settingController@index')->name('setting.index');
    Route::put('setting/update/{setting}' , 'settingController@update')->name('setting.update');


});
Route::get('page/{page}' , 'PageController@show')->name('page.show');
Route::get('blog' , 'indexController@blog')->name('blog.view');
Route::get('blog/search' , 'indexController@search')->name('blog.search');
Route::get('blog/filter' , 'indexController@filter')->name('blog.filter');
Route::get('blog/{blog}/{slug?}' , 'BlogController@show')->name('blog.show');
Route::get('blog/filter/{category}' , 'CategoryController@show')->name('category.show');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Auth::routes();




