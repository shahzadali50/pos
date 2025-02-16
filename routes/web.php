<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('login');
})->name('login');


Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
Route::get('/total-sale', [MainController::class, 'totalSale'])->name('total.sale');
Route::get('/monthly-sale', [MainController::class, 'monthlySale'])->name('month.sale');
Route::get('/weekly-sale', [MainController::class, 'weeklySale'])->name('weekly.sale');
Route::post('/loginuser', [LoginController::class, 'authenticate'])->name('loginuser');
Route::get('/loginuser', [LoginController::class, 'logout'])->name('logout');
// Catogory Routes⭐⭐
Route::get('/category', [CategoryController::class, 'Catogory_Add'])->name('category');
Route::post('/category/insert', [CategoryController::class, 'insert'])->name('category.insert');
Route::get('/category/list', [CategoryController::class, 'list'])->name('category.list');
Route::delete('/category/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
Route::put('/category/update/{id}', [CategoryController::class, 'CategoryUpdateForm'])->name('category.updateForm');
Route::post('/category/updatedRecored/{id}', [CategoryController::class, 'CategoryUpdatedRecord'])->name('category.updatedRecord');

Route::get('/category/status', [CategoryController::class, 'status'])->name('category.status');



// Brand Routes⭐⭐
Route::get('/brand', [BrandController::class, 'brand'])->name('brand');
Route::post('/brand/insert', [BrandController::class, 'insert'])->name('brand.insert');
Route::get('/brand/list', [BrandController::class, 'list'])->name('brand.list');
Route::delete('/brand-delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
Route::get('/brand/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
Route::post('/brand/update/{id}', [BrandController::class, 'BrandUpdate'])->name('brand.update');
Route::get('/brand/status', [BrandController::class, 'status'])->name('brand.status');

// Product Route ⭐⭐
Route::get('/product', [ProductController::class, 'product'])->name('product.add');
Route::post('/product/insert', [ProductController::class, 'insert'])->name('product.insert');
Route::get('/product/list', [ProductController::class, 'list'])->name('product.list');
Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::post('/product/add/stock', [ProductController::class, 'AddStock'])->name('add.stock');

// Order Route ⭐⭐
Route::get('/order/create', [OrderController::class, 'order'])->name('order.create');
Route::get('/get-product-details/{id}', [OrderController::class, 'items']);
Route::get('/get-product-details-by-code/{code}', [OrderController::class, 'itemsByCode']);
Route::post('order/store.', [OrderController::class, 'store'])->name('store.order');
Route::get('order/list', [OrderController::class, 'order_list'])->name('order.list');
Route::get('order/items', [OrderController::class, 'order_items'])->name('order.items');
Route::get('order/invoice/{id}', [OrderController::class, 'receipt'])->name('receipt');
