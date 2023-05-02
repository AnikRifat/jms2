<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Content;
use App\Models\User;

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
    public function completeprofile()
    {
        return view('web.pages.authentication.student.complete-profile');
    }

    public function userdashboard($id)
    {
        $user = User::find($id);
        return view('web.pages.dashboard.index', compact('user'));
    }
}
