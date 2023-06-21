<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Content;
use App\Models\Course;
use App\Models\Product;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $teachers = User::where('role', 2)->where('allow', '1')->take(8)->get();
        return view('web.pages.index', compact('courses', 'teachers'));
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

    public function subjects()
    {
        $subjects = Subject::where('status', '1')->get();
        return view('web.pages.subject.index', compact('subjects'));
    }

    public function subjectdetails($subject)
    {
        $subjectitem = Subject::find($subject);
        $courses = Course::where('status', '1')->where('subject_id', $subject)->get();
        // dd($courses);
        return view('web.pages.subject.details', compact('courses', 'subjectitem'));
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


    public function teachers()
    {
        $teachers = User::where('role', 2)->where('allow', '1')->get();
        return view('web.pages.teacher.index', compact('teachers'));
    }

    public function teacherdetails($teacher)
    {
        $teacher = User::find($teacher);
        $isPurchased = DB::table('courses')
            ->join('orders', 'courses.id', '=', 'orders.item_id')
            ->where('orders.user_id', Auth::user()->id)
            ->where('courses.creator_id', $teacher->id)
            ->exists();

        // dd($isPurchased);
        // $order = Order::where('user_id',Auth::user()->id)
        // dd($teacher->teacher->courses);
        return view('web.pages.teacher.details', compact('teacher', 'isPurchased'));
    }
}
