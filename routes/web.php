<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DurationController;
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
});

Route::get('/', [PublicController::class, 'index'])->name('index');
Route::get('/Complete-Profile-202', [PublicController::class, 'cp'])->name('cp');
Route::get('/not-allowed', [PublicController::class, 'na'])->name('na');

Route::get('/complete-profile', [PublicController::class, 'completeprofile'])->name('profile.complete');
Route::get('/blog/{blogId}', [PublicController::class, 'blogDetails'])->name('blog.details');
Route::get('/blogs', [PublicController::class, 'blogs'])->name('blogs.all');
Route::get('/courses/all', [PublicController::class, 'courses'])->name('course.all');
Route::get('/course/details/{course}', [PublicController::class, 'coursedetails'])->name('course.details');
Route::get('/products/all', [PublicController::class, 'products'])->name('product.all');
Route::get('/product/details/{product}', [PublicController::class, 'productdetails'])->name('product.details');
Route::get('/teachers/all', [PublicController::class, 'teachers'])->name('teacher.all');
Route::get('/teacher/courses/{teacher}', [PublicController::class, 'teacherdetails'])->name('teacher.details');
Route::get('/subjects/all', [PublicController::class, 'subjects'])->name('subject.all');
Route::get('/subject/courses/{subject}', [PublicController::class, 'subjectdetails'])->name('subject.details');

Route::post('/filter', [SearchController::class, 'filter'])->name('filter');
Route::post('/search', [SearchController::class, 'search'])->name('search'); //  search
Route::get('/search/view', [SearchController::class, 'result'])->name('result'); // show search

Route::middleware('auth')->group(function () {
    Route::post('store/student-info', [StudentController::class, 'store'])->name('student.store');
    Route::post('store/teacher-info', [TeacherController::class, 'store'])->name('teacher.store');
});

Route::prefix('/user/dashboard')->middleware(['auth', 'checkProfile'])->group(function () {
    Route::get('/Profile', [PublicController::class, 'userdashboard'])->name('user.dashboard');

    Route::post('update/teacher/{user}', [UserController::class, 'teacher'])->name('teacher.update');
    Route::post('update/student/{user}', [UserController::class, 'student'])->name('student.update');
    Route::post('update/user/{user}', [UserController::class, 'update'])->name('user.update');
});
Route::prefix('/user/dashboard')->middleware(['auth', 'checkProfile'])->group(function () {

    Route::get('checkout/{item}/{type}', [PublicController::class, 'checkout'])->name('checkout.store');
    Route::post('order/store', [OrderController::class, 'store'])->name('order.store');
    Route::get('/', [CourseController::class, 'index'])->name('user.courses.index');
    Route::get('/my-courses', [CourseController::class, 'courses'])->name('user.courses.student');
    Route::get('/create-course', [PublicController::class, 'createcourse'])->name('user.course.create');

    Route::get('/update-course', [PublicController::class, 'updatecourse'])->name('user.course.update');
    Route::get('/sales', [PublicController::class, 'sales'])->name('user.sales');
    Route::get('/purchase', [PublicController::class, 'purchase'])->name('user.purchase');
});
Route::prefix('chat/inbox')->middleware(['auth', 'checkProfile'])->group(function () {

    Route::get('/teacher', [TeacherController::class, 'inbox'])->name('chat.inbox.teacher');
    Route::get('/student', [StudentController::class, 'inbox'])->name('chat.inbox.student');
    Route::get('/teacher/{teacher}', [StudentController::class, 'chat'])->name('chat.show.student');
    Route::get('/student/{student}', [TeacherController::class, 'chat'])->name('chat.show.teacher');


    Route::post('/', [ChatController::class, 'store'])->name('chat.save');
});

Route::prefix('/dashboard')->middleware('auth')->group(function () {

    Route::get('/sale/invoice/{transactionId}', [TransactionController::class, 'invoice'])->name('generate.invoice');
    Route::get('/sale/view/{transactionId}', [TransactionController::class, 'view'])->name('generate.view');


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
        Route::get('/{course}/archive', [CourseController::class, 'archive'])->name('courses.archive');
        Route::post('/{course}', [CourseController::class, 'update'])->name('courses.update');
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


    Route::prefix('durations')->group(function () {
        // duration-Routes
        Route::get('/', [DurationController::class, 'index'])->name('durations.index');
        Route::post('/', [DurationController::class, 'store'])->name('durations.store');
        Route::get('/{duration}/edit', [DurationController::class, 'edit'])->name('durations.edit');
        Route::put('/{duration}', [DurationController::class, 'update'])->name('durations.update');
        Route::get('/{duration}', [DurationController::class, 'destroy'])->name('durations.destroy');
        Route::get('/active/{duration}', [DurationController::class, 'active'])->name('durations.active');
        Route::get('/inactive/{duration}', [DurationController::class, 'inactive'])->name('durations.inactive');
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
        Route::get('/Course', [TransactionController::class, 'course'])->name('profit.course.index');
        Route::get('/shop', [TransactionController::class, 'shop'])->name('profit.shop.index');
        Route::get('/sale', [TransactionController::class, 'sale'])->name('profit.sale.index');
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
        Route::get('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/confirm/{user}', [UserController::class, 'confirm'])->name('users.confirm');
        Route::get('/student/list', [UserController::class, 'studentlist'])->name('users.student');
        Route::get('/teacher/list', [UserController::class, 'teacherlist'])->name('users.teacher');
        Route::get('/studentconfirmation//list', [UserController::class, 'studentconfirmationlist'])->name('users.student.confirmation');
        Route::get('/teacherconfirmation/list', [UserController::class, 'teacherconfirmationlist'])->name('users.teacher.confirmation');
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
