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

// Breadcrumbs::for('category',function(Generator $trail, ProductCategories $category){
//     $trail->parent('home');
//     $trail->push($category->name,route('shop',$category->slug));
// });

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