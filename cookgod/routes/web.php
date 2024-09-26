<?php

use Illuminate\Support\Facades\Route;
use App\HTtp\Controllers\CookController;
use App\HTtp\Controllers\ArrangeController;

Route::get('/', [CookController::class, 'index']);
Route::get('/cook_register', function () {
    return view('cook_register');
});
Route::post('/cook_confirm',[CookController::class,'cook_confirm']);
Route::get('/cook_create',[CookController::class,'cookregister']);

Route::get('/arrange_register', function () {
    return view('arrange_register');
});
Route::get('/arrange_register',[CookController::class,'select_cook']);

Route::post('/arrange_confirm',[ArrangeController::class,'arrange_confirm']);

Route::get('/arrange_create',[ArrangeController::class,'arrangeregister']);

Route::get('/favorite', function () {
    return view('favorite');
});
Route::get('/cook_ranking', function () {
    return view('cook_ranking');
});
Route::get('/cook_ranking',[CookController::class,'ranking']);
Route::get('/cook_arrange',[ArrangeController::class,'getArrangesByCookingId']);
Route::get('/arrange_list',[ArrangeController::class,'index']);
Route::get('/detail',[ArrangeController::class,'getArrangeById']);


