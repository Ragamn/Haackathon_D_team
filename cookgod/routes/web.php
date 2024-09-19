<?php

use Illuminate\Support\Facades\Route;
use App\HTtp\Controllers\CookController;

Route::get('/', function () {
    $msg = session('msg', '');
    return view('index', ['msg' => $msg]);
});
Route::get('/cook_register', function () {
    return view('cook_register');
});
Route::post('/cook_confirm',[CookController::class,'cook_confirm']);
Route::get('/cook_create',[CookController::class,'cookregister']);

Route::get('/arrange_register', function () {
    return view('arrange_register');
});
Route::get('/cook_list', function () {
    return view('cook_list');
});
Route::get('/arrange_register', function () {
    return view('arrange_register');
});
Route::get('/arrange_confirm', function () {
    return view('arrange_confirm');
});
Route::get('/favorite', function () {
    return view('favorite');
});
Route::get('/cook_ranking', function () {
    return view('cook_ranking');
});
