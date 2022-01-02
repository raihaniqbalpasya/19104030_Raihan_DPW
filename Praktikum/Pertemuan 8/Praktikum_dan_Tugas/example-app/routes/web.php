<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myController;

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

//**Bagian Praktikum**
//Kita melalui controller terlebih dahulu
//Ketika kita mengakses url /beranda dengan method get
//maka kita akan diarahkan ke controller
//dengan nama classnya adalah myController
//dan methodnya adalah indexp

//Penulisan di laravel 7
//Route::get('/berandaprak', 'myController@index');

//Penulisan di laravel 8
Route::get('/berandaprak', [myController::class, 'indexp']);

//Kita langsung ke view nya
//Route::view('/berandaprak', 'berandaprak');

//**Bagian Tugas**
// rute agar tampilan beranda akan nampil ketika kita buka link utama atau default http://127.0.0.1:8000
Route::get('/', [myController::class, 'index']);

// rute untuk beranda dan about
Route::get('/beranda', [myController::class, 'index']);
Route::get('/about', [myController::class, 'about']);

