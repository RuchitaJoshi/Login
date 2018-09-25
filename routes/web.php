<?php

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

Route::get('/admin/user/roles', ['middleware' => 'web' , function(){
    return "Middleware role";
}]);

Route::get('/admin','AdminController@index');

Route::get('/checkmail',function(){
    $data = [
        'title' => 'title for email',
        'content' => 'content for email'
    ];

    Mail::send('emails.test',$data,function($message){
        $message->to('ruchita.joshi18388@gmail.com','Ruchi')->subject('testing purpose email');
    });
});
