<?php 
use App\Models\BlogCategory;
use App\Models\Product;
use App\Models\ProductAccessories;
use App\Models\ProductCategories;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;


Breadcrumbs::for('home',function(Generator $trail){
    $trail->push('Home',route('home'));
});

Breadcrumbs::for('about-us',function(Generator $trail){
    $trail->parent('home');
    $trail->push('About Us',route('about-us'));
});

Breadcrumbs::for('upload-artwork',function(Generator $trail){
    $trail->parent('home');
    $trail->push('Upload ArtWork',route('upload-artwork'));
});

Breadcrumbs::for('special-offers',function(Generator $trail){
    $trail->parent('home');
    $trail->push('Special Offers',route('special-offers'));
});

Breadcrumbs::for('privacy-policy',function(Generator $trail){
    $trail->parent('home');
    $trail->push('Privacy Policy',route('privacy-policy'));
});

Breadcrumbs::for('customer-reviews',function(Generator $trail){
    $trail->parent('home');
    $trail->push('Customer Reviews',route('customer-reviews'));
});

Breadcrumbs::for('order-tracking',function(Generator $trail){
    $trail->parent('home');
    $trail->push('Order Tracking',route('order-tracking'));
});

Breadcrumbs::for('contact-us',function(Generator $trail){
    $trail->parent('home');
    $trail->push('Contact Us',url('/contact-us'));
});

Breadcrumbs::for('Blogs',function(Generator $trail){
    $trail->parent('home');
    $trail->push('Blogs',url('/blogs'));
});

Breadcrumbs::for('Blog.category',function(Generator $trail,BlogCategory $category){
    $trail->parent('Blogs');
    $trail->push($category->name , route('blog.category',$category));
});

Breadcrumbs::for('accessories',function(Generator $trail){
    $trail->parent('home');
    $trail->push('Accessories',url('/accessories'));
});

Breadcrumbs::for('accessories.product',function(Generator $trail,ProductAccessories $product){
    $trail->parent('accessories');
    $trail->push($product->name,url('/accessories/',$product->slug));
});


Breadcrumbs::for('category', function (Generator $trail,ProductCategories  $category) {
    static $homeAdded = false;

    if (!$homeAdded) {
        $trail->parent('home');
        $homeAdded = true;
    }
    if ($category->parent_category) {
        $parent_category = ProductCategories::find($category->parent_category);
        $trail->parent('category', $parent_category);
    }
    $trail->push($category->name, route('shop', $category->slug));
});

Breadcrumbs::for('product', function (Generator $trail, Product $product) {
    $category = $product->category;

    if ($category) {
        $trail->parent('category', $category);
    }

    $trail->push($product->name, route('product', $product->slug));
});


// user dashboard 
// Breadcrumbs::for('user-dashboard',function(Generator $trail){
//     $trail->parent('home');
//     $trail->push('User Dashboard',route('user.dashboard'));
// });

// Breadcrumbs::for('profile',function(Generator $trail){
//     $trail->parent('user-dashboard');
//     $trail->push('Profile',route('user.profile'));
// });