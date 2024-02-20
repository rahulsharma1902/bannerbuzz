<?php 
use App\Models\BlogCategory;
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

Breadcrumbs::for('category',function(Generator $trail, ProductCategories $category){
    $trail->parent('home');
    $trail->push($category->name,route('shop',$category->slug));
});

Breadcrumbs::for('accessories',function(Generator $trail){
    $trail->parent('home');
    $trail->push('Accessories',url('/accessories'));
});

Breadcrumbs::for('subcategory',function(Generator $trail,ProductCategories $parentcategory,ProductCategories $category){
    $trail->parent('category');
    $trail->push($category->name,route('shop',$parentcategory->slug,$category->slug));
});

// Breadcrumbs::for('category', function (Generator $trail, ProductCategories $category,ProductCategories $subcategory = null) {
    
//     if ($category) {
//         $trail->push($category->name, route('category', $category));
//         if ($subcategory) {
//             $trail->push($subcategory->name, route('category', [$category, $subcategory]));
//         }
//     }
// });