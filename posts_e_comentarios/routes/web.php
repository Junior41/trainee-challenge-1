<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});
Route::get('login',function(){
    return view('auth.login');
})->name('login');
Route::get('register',function(){
    return view('auth.register');
})->name('register');

Route::post('post.store',function(){
    return "chou ";
})->name('post.store');

Route::post('comenatrio.store',function(){
    return 'teste';
})->name('comentario.store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');