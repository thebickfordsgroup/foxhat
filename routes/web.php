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
 
Route::get('/', function () {
 
   Mail::to('craig.davies@wheelandbarrow.com.au')->send(new mailme);
 
return view('emails.mailme');
 
});
Route::get('/', function () {
    return view('index');
});