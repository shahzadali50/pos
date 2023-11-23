<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('login');
})->name('login');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('/loginuser', [LoginController::class, 'authenticate'])->name('loginuser');
Route::get('/loginuser', [LoginController::class, 'logout'])->name('logout');
// Catogory Routes⭐⭐
Route::get('/category', [CategoryController::class, 'Catogory_Add'])->name('category');
Route::post('/category/insert', [CategoryController::class, 'insert'])->name('category.insert');
Route::get('/category/list', [CategoryController::class, 'list'])->name('category.list');
Route::delete('/category/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
Route::put('/category/update/{id}', [CategoryController::class, 'CategoryUpdateForm'])->name('category.updateForm');
Route::post('/category/updatedRecored/{id}', [CategoryController::class, 'CategoryUpdatedRecord'])->name('category.updatedRecord');

// Brand Routes⭐⭐
Route::get('/brand', [BrandController::class, 'brand'])->name('brand');
Route::post('/brand/insert', [BrandController::class, 'insert'])->name('brand.insert');
Route::get('/brand/list', [BrandController::class, 'list'])->name('brand.list');
Route::delete('/brand-delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
Route::get('/brand/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
Route::post('/brand/update/{id}', [BrandController::class, 'BrandUpdate'])->name('brand.update');
// Product Route ⭐⭐
Route::get('/product', [ProductController::class, 'product'])->name('product.add');
Route::post('/product/insert', [ProductController::class, 'insert'])->name('product.insert');
Route::get('/product/list', [ProductController::class, 'list'])->name('product.list');
Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');



