<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::namespace('UserAuth')->group(function(){
//     Route::namespace('Auth')->group(function(){
//         Route::get('login', 'LoginController@showLoginForm');
//         Route::post('login', 'LoginController@login')->name('user.login');
//     });
// });

Route::get('/posts','PostController@index')->name('posts.index');
Route::namespace('UserAuth')->group(function(){
    Route::namespace('Auth')->group(function(){
        
        Route::get('/posts/login', 'LoginController@showLoginForm');
        Route::post('/posts/login', 'LoginController@login')->name('user.login');
        Route::get('/password/reset','ForgetPasswordController@showLinkRequestForm')->name('user.password.request');
        Route::post('/password/reset','ForgetPasswordController@sendRequestLinkEmail')->name('user.password.email');
        Route::get('/posts/register', 'RegisterController@showRegistrationForm')->name('user.registerview');
        Route::post('/posts/register', 'RegisterController@register')->name('user.register');
    });
});

Route::get('/posts/{id}','PostController@view')->name('posts.view');
Route::post('/posts/create','PostController@createComment')->name('comment.create');
Route::get('/posts/{id}/add','PostController@addLike')->name('add.like');



Route::namespace('Admin')->prefix('/admin/posts')->middleware(['auth','admin'])->group(function(){
    
    Route::get('/notifications', 'NotificationsController@index');

    Route::get('/alluser','UserAddController@index')->name('admin.user.index');
    Route::delete('/alluser/{id}/delete','UserAddController@destroy')->name('admin.user.delete');
    Route::get('/alluser/adduser','UserAddController@showAddUserForm')->name('admin.user.add');
    Route::post('/alluser/adduser','UserAddController@create')->name('admin.user.create');

    Route::get('/downloads','DownloadsController@index')->name('admin.downloads');
    Route::post('/downloads','DownloadsController@store')->name('admin.downloads.store');
    Route::get('/downloads/{id}/download','DownloadsController@download')->name('admin.downloads.download');
    Route::get('/downloads/{id}/preview','DownloadsController@preview')->name('admin.downloads.preview');
    Route::delete('/downloads/{id}/download','DownloadsController@delete')->name('admin.downloads.delete');
    
    // Route::get('/roles','RolesController@index')->name('admin.role');
    // Route::post('/roles','RolesController@store')->name('admin.role.store');
    // Route::get('/roles/{id}/edit','RolesController@edit')->name('admin.role.edit');
    // Route::put('/roles/{id}/update','RolesController@update')->name('admin.role.update');
    // Route::delete('/roles/{id}/delete','RolesController@delete')->name('admin.role.delete');
    
    Route::get('/permissions','PermissionsController@index')->name('admin.permission');
    Route::post('/permissions','PermissionsController@store')->name('admin.permission.store');
    Route::get('/permissions/{id}/edit','PermissionsController@edit')->name('admin.permission.edit');
    Route::put('/permissions/{id}/update','PermissionsController@update')->name('admin.permission.update');
    Route::delete('/permissions/{id}/delete','PermissionsController@delete')->name('admin.permission.delete');

    Route::get('/categories/{id}/posts','CategoriesController@posts')->name('categories.posts');
    Route::resource('/categories', 'CategoriesController')->names([
        'show' => 'categories.view',
        'index' => 'categories',
        'create' => 'categories.create',
        'destroy' => 'categories.delete',
    ]);

    Route::resource('/tags', 'TagController')->names([
        'index' => 'tags',
        'destroy' => 'tags.delete',
    ]);
    Route::get('/trashed','postsController@trashed')->name('admin.posts.trashed');
    Route::put('/trashed/{id}/restore','postsController@restore')->name('admin.posts.restore');
    Route::delete('/trashed/{id}/delete','postsController@forceDelete')->name('admin.posts.forceDelete');

    Route::get('','postsController@index')->name('admin.posts.index');
    Route::get('/views','postsController@views')->name('admin.posts.views');
    Route::get('/cretae','postsController@create')->name('admin.posts.create');
    Route::post('','postsController@store')->name('admin.posts.store');
    Route::get('/{id}','postsController@edit')->name('admin.posts.edit');
    Route::put('/{id}','postsController@update')->name('admin.posts.update');
    Route::delete('/{id}','postsController@delete')->name('admin.posts.delete');

    
    
    
    
});
Route::get('/admin/logout', function(){
    Auth::logout();
    return redirect('/home');
})->name('admin.logout');

Route::get('/user/logout', function(){
    Auth::logout();
    return redirect('/posts');
})->name('user.logout');

Auth::routes([
    'verify' =>true,
]);

Route::get('/home', 'HomeController@index')->name('home');

