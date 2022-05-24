<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserProfileController;
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


Route::get('/', [HomeController::class, 'index'])->name('frontend.index');


Route::middleware(['web','auth'])->group(function () {

    Route::get('category/export-collection/', [CategoryController::class, 'exportCollection'])->name('category.export_collection');
    Route::get('category/export-view/', [CategoryController::class, 'exportView'])->name('category.export_view');

    // Category
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/{id}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('category/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('category/data', [CategoryController::class, 'getCategoryDataForDataTable'])->name('category.data');


    // Sub Category
    Route::get('sub-category', [SubCategoryController::class, 'index'])->name('sub_category.index');
    Route::get('sub-category/create', [SubCategoryController::class, 'create'])->name('sub_category.create');
    Route::post('sub-category', [SubCategoryController::class, 'store'])->name('sub_category.store');
    Route::get('sub-category/{id}', [SubCategoryController::class, 'show'])->name('sub_category.show');
    Route::get('sub-category/{id}/edit', [SubCategoryController::class, 'edit'])->name('sub_category.edit');
    Route::put('sub-category/{id}/update', [SubCategoryController::class, 'update'])->name('sub_category.update');
    Route::delete('sub-category/{id}/destroy', [SubCategoryController::class, 'destroy'])->name('sub_category.destroy');

    // Tags
    Route::get('tags', [TagController::class, 'index'])->name('tags.index');
    Route::get('tags/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('tags', [TagController::class, 'store'])->name('tags.store');
    Route::get('tags/{id}', [TagController::class, 'show'])->name('tags.show');
    Route::get('tags/{id}/edit', [TagController::class, 'edit'])->name('tags.edit');
    Route::put('tags/{id}/update', [TagController::class, 'update'])->name('tags.update');
    Route::delete('tags/{id}/destroy', [TagController::class, 'destroy'])->name('tags.destroy');

    // Attribites
    Route::get('attributes', [AttributeController::class, 'index'])->name('attributes.index');
    Route::get('attributes/create', [AttributeController::class, 'create'])->name('attributes.create');
    Route::post('attributes', [AttributeController::class, 'store'])->name('attributes.store');
    Route::get('attributes/{id}', [AttributeController::class, 'show'])->name('attributes.show');
    Route::get('attributes/{id}/edit', [AttributeController::class, 'edit'])->name('attributes.edit');
    Route::put('attributes/{id}/update', [AttributeController::class, 'update'])->name('attributes.update');
    Route::delete('attributes/{id}/destroy', [AttributeController::class, 'destroy'])->name('attributes.destroy');

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

    // User Profile
    Route::get('user-profile/create',[UserProfileController::class, 'create'])->name('user_profile.create');
    Route::post('user-profile/update-basic-info',[UserProfileController::class,'updateBasicInfo'])->name('user_profile.update_basic_info');
    Route::post('user-profile/update-password',[UserProfileController::class,'updatePassword'])->name('user_profile.update_password');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
