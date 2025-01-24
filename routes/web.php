<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

Route::get('/index', [MyController::class, 'index']);
Route::get('/show/{id}', [MyController::class, 'show']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/gempa', function () {
    return view('gempa');
});

Route::get('/bali-json', function () {
    $path = storage_path('bali.json');
    if (!file_exists($path)) {
        abort(404);
    }
    return Response::file($path);
});

Route::get('/bali', function () {
    return view('bali');
});