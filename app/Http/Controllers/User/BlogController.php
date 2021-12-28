<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        $ay_arr = ['Yanvar', 'Fevral', 'Mart', 'Aprel', 'May', 'İyun', 'İyul', 'Avqust', 'Sentyabr', 'Oktyabr', 'Noyabr', 'Dekabr'];
        return view('customer.pages.blog', compact('blogs', 'ay_arr'));
    }
    public function single($slug = "")
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $ay_arr = ['Yanvar', 'Fevral', 'Mart', 'Aprel', 'May', 'İyun', 'İyul', 'Avqust', 'Sentyabr', 'Oktyabr', 'Noyabr', 'Dekabr'];

        $blog_title = $blog->blog_title;
        $blog_content = $blog->blog_content;
        $blog_image = $blog->blog_image;
        $d = explode(' ', $blog->created_at);
        $date = explode('-', $d[0]);
        $date = $date[2] . " " . $ay_arr[$date[1]-1] . " " . $date[0];
        return view('user.pages.blog_single', compact('blog_title', 'blog_content', 'blog_image', 'date'));
    }
}
