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

// Router Truyền giá trị cho view
Route::get('/goi-view', function () {
    $laptrinh ='laravel';
    return view('callview',compact('laptrinh'));
});
//  Gọi action từ controller
Route::get('/goi-action','WebsiteController@testAction');

//  Thêm định dạng cho router 
Route::get('/dinh-danh/{id}','WebsiteController@test1Action')->name('named');

Route::get('/dinh-danh-test', function () {
    // goj
    $url = route('named',['id'=>10]);
    return $url;
});

// Group Router
Route::group(['prefix'=>'group'],function () {

    Route::get('/goi-view', function () {
        $laptrinh ='laravel';
        return view('callview',compact('laptrinh'));
    });

    Route::get('/goi-action','WebsiteController@testAction');
});

//router middleware
Route::middleware(['first', 'second'])->group(function () {
    Route::get('/middleware', function () {
        // Uses first & second Middleware
    });
});

// router named prefix  admin.prefix
Route::name('admin.')->group(function () {
    Route::get('prefix', function () {
        // Route assigned name "admin.users"...
    })->name('prefix');
});

//Route Model Binding 
Route::get('api/users/{user}', function (App\User $user) {
    return $user->email;
});

//Fallback Routes

Route::fallback(function () {
    //
});
// Giới hạn thời gian  try cập / số lần

Route::middleware('auth:api', 'throttle:6,2')->group(function () {
    Route::get('/user', function () {
        //
    });
});

//Dynamic Rate Limiting

Route::middleware('auth:api', 'throttle:rate_limit,1')->group(function () {
    Route::get('/user', function () {
        //
    });
});
Route::get('func', function () {
    $route = Route::current();

    $name = Route::currentRouteName();

    $action = Route::currentRouteAction();
});

Route::get('/geturl', 'WebsiteController@getDataAction');