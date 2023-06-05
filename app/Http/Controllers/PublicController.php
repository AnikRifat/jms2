<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Content;
use App\Models\Course;
use App\Models\Product;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function cp()
    {
        return view('web.pages.error.complete-profile');
    }
    public function na()
    {
        return view('web.pages.error.not-allowed');
    }

    public function index()
    {
        $courses = Course::where('status', '1')->take('8')->get();
        return view('web.pages.index', compact('courses'));
    }

    public function dashboard()
    {
        if (Auth::user()->role == 0) {
            $students = User::where('role', 1)->get();

            $hsc = Student::where('current_class', 'Hsc')->get();
            $ssc = Student::where('current_class', 'SSC')->get();
            return view('admin.pages.index', compact('students', 'hsc', 'ssc'));
        } else {
            return redirect()->route('user.dashboard');
        }
    }

    public function blogs()
    {
        $blogs = Blog::where('status', '1')
            ->orderBy('id', 'DESC')
            ->get();
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
        if (Auth::user()->complete == 1) {
            return redirect()->route('user.dashboard');
        } else {
            return view('web.pages.authentication.student.complete-profile');
        }
    }

    public function userdashboard()
    {
        $user = User::find(Auth::user()->id);
        if (Auth::user()->complete == 1) {



            return view('web.pages.dashboard.index', compact('user'));
        } else {
            return view('web.pages.authentication.student.complete-profile');
        }
    }
    public function createcourse()
    {
        $user = User::find(Auth::user()->id);

        return view('web.pages.courses.create', compact('user'));
    }

    public function editcourse($id)
    {
        $course = Course::find($id);
        $user = User::find(Auth::user()->id);

        return view('web.pages.courses.edit', compact('user', 'course'));
    }

    public function products()
    {
        $products = Product::where('status', '1')->get();
        return view('web.pages.product.index', compact('products'));
    }

    public function productdetails($product)
    {
        $product = Product::find($product);

        return view('web.pages.product.details', compact('product'));
    }
    public function courses()
    {
        $courses = Course::where('status', '1')->get();
        // dd($courses);
        return view('web.pages.courses.all', compact('courses'));
    }
    public function checkout($item, $type)
    {
        if ($type == 1) {
            $singleItem = Course::find($item);
        } elseif ($type == 2) {
            $singleItem = Product::find($item);
        }
        // dd($singleItem);
        return view('web.pages.checkout', compact('singleItem', 'type'));
    }
    public function courseDetails($course)
    {
        $course = Course::find($course);

        return view('web.pages.courses.details', compact('course'));
    }
}
