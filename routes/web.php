<?php

use App\Http\Controllers\Admin\AccessoriesController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Front\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Admin\AdminDashController;
use App\Http\Controllers\Admin\BackgroundCategoryController;
use App\Http\Controllers\Admin\BackgroundController;
use App\Http\Controllers\Front\CustomizerController;
use App\Http\Controllers\Admin\ShapeCategoryController;
use App\Http\Controllers\Admin\ShapeController;
use App\Http\Controllers\Admin\ClipArtController;
use App\Http\Controllers\Admin\ClipArtCategoryController;
use App\Http\Controllers\Admin\TemplateCategoryController;
use App\Http\Controllers\Admin\TemplateController;
use App\Http\Controllers\Admin\SiteControllers\HomeController;
use App\Http\Controllers\Admin\SiteControllers\AboutContentController;
use App\Http\Controllers\Admin\SiteControllers\TestimonialController;
use App\Http\Controllers\Front\ViewController;
use App\Models\BlogCategory;

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
Route::get('login', [AuthenticationController::class, 'index'])->name('login')->middleware('guest');
Route::post('loginProcc', [AuthenticationController::class, 'loginprocc']);
Route::get('register', [AuthenticationController::class, 'register'])->middleware('guest');
Route::post('registerProcc', [AuthenticationController::class, 'registerProcc']);

//logout Route 
Route::get('logout',[AuthenticationController::class,'logout']);

Route::group(['middleware' => ['admin']], function () {
    Route::get('admin-dashboard', [AdminDashController::class, 'index']);

    // profile settings 
    Route::get('admin-dashboard/setting', [AdminDashController::class, 'profile']);
    Route::post('admin-dashboard/update-profile-procc', [AdminDashController::class, 'ProfileUpdateProcc']);
    Route::post('admin-dashboard/change-password-procc', [AdminDashController::class, 'updatePasswordProcc']);

    // BackGroung Category
    Route::get('admin-dashboard/background-category', [BackgroundCategoryController::class, 'index']);

    Route::post('admin-dashboard/background-category/save', [BackgroundCategoryController::class, 'save']);
    Route::post('admin-dashboard/background-category/remove', [BackgroundCategoryController::class, 'remove']);

    // BackGroung
    Route::get('admin-dashboard/background-add', [BackgroundController::class, 'add']);
    Route::post('admin-dashboard/background-addProcc', [BackgroundController::class, 'addProcc']);

    Route::get('admin-dashboard/background-view', [BackgroundController::class, 'index']);
    Route::get('admin-dashboard/background-edit/{slug}', [BackgroundController::class, 'edit']);
    Route::post('admin-dashboard/background-editProcc', [BackgroundController::class, 'editProcc']);
    Route::post('admin-dashboard/background-remove', [BackgroundController::class, 'editProcc']);

    // Shape Category
    Route::get('admin-dashboard/shape-category', [ShapeCategoryController::class, 'index']);

    Route::post('admin-dashboard/shape-category/save', [ShapeCategoryController::class, 'save']);
    Route::post('admin-dashboard/shape-category/remove', [ShapeCategoryController::class, 'remove']);
    // shape
    Route::get('admin-dashboard/shape-add', [ShapeController::class, 'add']);
    Route::post('admin-dashboard/shape-addProcc', [ShapeController::class, 'addProcc']);

    Route::get('admin-dashboard/shape-view', [ShapeController::class, 'index']);
    Route::get('admin-dashboard/shape-edit/{slug}', [ShapeController::class, 'edit']);
    Route::post('admin-dashboard/shape-editProcc', [ShapeController::class, 'editProcc']);
    Route::post('admin-dashboard/shape-remove/{slug}', [ShapeController::class, 'editProcc']);

    // clip Art Category  ClipArtCategoryController  ClipArtController
    Route::get('admin-dashboard/clipart-category', [ClipArtCategoryController::class, 'index']);
    Route::post('admin-dashboard/clipart-category/save', [ClipArtCategoryController::class, 'save']);
    Route::post('admin-dashboard/clipart-category/remove', [ClipArtCategoryController::class, 'remove']);

    // clipart
    Route::get('admin-dashboard/clipart-add', [ClipArtController::class, 'add']);
    Route::post('admin-dashboard/clipart-addProcc', [ClipArtController::class, 'addProcc']);

    Route::get('admin-dashboard/clipart-view', [ClipArtController::class, 'index']);
    Route::get('admin-dashboard/clipart-edit/{slug}', [ClipArtController::class, 'edit']);
    Route::post('admin-dashboard/clipart-editProcc', [ClipArtController::class, 'editProcc']);
    Route::post('admin-dashboard/clipart-remove/{slug}', [ClipArtController::class, 'editProcc']);

    // template Category  TemplateCategoryController  TemplateController
    Route::get('admin-dashboard/template-category', [TemplateCategoryController::class, 'index']);
    Route::post('admin-dashboard/template-category/save', [TemplateCategoryController::class, 'save']);
    Route::post('admin-dashboard/template-category/remove', [TemplateCategoryController::class, 'remove']);

    // template create 
    Route::get('admin-dashboard/template-add/{slug?}', [TemplateController::class, 'add']);
    Route::post('admin-dashboard/template-addProcc', [TemplateController::class, 'addProcc']);
    Route::get('admin-dashboard/template/{slug}', [TemplateController::class, 'template']);
    Route::get('admin-dashboard/template-view', [TemplateController::class, 'index']);

    Route::any('admin-dashboard/template/uploadImage', [TemplateController::class, 'uploadImageTemplate']);

    Route::post('saveTemplate', [TemplateController::class, 'saveTemplate']);
    Route::get('admin-dashboard/template-remove/{slug}', [TemplateController::class, 'templateRemove']);


    //::::::::::::::::::::: ProductCategoryController Routes  ::::::::::::::::::::::://
    Route::get('admin-dashboard/product-category/{slug?}', [ProductCategoryController::class, 'index']);
    Route::post('admin-dashboard/product-category-addProcc', [ProductCategoryController::class, 'AddCategory']);
    Route::get('admin-dashboard/product-category-remove/{slug}', [ProductCategoryController::class, 'DeleteCategory']);
    Route::get('admin-dashboard/product-category-list', [ProductCategoryController::class, 'CategoryList']);
    Route::post('admin-dashboard/change-status', [ProductCategoryController::class, 'changeStatus']);
    Route::get('admin-dashboard/product-type', [ProductCategoryController::class, 'ProductType']);
    Route::post('admin-dashboard/product-type-addProcc', [ProductCategoryController::class, 'AddProductType']);
    Route::get('admin-dashboard/product-type-remove/{id}', [ProductCategoryController::class, 'removeProductType']);

    //:::::::::::::::::::::: ProductController Routes :::::::::::::::::::::://
    Route::get('admin-dashboard/products', [ProductController::class, 'index']);
    Route::get('admin-dashboard/add-product/{slug?}', [ProductController::class, 'addProduct']);
    Route::post('admin-dashboard/add-product-procc', [ProductController::class, 'addProcc']);
    Route::get('admin-dashboard/remove-product/{id}', [ProductController::class, 'removeProduct']);

    //:::::::::::::::::::::: AccessoriesController Routes :::::::::::::::::::::::://
    Route::get('admin-dashboard/product-accessories', [AccessoriesController::class, 'index']);
    Route::get('admin-dashboard/add-accessories/{slug?}', [AccessoriesController::class, 'addAccessorie']);
    Route::post('admin-dashboard/add-accessories-procc', [AccessoriesController::class, 'AccessoriesAddprocc']);
    Route::get('admin-dashboard/remove-product-accessories/{id}', [AccessoriesController::class, 'removeAccessories']);
    Route::get('admin-dashboard/accessories-type', [AccessoriesController::class, 'AccessoriesType']);
    Route::post('admin-dashboard/accessories-type-addProcc', [AccessoriesController::class, 'AddAccessorieType']);
    Route::get('admin-dashboard/remove-accessorie-type/{id}', [AccessoriesController::class, 'removeType']);


    //::::::::::::::::::::::::::: BlogController Routes :::::::::::::::::::::::::::::// 
    Route::get('admin-dashboard/blog-category', [BlogController::class, 'BlogCategoryPage']);
    Route::post('admin-dashboard/add-blog-category', [BlogController::class, 'BlogCategoryAddProcc']);
    Route::get('admin-dashboard/remove-blog-category/{id}', [BlogController::class, 'removeBlogCategory']);
    Route::get('admin-dashboard/blogs', [BlogController::class, 'index']);
    Route::get('admin-dashboard/add-blog/{slug?}', [BlogController::class, 'addBlog']);
    Route::post('admin-dashboard/add-blog-procc', [BlogController::class, 'addBlogProcc']);
    Route::get('admin-dashboard/remove-blog/{id}', [BlogController::class, 'removeBlog']);

    //::::::::: Site content settings ::::::::::::::::::::::::::::://

    //home page  HomeController
    Route::get('admin-dashboard/home-content',[HomeController::class,'index']);
    Route::post('admin-dashboard/home-content-update',[HomeController::class,'UpdateProcc']);

    //About us Content 
    Route::get('admin-dashboard/about-us-content',[AboutContentController::class,'index']);
    Route::post('admin-dashboard/about-us-content-update',[AboutContentController::class,'UpdateContent']);

    // Add testimonials TestimonialController
    Route::get('admin-dashboard/testimonials',[TestimonialController::class,'index']);
    Route::post('admin-dashboard/add-testimonial-procc',[TestimonialController::class,'AddProcc']);
    Route::get('admin-dashboard/remove-testimonial/{id}',[TestimonialController::class,'remove']);
});

// FRONT LAYOUT

// Route::get('/',[CustomizerController::class,'index']);

//:::::::::::::::::::::: Front Routes ::::::::::::::::::::::::::::::::::::://

//:::::::::::::::   ViewController Routes ::::::::::::::::::::::::://
Route::get('/', [ViewController::class, 'index'])->name('home');
Route::get('about-us', [ViewController::class, 'aboutUs'])->name('about-us');
Route::get('contact-us', [ViewController::class, 'contactUs'])->name('contact-us');
Route::get('customer-reviews', [ViewController::class, 'customerReviews'])->name('customer-reviews');
Route::get('privacy-policy', [ViewController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('upload-artwork', [ViewController::class, 'uploadArtwork'])->name('upload-artwork');
Route::get('order-tracking', [ViewController::class, 'ordertracking'])->name('order-tracking');

// blogs ViewController //
Route::get('blogs/{slug?}', [ViewController::class, 'blogs'])->name('blog.category');
Route::get('blog/{slug}', [ViewController::class, 'blogDetails']);
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::://

//:::::::::::::::::::;:: ShopController Routes ::::::::::::::::::::::::::::::::://
Route::get('shop/{slug}', [ShopController::class, 'shop'])->name('shop');
Route::get('special-offers', [ShopController::class, 'specialoffers'])->name('special-offers');
Route::get('details/{slug}', [ShopController::class, 'ProductDetails'])->name('product');



// :::::::::::::::::Customizer 

Route::get('designtool/{productSlug}/{templateSlug}', [CustomizerController::class, 'index']);

Route::post('saveDesign', [CustomizerController::class, 'saveTemplate']);

// :::::::::::::::::Customizer route end here


// Accessories Routes //
Route::get('accessories', [ShopController::class, 'accessories']);
Route::get('accessories/{slug}', [ShopController::class, 'AccessoriesDetails']);
Route::get('accessories/sizes/{id}', [ShopController::class, 'getaccessoriessizes']);

// Ajax Routes //
Route::get('categories/children/{parent_id}', [ShopController::class, 'getChildCategories']);
Route::get('/categories/products/{category_id}', [ShopController::class, 'getCategoryProducts']);
Route::get('product/sizes/{id}', [ShopController::class, 'getsizes']);




//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::://


// fallback route 
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});


