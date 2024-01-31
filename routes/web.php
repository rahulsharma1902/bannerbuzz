<?php

use App\Http\Controllers\Admin\AccessoriesController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Admin\AdminDashController;
use App\Http\Controllers\Admin\BackgroundCategoryController;
use App\Http\Controllers\Admin\BackgroundController;
use App\Http\Controllers\Front\CustomizeController;
use App\Http\Controllers\Admin\ShapeCategoryController;
use App\Http\Controllers\Admin\ShapeController;
use App\Http\Controllers\Admin\ClipArtController;
use App\Http\Controllers\Admin\ClipArtCategoryController;
use App\Http\Controllers\Admin\TemplateCategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('login',[AuthenticationController::class,'index'])->name('login');
Route::post('loginProcc',[AuthenticationController::class,'loginprocc']);
Route::get('register',[AuthenticationController::class,'register']);
Route::post('registerProcc',[AuthenticationController::class,'registerProcc']);

Route::group(['middleware' =>['admin']],function(){
Route::get('admin-dashboard',[AdminDashController::class,'index']);


// BackGroung Category
Route::get('admin-dashboard/background-category',[BackgroundCategoryController::class,'index']);

Route::post('admin-dashboard/background-category/save',[BackgroundCategoryController::class,'save']);
Route::post('admin-dashboard/background-category/remove',[BackgroundCategoryController::class,'remove']);

// BackGroung
Route::get('admin-dashboard/background-add',[BackgroundController::class,'add']);
Route::post('admin-dashboard/background-addProcc',[BackgroundController::class,'addProcc']);

Route::get('admin-dashboard/background-view',[BackgroundController::class,'index']);
Route::get('admin-dashboard/background-edit/{slug}',[BackgroundController::class,'edit']);
Route::post('admin-dashboard/background-editProcc',[BackgroundController::class,'editProcc']);
Route::post('admin-dashboard/background-remove',[BackgroundController::class,'editProcc']);



// Shape Category
Route::get('admin-dashboard/shape-category',[ShapeCategoryController::class,'index']);

Route::post('admin-dashboard/shape-category/save',[ShapeCategoryController::class,'save']);
Route::post('admin-dashboard/shape-category/remove',[ShapeCategoryController::class,'remove']);
// shape
Route::get('admin-dashboard/shape-add',[ShapeController::class,'add']);
Route::post('admin-dashboard/shape-addProcc',[ShapeController::class,'addProcc']);

Route::get('admin-dashboard/shape-view',[ShapeController::class,'index']);
Route::get('admin-dashboard/shape-edit/{slug}',[ShapeController::class,'edit']);
Route::post('admin-dashboard/shape-editProcc',[ShapeController::class,'editProcc']);
Route::post('admin-dashboard/shape-remove/{slug}',[ShapeController::class,'editProcc']);



// clip Art Category  ClipArtCategoryController  ClipArtController
Route::get('admin-dashboard/clipart-category',[ClipArtCategoryController::class,'index']);
Route::post('admin-dashboard/clipart-category/save',[ClipArtCategoryController::class,'save']);
Route::post('admin-dashboard/clipart-category/remove',[ClipArtCategoryController::class,'remove']);

// clipart
Route::get('admin-dashboard/clipart-add',[ClipArtController::class,'add']);
Route::post('admin-dashboard/clipart-addProcc',[ClipArtController::class,'addProcc']);

Route::get('admin-dashboard/clipart-view',[ClipArtController::class,'index']);
Route::get('admin-dashboard/clipart-edit/{slug}',[ClipArtController::class,'edit']);
Route::post('admin-dashboard/clipart-editProcc',[ClipArtController::class,'editProcc']);
Route::post('admin-dashboard/clipart-remove/{slug}',[ClipArtController::class,'editProcc']);



// template Category  TemplateCategoryController  TemplateController
Route::get('admin-dashboard/template-category',[TemplateCategoryController::class,'index']);
Route::post('admin-dashboard/template-category/save',[TemplateCategoryController::class,'save']);
Route::post('admin-dashboard/template-category/remove',[TemplateCategoryController::class,'remove']);


// Product Category productCategoryController 
Route::get('admin-dashboard/product-category/{slug?}',[ProductCategoryController::class,'index']);
Route::post('admin-dashboard/product-category-addProcc',[ProductCategoryController::class,'AddCategory']);
Route::get('admin-dashboard/product-category-remove/{slug}',[ProductCategoryController::class,'DeleteCategory']);
Route::get('admin-dashboard/product-category-list',[ProductCategoryController::class,'CategoryList']);

// Product Type ProductController 
Route::get('admin-dashboard/product-type',[ProductController::class,'ProductType']);
Route::post('admin-dashboard/product-type-addProcc',[ProductController::class,'AddProductType']);
Route::get('admin-dashboard/product-type-remove/{id}',[ProductController::class,'removeProductType']);

// product Accessories AccessoriesController
Route::get('admin-dashboard/product-accessories',[AccessoriesController::class,'index']);
Route::get('admin-dashboard/add-accessories/{slug?}',[AccessoriesController::class,'addAccessorie']);
Route::post('admin-dashboard/add-accessories-procc',[AccessoriesController::class,'AccessoriesAddprocc']);
Route::get('admin-dashboard/remove-product-accessories/{id}',[AccessoriesController::class,'removeAccessories']);

// Accessories type AccessoriesController
Route::get('admin-dashboard/accessories-type',[AccessoriesController::class,'AccessoriesType']);
Route::post('admin-dashboard/accessories-type-addProcc',[AccessoriesController::class,'AddAccessorieType']);
Route::get('admin-dashboard/remove-accessorie-type/{id}',[AccessoriesController::class,'removeType']);

});

// FRONT LAYOUT

Route::get('/',[CustomizeController::class,'index']);

