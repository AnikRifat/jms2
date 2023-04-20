<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Content;
use App\Models\Destination;
use App\Models\Feature;
use App\Models\Hero;
use App\Models\Package;
use App\Models\Photo;
use App\Models\Service;
use App\Models\Testimonial;

class PublicController extends Controller
{
    public function index()
    {

        return view('web.pages.index');
    }

    public function dashboard()
    {
        return view('admin.pages.index');
    }

    public function blogs()
    {
        $blogs = Blog::where('status', '1')->orderBy('id', 'DESC')->get();
        return view('web.pages.blog.index', compact('blogs'));
    }
    
    public function blogDetails($title)
    {
        $blog = Blog::where('title', $title)->first();
        $content = Content::find(1);
        return view('web.pages.blog.details', compact('blog', 'content'));
    }

}
