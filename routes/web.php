<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/products', [ProductController::class, 'products'])->name('products.index');
Route::get('/product/show/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/buy/{product}', [ProductController::class, 'buy'])->name('buy');
Route::post('/buy/{product}', [ProductController::class, 'submitBuy']);
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'contact']);


Route::get('/channel', [DoctorController::class, 'channel'])->name('channel');
Route::post('/channel', [DoctorController::class, 'submitChannel']);
Route::get('/doctors', [DoctorController::class, 'doctors'])->name('doctors.index');

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::delete('/login', [SessionController::class, 'destroy']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function (){
        $user = Auth::user()->name;
        return view('admin.index', compact('user'));
    })->name('dashboard');

    Route::get('/products-admin', [ProductController::class, 'index'])->name('products');
    Route::get('/product', [ProductController::class, 'create'])->name('product.add');
    Route::post('/product', [ProductController::class, 'store']);
    Route::get('/product/{product}', [ProductController::class, 'edit'])->name('product.edit');
    ;Route::patch('/product/{product}', [ProductController::class, 'update']);
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.delete');


    Route::get('/doctor-admin', [DoctorController::class, 'index'])->name('doctors');
    Route::get('/doctor', [DoctorController::class, 'create'])->name('doctor.add');
    Route::post('/doctor', [DoctorController::class, 'store']);
    Route::get('/doctor/{doctor}', [DoctorController::class, 'edit'])->name('doctor.edit');
    Route::patch('/doctor/{doctor}', [DoctorController::class, 'update']);
    Route::delete('/doctor/{doctor}', [DoctorController::class, 'destroy'])->name('doctor.delete');

    Route::get('/articles/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/articles/create', [ArticleController::class, 'store']);
    Route::get('/admin/articles', [ArticleController::class, 'articles'])->name('admin.articles');
    Route::get('/articles/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::patch('/articles/edit/{article}', [ArticleController::class, 'update']);
    Route::delete('/articles/edit/{article}', [ArticleController::class, 'destroy'])->name('article.delete');
});
