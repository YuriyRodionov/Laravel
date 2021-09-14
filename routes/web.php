<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\Admin\CategoryController as adminCategoryController;
use App\Http\Controllers\Admin\NewsController as adminNewsController;
use App\Http\Controllers\Admin\UserController;

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
//Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::resource('categories', adminCategoryController::class);
    Route::resource('news', adminNewsController::class);
    Route::get('news/create', [adminNewsController::class, 'create'])->name('news.create');
});

Route::group([], function() {
    Route::get( '/news', [NewsController::class, 'index'])->name('news')->name('news');
    Route::post('/news/feedback', [NewsController::class, 'feedback'])->name('news.feedback');

    Route::get('/news/{id}', [NewsController::class, 'show'])
        ->where('id', '\d+')
        ->name('news.show');

    Route::get('/news/types', [CategoryController::class, 'viewTypes'])->name('viewTypes');
});


Route::get('/', function () {
    return view('welcome');
});



Route::get('/hello', [HelloController::class, 'index'])->name('hello');

Route::group([], function() {
    Route::resource('/user', UserController::class);
    Route::post('user/new', [UserController::class, 'store'])->name('user.new');
});


