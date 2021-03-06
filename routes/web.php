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
})->middleware('MyMiddle');
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
// Giử nhận dữ liệu
Route::get('/getform', 'WebsiteController@getFormDataAction');
Route::post('/getPostForm', 'WebsiteController@postForm')->name('postForm');

Route::get('/setcookie', 'WebsiteController@setCookie');
Route::get('/getcookie', 'WebsiteController@getCookie');

Route::get('/database',function() {
    Schema::create('user',function($table) {
        $table->increments('id');
        $table->string('full_name',255);
        $table->string('phone',255);;
    });
});

Route::get('/editdatabase',function() {
    Schema::table('user',function($table) {
        $table->dropColumn('phone');
    });
});

// Authed
Route::get('profile', function () {
    // Only authenticated users may enter...
})->middleware('auth');

// Auth::routes();

    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');
