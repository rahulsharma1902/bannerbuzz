<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blogs::where('status', true)->get();
        return view('admin.blogs.blog_list', compact('blogs'));
    }
    public function BlogCategoryPage()
    {
        $blog_category = BlogCategory::all();
        return view('admin.blogs.Blog_category', compact('blog_category'));
    }

    public function BlogCategoryAddProcc(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:blog_categories'
        ]);

        $blog_cat = new BlogCategory();
        $blog_cat->name = $request->name;
        $blog_cat->slug = $request->slug;
        $blog_cat->save();

        if ($blog_cat) {
            return redirect()->back()->with('success', 'New blog category added');
        } else {
            return redirect()->back()->with('error', 'something went role');
        }
    }

    public function removeBlogCategory($id)
    {
        $blog_cat = BlogCategory::find($id);
        if ($blog_cat) {
            $blogs = Blogs::where('blog_category_id', $id)->get();
            if ($blogs) {
                foreach ($blogs as $blog) {
                    $blog->update(['blog_category_id' => null]);
                }
            }
            $blog_cat->delete();

            return redirect()->back()->with('success', 'blog category deleted successfully');
        } else {
            return redirect()->back()->with('error', 'something went wrong');
        }

    }

    public function addBlog($slug = null)
    {
        $blog = Blogs::where('slug', $slug)->first();
        $blog_categories = BlogCategory::all();
        return view('admin.blogs.add_blog', compact('blog', 'blog_categories'));
    }

    //::::::::::::::: add or update blog ::::::::::::::::::://
    public function addBlogProcc(Request $request)
    {
        if ($request->id) {
            $request->validate(
                [
                    'title' => 'required',
                    'slug' => 'required|unique:blogs,slug,' . $request->id,
                    'sub_title' => 'required',
                    'blog_category_id' => 'required',
                    'short_description' => 'required',
                    'description' => 'required'
                ],
                [
                    'slug.unique' => 'This Name is already taken'
                ]
            );
            if ($request->image !== null) {
                $request->validate(
                    [
                        'image' => 'required',
                        'image.*' => 'required|image|mimes:jpeg,png,jpg,svg',
                    ],
                    [
                        'image.*.image' => 'The file must be an image.',
                        'image.*.mimes' => 'The image must be a file of type: jpeg, png, jpg, svg.',
                    ]
                );
            }
            $blog = Blogs::find($request->id);
            if ($blog) {
                $blog->title = $request->title;
                $blog->slug = $request->slug;
                $blog->sub_title = $request->sub_title;
                $blog->blog_category_id = $request->blog_category_id;
                $blog->short_description = $request->short_description;
                $blog->description = $request->description;
                if ($request->hasFile('image')) {
                    $image = $request->image;
                    $filename = 'blog' .time() . '.' . $image->extension();
                    $image->move(public_path() . '/blog_Images/', $filename);
                    $blog->image = $filename;
                }

                $blog->save();
                return redirect()->back()->with('success', 'blog updated successfully');
            } else {
                return redirect()->back()->with('error', 'something went wrong');
            }
        } else {
            $request->validate(
                [
                    'title' => 'required',
                    'slug' => 'required|unique:blogs,slug',
                    'sub_title' => 'required',
                    'image' => 'required',
                    'blog_category_id' => 'required',
                    'image.*' => 'required|image|mimes:jpeg,png,jpg,svg',
                    'short_description' => 'required',
                    'description' => 'required'
                ],
                [
                    'image.*.image' => 'The file must be an image.',
                    'image.*.mimes' => 'The image must be a file of type: jpeg, png, jpg, svg.',
                    'slug.unique' => 'This Name is already taken',
                    'slug.required' => '',
                ]
            );

            $blog = new Blogs();
            $blog->title = $request->title;
            $blog->slug = $request->slug;
            $blog->sub_title = $request->sub_title;
            $blog->blog_category_id = $request->blog_category_id;
            $blog->short_description = $request->short_description;
            $blog->description = $request->description;
            if ($request->hasFile('image')) {
                $image = $request->image;
                $filename = 'blog'  . time() . '.' . $image->extension();
                $image->move(public_path() . '/blog_Images/', $filename);
                $blog->image = $filename;
            }
        }
        $blog->save();
        return redirect()->back()->with('success', 'blog added successfully');
    }

    public function removeBlog($id)
    {
        if ($id) {
            $blog = Blogs::find($id);
            if ($blog) {
                $blog->delete();
                return redirect()->back()->with('success', 'blog deleted successfully');
            } else {
                return redirect()->back()->with('error', 'something went wrong');
            }
        } else {
            return redirect()->back()->with('error', 'something went wrong');
        }
    }
}
