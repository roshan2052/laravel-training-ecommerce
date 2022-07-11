<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\MenuController;
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


Route::middleware(['web','auth','localization','is_admin'])->prefix('backend/')->group(function () {

    //export
    Route::get('category/export-collection/', [CategoryController::class, 'exportCollection'])->name('category.export_collection');
    Route::get('category/export-view/', [CategoryController::class, 'exportView'])->name('category.export_view');

      // import
    Route::get('category/import-excel/', [CategoryController::class, 'importExcel'])->name('category.import_excel');
    Route::post('category/import', [CategoryController::class, 'import'])->name('category.import');

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

    Route::get('attributes/trash', [AttributeController::class,'trash'])->name('attributes.trash');
    Route::get('attributes/restore/{id}', [AttributeController::class,'restore'])->name('attributes.restore');
    Route::delete('attributes/force_delete/{id}', [AttributeController::class,'forceDelete'])->name('attributes.force_delete');

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

    //Menu
    Route::get('menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('menu/create',[MenuController::class, 'create'])->name('menu.create');
    Route::post('menu',[MenuController::class,'store'])->name('menu.store');
    Route::get('menu/{id}',[MenuController::class,'show'])->name('menu.show');
    Route::get('menu/{id}/edit',[MenuController::class,'edit'])->name('menu.edit');
    Route::put('menu/{id}/update',[MenuController::class,'update'])->name('menu.update');
    Route::delete('menu/{id}/destroy',[MenuController::class,'destroy'])->name('menu.destroy');

    //Coupon
    Route::get('coupon', [CouponController::class, 'index'])->name('coupon.index');
    Route::get('coupon/create',[CouponController::class, 'create'])->name('coupon.create');
    Route::post('coupon',[CouponController::class,'store'])->name('coupon.store');
    Route::get('coupon/{id}',[CouponController::class,'show'])->name('coupon.show');
    Route::get('coupon/{id}/edit',[CouponController::class,'edit'])->name('coupon.edit');
    Route::put('coupon/{id}/update',[CouponController::class,'update'])->name('coupon.update');
    Route::delete('coupon/{id}/destroy',[CouponController::class,'destroy'])->name('coupon.destroy');

});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('is_admin','auth');

Auth::routes();

// User Login
Route::get('user/login', [LoginController::class, 'showLoginForm'])->name('user.login');
Route::post('user/login', [LoginController::class, 'login'])->name('user.login');
//Localization
Route::get('lang/{lang}', [App\Http\Controllers\LanguageController::class, 'changeLang'])->name('lang.change');

Route::middleware(['web','customer_auth'])->group(function () {
    Route::post('product/add-to-cart', [HomeController::class, 'addToCart'])->name('product.add_to_cart');
    Route::get('product/cart', [HomeController::class, 'cart'])->name('product.cart');
    Route::post('product/store-review', [HomeController::class, 'storeReview'])->name('product.store_review');
    Route::post('product/delete-cart', [HomeController::class, 'deleteCart'])->name('product.delete_cart');
    Route::post('product/update-cart', [HomeController::class, 'updateCart'])->name('product.update_cart');
    Route::post('cart/apply-coupon', [HomeController::class, 'applyCoupon'])->name('cart.apply_coupon');
    Route::get('checkout', [HomeController::class, 'checkout'])->name('frontend.checkout');

});

Route::get('/', [HomeController::class, 'index'])->name('frontend.index');
Route::get('product/{slug}', [HomeController::class, 'productDetails'])->name('product_details');
Route::get('/{cat_slug}/{subcat_slug}/products', [HomeController::class, 'productBySubcategory'])->name('product_by_subcategory');

