<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\OrderController as OrderController;
use App\Http\Controllers\Admin\IndexController as AdminController;
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


//Auth
Route::group(['middleware' => 'auth'], function() {     //доступна только для авторизованных
    Route::get('/account', AccountController::class)->name('account');
    // страница сброса пароля: настройки ссылки для сброса - в config-auth, изменение текста письма в model-notificate,
    // дизайна письма - через php artisan vendor:publish -> laravel-mail(16), и в папке views появится vendor/mail
    Route::get('/logout', function () {
        \Auth::logout();
        return redirect()->route('login');
    })->name('logout');
    //Admin
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function() {
        Route::resource('categories', adminCategoryController::class);
        Route::resource('news', adminNewsController::class);
        Route::resource('users', UserController::class);
        Route::resource('orders', OrderController::class);
        Route::get('/', AdminController::class)->name('index');
        Route::post('users/create', [UserController::class, 'store'])->name('user.new');
        Route::get('news/create', [adminNewsController::class, 'create'])->name('news.create');
    });
});

Route::group([], function() {
    Route::get( '/news', [NewsController::class, 'index'])->name('news');
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

Route::get('/session', function() {
    if(!session()->has('example')) {
        session(['example' => 1]); //->put(['example', 1])
    }

    dump(session()->all());
    $example = session()->get('example');
    session()->remove('example');
    dump(session()->all());

    // как отправлять куки return redirect()->route('admin.news.index')->withCookie(['one'=> 1]);
    // читаем куку request()->cookie();
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
