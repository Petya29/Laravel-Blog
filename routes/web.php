<?php

use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::name('articles.')->group(function () {
    Route::get('/', [ArticlesController::class, 'getAll'])->name('allArticles');

    route::get('/article/{id}', [ArticlesController::class, 'getOneById'])->name('viewArticle');

    Route::get('/articles/add', [ArticlesController::class, 'addArticle'])->middleware('auth')->name('getAddArticle');

    Route::post('/articles/add', [ArticlesController::class, 'storeArticle'])->middleware('auth')->name('postAddArticle');

    Route::view('/articles/edit/{id}', 'articles.addArticle')->middleware('auth')->name('editArticle');

    Route::post('/article/{id}', [ArticlesController::class, 'storeComment'])->middleware('auth')->name('leaveComment');
});

Route::name('user.')->group(function () {
    Route::get('/profile', function () {
        $user = Auth::user();
        return view('user.profile', ['user' => $user]);
    })->middleware('auth')->name('profile');

    Route::get('/login', function () {
        if (Auth::check()) {
            return redirect(route('user.profile'));
        } else {
            return view('auth.login');
        }
    })->name('login');

    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);

    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->to('/');
    })->name('logout');

    Route::get('/register', function () {
        if (Auth::check()) {
            return redirect(route('user.profile'));
        } else {
            return view('auth.register');
        }
    })->name('register');

    Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'save']);
});
