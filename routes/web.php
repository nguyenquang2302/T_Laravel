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

Route::get('/', function () {
    return view('welcome');
});
// Routing
Route::get('/hello', function () {
    return 'Hello World';
});
// Routing sub path
Route::get('/hello/slug', function () {
    return 'Học laravel';
});
// có kèm slug
Route::get('/xinchao/{name}', function ($name) {
    return "Xin chào $name";
});

//  Default slug ( có hoặc không có)
Route::get('/laptrinh/{name?}', function ($name = 'php') {
    return "Lập trình $name";
});

//  Điều kiện cho router ( điều kiện cho slug)
Route::get('/thong-tin/{ten}/{tuoi}', function ($ten, $tuoi) {
    return "Xin chào $ten - -  $tuoi";
})->where(['ten' => '[a-zA-z]+', 'tuoi' => '[0-9]+']);

// 