<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/mail', function () {
    $data = array('name' => "Virat Gandhi");

    $mail = Mail::send(['text' => 'email.test'], $data, function ($message) {
        $message->to('reafatul@gmail.com')->subject('Laravel Basic Testing Mail');
    });
    dd($mail);
    echo "Basic Email Sent. Check your inbox.";
});

Route::get('/', [PublicController::class, 'index'])->name('index');
Route::get('/Complete-Profile-202', [PublicController::class, 'cp'])->name('cp');
Route::get('/not-allowed', [PublicController::class, 'na'])->name('na');

Route::get('/complete-profile', [PublicController::class, 'completeprofile'])->name('profile.complete');
Route::get('/blog/{blog}', [PublicController::class, 'blogDetails'])->name('blog.details');
Route::get('/blogs', [PublicController::class, 'blogs'])->name('blogs.all');
Route::get('/courses/all', [PublicController::class, 'courses'])->name('course.all');
Route::get('/course/details/{course}', [PublicController::class, 'coursedetails'])->name('course.details');
Route::get('/products/all', [PublicController::class, 'products'])->name('product.all');
Route::get('/product/details/{product}', [PublicController::class, 'productdetails'])->name('product.details');

Route::post('/search', [SearchController::class, 'search'])->name('search'); //  search
Route::get('/search/view', [SearchController::class, 'result'])->name('result'); // show search

Route::middleware('auth')->group(function () {
    Route::post('store/student-info', [StudentController::class, 'store'])->name('student.store');
    Route::post('store/teacher-info', [TeacherController::class, 'store'])->name('teacher.store');
});

Route::prefix('/user/dashboard')->middleware(['auth', 'allow'])->group(function () {
    Route::get('/Profile', [PublicController::class, 'userdashboard'])->name('user.dashboard');
    Route::get('checkout/{item}/{type}', [PublicController::class, 'checkout'])->name('checkout.store');
    Route::post('order/store', [OrderController::class, 'store'])->name('order.store');
    Route::post('update/teacher/{user}', [UserController::class, 'teacher'])->name('teacher.update');
    Route::post('update/student/{user}', [UserController::class, 'student'])->name('student.update');
    Route::post('update/user/{user}', [UserController::class, 'update'])->name('user.update');

    Route::get('/', [CourseController::class, 'index'])->name('user.courses.index');
    Route::get('/create-course', [PublicController::class, 'createcourse'])->name('user.course.create');
});

Route::prefix('chat')->middleware(['auth', 'allow'])->group(function () {
    Route::get('/{student}', [TeacherController::class, 'chat'])->name('chat.show.teacher');
    Route::get('/{teacher}', [StudentController::class, 'chat'])->name('chat.show.student');
    Route::get('/', [ChatController::class, 'store'])->name('chat.save');
});

Route::prefix('/dashboard')->middleware('auth')->group(function () {




    Route::get('/', [PublicController::class, 'dashboard'])->name('dashboard.index');


    Route::prefix('courses')->group(function () {
        // Hero-Routes
        Route::get('/', [CourseController::class, 'index'])->name('courses.index');
        Route::get('/create', [CourseController::class, 'create'])->name('courses.create');
        Route::post('/', [CourseController::class, 'store'])->name('courses.store');
        Route::get('/course_list', [CourseController::class, 'show'])->name('courses.show'); // course list
        Route::get('/course_list/add/{id}', [CourseController::class, 'add'])->name('courses.add'); // add order
        Route::get('/course_list/order', [CourseController::class, 'order'])->name('courses.order'); // show order
        Route::get('/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
        Route::put('/{course}', [CourseController::class, 'update'])->name('courses.update');
        Route::get('/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
        Route::get('/active/{course}', [CourseController::class, 'active'])->name('courses.active');
        Route::get('/inactive/{course}', [CourseController::class, 'inactive'])->name('courses.inactive');
    });


    Route::prefix('categories')->group(function () {
        // Hero-Routes
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('categories.show');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        Route::get('/active/{category}', [CategoryController::class, 'active'])->name('categories.active');
        Route::get('/inactive/{category}', [CategoryController::class, 'inactive'])->name('categories.inactive');
    });

    Route::prefix('subjects')->group(function () {
        // Hero-Routes
        Route::get('/', [SubjectController::class, 'index'])->name('subjects.index');
        Route::get('/create', [SubjectController::class, 'create'])->name('subjects.create');
        Route::post('/', [SubjectController::class, 'store'])->name('subjects.store');
        Route::get('/{subject}', [SubjectController::class, 'show'])->name('subjects.show');
        Route::get('/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
        Route::put('/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
        Route::get('/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');
        Route::get('/active/{subject}', [SubjectController::class, 'active'])->name('subjects.active');
        Route::get('/inactive/{subject}', [SubjectController::class, 'inactive'])->name('subjects.inactive');
    });

    Route::prefix('blogs')->group(function () {
        // Blog-Routes
        Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
        Route::get('/create', [BlogController::class, 'create'])->name('blogs.create');
        Route::post('/', [BlogController::class, 'store'])->name('blogs.store');
        Route::get('/{blog}', [BlogController::class, 'show'])->name('blogs.show');
        Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
        Route::put('/{blog}', [BlogController::class, 'update'])->name('blogs.update');
        Route::get('/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
        Route::get('/active/{blog}', [BlogController::class, 'active'])->name('blogs.active');
        Route::get('/inactive/{blog}', [BlogController::class, 'inactive'])->name('blogs.inactive');
    });
    Route::prefix('products')->group(function () {
        // product-Routes
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/', [ProductController::class, 'store'])->name('products.store');
        Route::get('/{product}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::get('/active/{product}', [ProductController::class, 'active'])->name('products.active');
        Route::get('/inactive/{product}', [ProductController::class, 'inactive'])->name('products.inactive');
    });

    Route::prefix('courses')->group(function () {
        // courses-Routes
        Route::get('/', [CourseController::class, 'course'])->name('courses.all');
        // Route::get('/{courses}', [CourseController::class, 'show'])->name('courses.show');
        // Route::delete('/{courses}', [CourseController::class, 'destroy'])->name('courses.destroy');
        Route::get('/pending/{course}', [CourseController::class, 'pending'])->name('courses.pending');
        Route::get('/active/{course}', [CourseController::class, 'active'])->name('courses.active');
        Route::get('/inactive/{course}', [CourseController::class, 'inactive'])->name('courses.inactive');
    });

    Route::prefix('report')->group(function () {
        // orders-Routes
        Route::get('/profit', [TransactionController::class, 'index'])->name('profit.index');
    });


    Route::prefix('orders')->group(function () {
        // orders-Routes
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/course', [OrderController::class, 'course'])->name('orders.course');
        Route::get('/product', [OrderController::class, 'product'])->name('orders.product');
        // Route::get('/{orders}', [ordersController::class, 'show'])->name('orders.show');
        // Route::delete('/{orders}', [ordersController::class, 'destroy'])->name('orders.destroy');
        Route::get('/pending/{order}', [OrderController::class, 'pending'])->name('orders.pending');
        Route::get('/active/{order}', [OrderController::class, 'active'])->name('orders.active');
        Route::get('/inactive/{order}', [OrderController::class, 'inactive'])->name('orders.inactive');
    });

    Route::prefix('users')->group(function () {
        // users-Routes
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/confirm/{user}', [UserController::class, 'confirm'])->name('users.confirm');
        Route::get('/student', [UserController::class, 'studentlist'])->name('users.student');
        Route::get('/teacher', [UserController::class, 'teacherlist'])->name('users.teacher');
        Route::get('/studentconfirmation', [UserController::class, 'studentconfirmationlist'])->name('users.student.confirmation');
        Route::get('/teacherconfirmation', [UserController::class, 'teacherconfirmationlist'])->name('users.teacher.confirmation');
    });
    Route::prefix('content')->group(function () {
        // Hero-Routes
        Route::get('/about/{content}/edit', [ContentController::class, 'editAbout'])->name('about.edit');
        Route::put('/about/{content}', [ContentController::class, 'updateAbout'])->name('about.update');

        Route::get('/general/{content}/edit', [ContentController::class, 'editGeneral'])->name('general.edit');
        Route::put('/general/{content}', [ContentController::class, 'updateGeneral'])->name('general.update');
        Route::get('/contact/{content}/edit', [ContentController::class, 'editContact'])->name('contact.edit');
        Route::put('/contact/{content}', [ContentController::class, 'updateContact'])->name('contact.update');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
