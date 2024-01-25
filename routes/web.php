<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Admin\AdminDashController;
use App\Http\Controllers\Admin\BackgroundCategoryController;
use App\Http\Controllers\Admin\BackgroundController;
use App\Http\Controllers\Front\CustomizeController;
use App\Http\Controllers\Admin\ShapeCategoryController;
use App\Http\Controllers\Admin\ShapeController;

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

});

// FRONT LAYOUT

Route::get('/',[CustomizeController::class,'index']);

