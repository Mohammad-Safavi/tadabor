<?php
use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'sin-panel' , 'middleware' =>'admin'] , function() {
    //index action
    Route::get('/' , 'panelController@index_panel')->name('panel');
    Route::get('navbar' , 'panelController@index_navbar')->name('navbar.index');
    Route::get('blog' , 'panelController@index_blog')->name('blog.index');
    Route::get('item','panelController@index_item')->name('item.index');
    Route::get('message' , 'panelController@index_message')->name('message.index');
    Route::get('comment' , 'panelController@index_comment')->name('comment.index');
    Route::get('page' , 'panelController@index_page')->name('page.index');
    Route::get('category', 'panelController@index_category')->name('category.index');
    Route::get('user' , 'Auth\userController@profile')->name('user.index');
    Route::get('setting' , 'panelController@index_setting')->name('setting.index');
    Route::get('change-password', 'ChangePasswordController@index')->name('change.password-view');
    Route::get('manage/admin', 'Auth\userController@manage')->name('manage');
    Route::get('manage/user', 'Auth\userController@manage_user')->name('manage-user');
    //create action
    Route::get('page/create' , 'panelController@create_page')->name('page.create');
    Route::get('blog/create' , 'panelController@create_blog')->name('blog.create');
    Route::get('product/create' , 'shopController@create_product')->name('product.create');
    //edit action
    Route::get('page/{page}/edit' , 'panelController@edit_page')->name('page.edit');
    Route::get('blog/{blog}/edit' , 'panelController@edit_blog')->name('blog.edit');
    Route::get('change-password/{user}/edit', 'ChangePasswordController@edit')->name('change.password-view-manage');
    //store action
    Route::post('page/store' , 'panelController@store_page')->name('page.store');
    Route::post('blog/store' , 'panelController@store_blog')->name('blog.store');
    Route::post('category/store', 'panelController@store_category')->name('category.store');
    Route::post('change-password', 'ChangePasswordController@store')->name('change.password');
    Route::post('change-password/{user}', 'ChangePasswordController@store_manage')->name('change.password-manage');
    //update action
    Route::put('navbar/update/' , 'panelController@update_navbar')->name('navbar.update');
    Route::put('item/update/','panelController@update_item')->name('item.update');
    Route::put('navbar/update/icon/{icon}' , 'panelController@update_icon')->name('navbar.update-icon');
    Route::put('page/update/{page}' , 'panelController@update_page')->name('page.update');
    Route::put('blog/update/{blog}' , 'panelController@update_blog')->name('blog.update');
    Route::put('user/{user}' , 'Auth\userController@edit_profile')->name('user.update');
    Route::put('setting/update/{setting}' , 'panelController@update_setting')->name('setting.update');
    Route::put('comment/update/{comment}' , 'panelController@update_comment')->name('comment.update');
    //delete action
    Route::delete('message/delete/{message}' , 'panelController@destroy_message')->name('message.destroy');
    Route::delete('comment/delete/{comment}' , 'panelController@destroy_comment')->name('comment.destroy');
    Route::delete('message/delete-all', 'panelController@destroy_all_message')->name('message-delete.all');
    Route::delete('comment/delete-all', 'panelController@destroy_all_comment')->name('comment-delete.all');
    Route::delete('page/delete/{page}' , 'panelController@destroy_page')->name('page.destroy');
    Route::delete('manage/user/delete/{User}', 'Auth\userController@delete_manage')->name('delete.manage');
    Route::delete('category/destroy/{category}', 'panelController@destroy_category')->name('category.destroy');
    Route::delete('blog/delete/{blog}' , 'panelController@destroy_blog')->name('blog.delete');
});
    Route::post('message/store' , 'siteController@store_message')->name('message.store');
    Route::post('comment/store' , 'siteController@store_comment')->name('comment.store');
    Route::get('/','siteController@index_site')->name('site');
    Route::get('page/{page}' , 'siteController@show_page')->name('page.show');
    Route::get('blog' , 'siteController@index_blog')->name('blog.view');
    Route::get('blog/search' , 'siteController@search')->name('blog.search');
    Route::get('blog/filter' , 'siteController@filter')->name('blog.filter');
    Route::get('blog/{blog}/{slug?}' , 'siteController@show_blog')->name('blog.show');
    Route::get('shop' , 'shopController@index_shop')->name('shop.index');
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
    Auth::routes(['verify' => false, 'reset' => false]);





