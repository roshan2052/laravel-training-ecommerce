<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TestController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['web','auth'])->group(function () {

    // Category
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/{id}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('category/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');

    // Category
    Route::get('sub-category', [SubCategoryController::class, 'index'])->name('sub_category.index');
    Route::get('sub-category/create', [SubCategoryController::class, 'create'])->name('sub_category.create');
    Route::post('sub-category', [SubCategoryController::class, 'store'])->name('sub_category.store');
    Route::get('sub-category/{id}', [SubCategoryController::class, 'show'])->name('sub_category.show');
    Route::get('sub-category/{id}/edit', [SubCategoryController::class, 'edit'])->name('sub_category.edit');
    Route::put('sub-category/{id}/update', [SubCategoryController::class, 'update'])->name('sub_category.update');
    Route::delete('sub-category/{id}/destroy', [SubCategoryController::class, 'destroy'])->name('sub_category.destroy');

    //Product
    Route::get('product', [ProductController::class, 'index'])->name('product.index');
    Route::get('product/create',[ProductController::class, 'create'])->name('product.create');
    Route::post('product',[ProductController::class,'store'])->name('product.store');
    Route::get('product/{id}',[ProductController::class,'show'])->name('product.show');
    Route::get('product/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
    Route::put('product/{id}/update',[ProductController::class,'update'])->name('product.update');
    Route::delete('product/{id}/destroy',[ProductController::class,'destroy'])->name('product.destroy');
    Route::post('product/get-sub-category',[ProductController::class,'getSubCategory'])->name('product.get_sub_category');

    // Setting
    Route::get('setting/create',[SettingController::class, 'create'])->name('setting.create');
    Route::post('setting',[SettingController::class,'store'])->name('setting.store');
    Route::get('setting/{id}/edit',[SettingController::class,'edit'])->name('setting.edit');
    Route::put('setting/{id}/update',[SettingController::class,'update'])->name('setting.update');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
