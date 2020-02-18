<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/phpinfo', ['middleware' => 'web' , function(){
           phpinfo();
}]);
    
Route::get('/admin', 'AdminController@index');

Route::get('/admin/user/roles', ['middleware' => 'web' , function(){
    return "Middleware role";
}]);

Route::get('admin/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);

//Route::get('/admin','AdminController@index');

Route::get('/checkmail',function(){
    $data = [
        'title' => 'title for email',
        'content' => 'content for email'
    ];

    Mail::send('emails.test',$data,function($message){
        $message->to('ruchita.joshi18388@gmail.com','Ruchi')->subject('testing purpose email');
    });
});

Route::resource('/admin/users','AdminUsersController');

Route::get('/admin',function(){
    return view('admin.index');
});


Route::resource('/admin/posts', 'AdminPostsController');

Route::delete('/admin/posts/{id}','AdminPostsController@destroy')->name('post-delete');

Route::resource('/admin/categories', 'AdminCategoriesController');

Route::resource('/admin/medias','AdminMediasController');

Route::resource('/admin/comments', 'PostCommentsController');

Route::resource('/admin/comments/replies', 'CommentRepliesController');

Route::resource('/admin/cars','AdminCarsController');

Route::get('/admin/cars/ajax/{name}','AdminCarsController@ajax');

Route::get('/email', 'EmailController@sendEmail');

Route::resource('/admin/projects', 'ProjectsController');

Route::delete('/admin/projects/{id}','ProjectsController@destroy')->name('project-delete');
