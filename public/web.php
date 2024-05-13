<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authentication\AuthenticationController;
use App\Http\Controllers\Admin\AdminDashController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\ConditionController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\LocationServiceController;
use App\Http\Controllers\Front\LocationServiceProviderController;


use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\AdminDiscountController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Admin\SiteMetaController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\Admin\ServiceLocationController;
use App\Http\Controllers\Admin\ServiceProviderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\UpcommingEventController;
use App\Http\Controllers\Admin\EbookController;



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



Route::get('/login',[AuthenticationController::class,'index']);
// Route::get('/register',[AuthenticationController::class,'register']);
// Route::post('/registerProcc',[AuthenticationController::class,'registerProcc']);
Route::any('/loginprocc',[AuthenticationController::class,'loginProcc']);
Route::get('/logout',[AuthenticationController::class,'logout']);


//admin
Route::group(['middleware' =>['admin']],function(){
Route::get('/admin-dashboard',[AdminDashController::class,'index'])->name('admin-dashboard');
Route::get('admin-dashboard/employeregister/',[UserController::class,'index'])->name('Employe-register');
Route::get('admin-dashboard/employeeslist',[UserController::class,'list'])->name('Employe-list');
Route::get('admin-dashboard/deleteemploye/{id}',[UserController::class,'delete']);
Route::post('registerProcc',[UserController::class,'registerProcc']);

//products
Route::get('admin-dashboard/category',[ProductController::class,'category'])->name('category');
Route::post('admin-dashboard/categoriesadd',[ProductController::class,'addCategory'])->name('category-add');
Route::post('catgoriesdelete',[ProductController::class,'deleteCategory']);

Route::get('admin-dashboard/productsAdd',[ProductController::class,'addProductsView'])->name('products-add');
Route::post('productsAdd',[ProductController::class,'addProduct']);
Route::get('admin-dashboard/products',[ProductController::class,'products'])->name('products');

Route::get('admin-dashboard/product-edit/{slug}',[ProductController::class,'editProduct'])->name('product-edit');
Route::post('productsUpdate',[ProductController::class,'productsUpdate']);
Route::get('product-remove/{slug}',[ProductController::class,'removeProduct']);


// GalleryController :
Route::get('admin-dashboard/gallery-add',[GalleryController::class,'addGalleryView'])->name('gallery-add');
Route::post('galleryAdd',[GalleryController::class,'addGallery']);

Route::get('admin-dashboard/gallery',[GalleryController::class,'index'])->name('gallery');
Route::get('admin-dashboard/gallery-edit/{slug}',[GalleryController::class,'editGallery'])->name('gallery-edit');
Route::post('galleryUpdate',[GalleryController::class,'galleryUpdate']);
Route::get('gallery-remove/{slug}',[GalleryController::class,'removeGallery']);


//AdminAccountSetting
Route::get('admin-dashboard/setting',[AdminSettingController::class,'index'])->name('account-setting');
Route::post('admin-dashboard/settingupdate',[AdminSettingController::class,'updateprocc']);

/*admin-dashboard/contact-us =>  Contact us */
Route::get('admin-dashboard/contact-us',[ContactUsController::class,'index'])->name('contact-us');
Route::get('admin-dashboard/removeContactUs/{id}',[ContactUsController::class,'remove']);


//orderes
Route::get('admin-dashboard/orders',[OrdersController::class,'index'])->name('order-list');
// Route::get('admin-dashboard/orderview/{orderid}',[OrdersController::class,'orderview'])->name('order-view');
Route::post('admin-dashboard/orderupdate',[OrdersController::class,'orderupdate'])->name('order-update');


// Location controller 
Route::get('admin-dashboard/countries',[LocationController::class,'countries']);
Route::post('addCountry',[LocationController::class,'addCountry']);
Route::post('country-delete',[LocationController::class,'removeCountry']);

// Delivery Locations  state routes
Route::get('admin-dashboard/states',[LocationController::class,'states']);
Route::post('admin-dashboard/addState',[LocationController::class,'addState']);
Route::Post('admin-dashboard/state-delete',[LocationController::class,'removeState']);
Route::get('admin-dashboard/orgin-address',[LocationController::class,'originaddress']);
Route::post('admin-dashboard/orgin-address/submit',[LocationController::class,'originSub']);

// Service locations states  Routes
Route::get('admin-dashboard/service-location/states',[LocationController::class,'ServiceLocationsstates']);
Route::get('admin-dashboard/get-state-data/{id}',[LocationController::class,'GetStateData']);
Route::Post('admin-dashboard/change-state-status',[LocationController::class,'ChangeStatus']);
Route::post('admin-dashboard/service-location/addState',[LocationController::class,'addLocationState']);
Route::get('admin-dashboard/service-location/remove-state/{id}',[LocationController::class,'removeLocationState']);


//discounts
Route::get('admin-dashboard/discounts',[AdminDiscountController::class,'index'])->name('discount-list');
Route::get('admin-dashboard/discounts/add/',[AdminDiscountController::class,'add'])->name('discount-add');
Route::get('admin-dashboard/discounts/update/{id}',[AdminDiscountController::class,'update'])->name('discount-update');
Route::post('admin-dashboard/discounts/addprocc/',[AdminDiscountController::class,'addProcc']);
Route::get('admin-dashboard/discounts/delete/{id}',[AdminDiscountController::class,'delete']);
Route::post('admin-dashboard/updatestatus',[AdminDiscountController::class,'updatestatus']);

//sitemeta
Route::get('admin-dashboard/sitemeta/footersection',[SiteMetaController::class,'index'])->name('site-meta-footer');
Route::post('admin-dashboard/sitemeta/footersubmit',[SiteMetaController::class,'footersubmit']);
Route::get('admin-dashboard/sitemeta/exterior',[SiteMetaController::class,'exterior'])->name('site-meta-exterior');
Route::post('admin-dashboard/sitemeta/exteriorsubmit',[SiteMetaController::class,'exteriorsubmit']);
Route::get('admin-dashboard/sitemeta/image/remove',[SiteMetaController::class,'delete']);

Route::get('admin-dashboard/sitemeta/lawn',[SiteMetaController::class,'lawn'])->name('site-meta-lawn');
Route::post('admin-dashboard/sitemeta/lawnsubmit',[SiteMetaController::class,'lawnsubmit']);


Route::get('admin-dashboard/sitemeta/home',[SiteMetaController::class,'home'])->name('site-meta-home');
Route::post('admin-dashboard/sitemeta/homesubmit',[SiteMetaController::class,'homesubmit']);

Route::get('admin-dashboard/sitemeta/privacy-policy',[SiteMetaController::class,'privacypolicy'])->name('site-meta-privacy');
Route::post('admin-dashboard/sitemeta/privacysubmit',[SiteMetaController::class,'privacySubmit']);



// Quote Controller
Route::get('admin-dashboard/quote',[QuoteController::class,'index']);
Route::post('admin-dashboard/addQuote',[QuoteController::class,'addQuote'])->name('quote-add');
Route::post('quotedelete',[QuoteController::class,'deleteQuote']);

// Service Provider :: Location ServiceLocationController php artisan make:model serviceLocation -m     
Route::get('admin-dashboard/add-location',[ServiceLocationController::class,'add'])->name('add-Location');
Route::post('admin-dashboard/add-procc',[ServiceLocationController::class,'addProcc']);

Route::get('admin-dashboard/service-locations',[ServiceLocationController::class,'index'])->name('Location');
Route::get('admin-dashboard/get-data/{country_code}',[ServiceLocationController::class,'getData']);

Route::get('admin-dashboard/service-location-edit/{id}',[ServiceLocationController::class,'edit'])->name('edit-Location');
Route::post('admin-dashboard/update-procc',[ServiceLocationController::class,'updateProcc']);

Route::get('admin-dashboard/service-location-remove/{id}',[ServiceLocationController::class,'Removelocation']);


// Service provider page::
Route::get('admin-dashboard/service-provider',[ServiceProviderController::class,'index'])->name('Service-provider');
Route::post('admin-dashboard/service-provider/update-procc',[ServiceProviderController::class,'updateProcc']);
// Route::post('admin-dashboard/update-procc',[ServiceLocationController::class,'updateProcc']);

Route::get('admin-dashboard/testimonial',[TestimonialController::class,'index'])->name('Testimonial');
Route::post('admin-dashboard/testimonial-add',[TestimonialController::class,'add']);
Route::get('admin-dashboard/testimonial-record/{id}',[TestimonialController::class,'getRecord']);  
Route::get('admin-dashboard/testimonial-remove/{id}',[TestimonialController::class,'remove']);  


Route::get('admin-dashboard/faq',[FaqController::class,'index'])->name('faqs');
Route::post('admin-dashboard/faq-add',[FaqController::class,'add']);
Route::get('admin-dashboard/check-order/{ordernumber}',[FaqController::class,'checkOrder']);
Route::get('admin-dashboard/faq-record/{id}',[FaqController::class,'getRecord']);  
Route::get('admin-dashboard/faq-remove/{id}',[FaqController::class,'remove']);  

// upcoming events 
Route::get('admin-dashboard/upcoming-events/{city_id}',[UpcommingEventController::class, 'index'])->name('upcoming-events');
Route::get('admin-dashboard/add-upcoming-event',[UpcommingEventController::class, 'add']);


// Ebooks

//category
Route::get('admin-dashboard/ebook-category',[EbookController::class,'category']);
Route::post('admin-dashboard/ebook-categoriesadd',[EbookController::class,'addCategory']);
Route::post('admin-dashboard/ebook-catgoriesdelete',[EbookController::class,'deleteCategory']);

// add-ebook
Route::get('admin-dashboard/add-ebook',[EbookController::class,'addEbooksView'])->name('products-add');
Route::post('ebookAdd',[EbookController::class,'addEbook']);
Route::get('admin-dashboard/ebooks',[EbookController::class,'ebooks'])->name('ebooks');

Route::get('admin-dashboard/ebook-edit/{slug}',[EbookController::class,'editEbook'])->name('ebook-edit');
Route::post('ebookUpdate',[EbookController::class,'ebooksUpdate']);
Route::get('ebook-remove/{slug}',[EbookController::class,'removeEbook']);


});




// Front controller start from here :
Route::get('/',[FrontController::class,'index']);
//contact
Route::get('/contact/{id?}',[ContactController::class,'index']);
Route::post('/contactSubmit',[ContactController::class,'submitprocc']);
Route::get('/lawn',[FrontController::class,'lawn']);
Route::get('/exteriors',[FrontController::class,'exteriors']);

// Location 
// Route::get('locations/{state?}', [LocationServiceController::class, 'index']);
Route::get('locations', [LocationServiceController::class, 'index']);

Route::get('locations/{state}/{city}', [LocationServiceProviderController::class, 'index']);

/* Conditions  */
// Route::get('terms-of-service',[ConditionController::class,'termsOfService']);
Route::get('privacy-policy',[ConditionController::class,'privacyPolicy']);

// Route::get('/shop',[FrontController::class,'shop']);
Route::get('/gallery',[FrontController::class,'gallery']);

Route::group(['middleware' =>['user']],function(){
    // Route::get('/shop',[FrontController::class,'shop']);
    Route::get('/store',[ShopController::class,'index']);
    Route::get('/store-details/{slug}',[ShopController::class,'details']);

// Add To cart
Route::post('addToCart',[CartController::class,'addToCart']);
Route::get('cart',[CartController::class,'index']);
Route::post('update-cart',[CartController::class,'update']);
Route::post('remove-cart',[CartController::class,'removeCart']);

Route::get('checkout',[CheckoutController::class,'index']);

Route::post('checkoutpayment',[CheckoutController::class,'checkout']);


/* Discount */
Route::post('checkDiscount',[AdminDiscountController::class,'checkDiscount']);



});



