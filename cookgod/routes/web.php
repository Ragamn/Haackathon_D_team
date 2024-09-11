<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/cook_register', function () {
    return view('cook_register');
});
Route::get('/arrange_register', function () {
    return view('arrange_register');
});
Route::get('/cook_list', function () {
    return view('cook_list');
});
Route::get('/arrange_register', function () {
    return view('arrange_register');
});
Route::get('/favorite', function () {
    return view('favorite');
});
