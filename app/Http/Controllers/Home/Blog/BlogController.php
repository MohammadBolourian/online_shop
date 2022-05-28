<?php

namespace App\Http\Controllers\Home\Blog;

use App\Http\Controllers\Controller;
use App\Models\Content\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Post::latest()->paginate(12);
        return view('home.blog.blogs', compact('blogs'));
    }


    public function show($slug)
    {
        $blogs = Post::latest()->paginate(6);
        $data = Post::where("slug",$slug)->first();
        return view('home.blog.single-blog',compact('data','blogs'));
    }
}
