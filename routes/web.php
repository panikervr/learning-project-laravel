<?php

use App\Http\Controllers\News\CommentsController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Shop\ShopsController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('pages.home');

//Route::get('/news/create', function () {
//    return view('pages.news_create');
//})->name('pages.news_create');
//
//Route::get('/news/{news}', function () {
//    return view('pages.news_show', [
//        "news" => 1
//    ]);
//})->name('pages.news_show');

//Route::resource('/news', NewsController::class)->names([
//    'index' => 'pages.news.index',
//    'create' => 'pages.news.create',
//    'show' => 'pages.news.show',
//    'edit' => 'pages.news.edit',
//    'store' => 'pages.news.store',
//    'destroy' => 'pages.news.destroy'
//]);

Route::controller(NewsController::class)->prefix('/news')->group(function () {
    Route::get('/', 'index')->name('pages.news.index');
    Route::post('/store', 'store')->name('pages.news.store')->middleware('auth');
    Route::get('/create', 'create')->name('pages.news.create')->middleware('auth');
    Route::get('/{news}', 'show')->name('pages.news.show')->middleware('news.published');
    Route::post('/{news}/update', 'update')->name('pages.news.update')->middleware('auth');
    Route::get('/{news}/edit', 'edit')->name('pages.news.edit')->middleware('auth');
    Route::post('/{news}', 'destroy')->name('pages.news.destroy')->middleware('auth');
});

Route::controller(CommentsController::class)->group(function () {
    Route::post('/news/{news}/comment', 'comment')->name('pages.news.commentAdd')->middleware('auth');
});

Route::controller(UsersController::class)->group(function () {
    Route::get('/users', 'index')->name('pages.users.index');
    Route::get('/profile/{user}', 'profile')->name('pages.users.profile');
});

Route::controller(LoginController::class)->middleware('guest')->group(function () {
    Route::post('/login', 'store')->name('pages.login.store');
    Route::get('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('pages.login.logout')->withoutMiddleware('guest');
});

Route::controller(RegisterController::class)->middleware('guest')->group(function () {
    Route::post('/register', 'store')->name('pages.register.store');
    Route::get('/register', 'register')->name('pages.register');
});

Route::controller(ShopsController::class)->group(function () {
    Route::get('/shop', 'index')->name('pages.shop.index');
    Route::get('/shop/{shop}', 'show')->name('pages.shop.show');
});
