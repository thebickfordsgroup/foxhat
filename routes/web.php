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
use App\Mail\mailme; 

Route::get('/', function () {return view('pages.index');});
Route::get('/signup', function () {return view('pages.signup');});
Route::get('/terms', function () {return view('pages.terms');});
Route::get('/privacy', function () {return view('pages.privacy');});;

Route::post('contact', 'PagesController@postContact');