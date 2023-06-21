<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class TeacherController extends Controller
{

    public function inbox()
    {
        // dd('ok');
        // $chat = Chat::Where('teacher_id', Auth::user()->id)->where('student_id', $student)->get();

        $studentIds = Chat::where('teacher_id',  Auth::user()->id)
            ->pluck('student_id')
            ->unique()
            ->toArray();
        $users = User::whereIn('id', $studentIds)->get();
        // dd($studentIds);
        // $chat = Chat::Where('teacher_id', Auth::user()->id)->where('teacher_id',)->limit(1)->get();
        // dd($chat);
        // $orders = Order::where('type', 1)->where('user_id', $transaction->student_id)->get();
        $student = false;
        return view('web.pages.chat.teacher', compact('student', 'users'));
    }
    public function chat($student)
    {
        // dd($student);
        $chats = Chat::Where('teacher_id', Auth::user()->id)->where('student_id', $student)->get();
        $studentIds = Chat::where('teacher_id',  Auth::user()->id)
            ->pluck('student_id')
            ->unique()
            ->toArray();
        $users = User::whereIn('id', $studentIds)->get();
        $student = User::find($student);
        $teacher = User::find(Auth::user()->id);
        return view('web.pages.chat.teacher', compact('chats', 'student', 'teacher', 'users'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'image' => 'required',
            'file' => 'required',
            'address' => 'required',
            'birthday' => 'required',
            'profession' => 'required',
            'subject' => 'required',
        ]);
        // dd($data);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(200, 200);
            $img->encode('jpg', 80);
            $img->save(base_path('/uploads/teachers/') . $imageName);
            $data['image'] = $imageName;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_file.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/teachers/'), $fileName);
            $data['file'] = $fileName;
        }
        $data['user_id'] = Auth::user()->id;

        $userData['complete'] = 1;
        $user = User::find(Auth::user()->id);
        $updateUser = $user->update($userData);
        $teacher = Teacher::create($data);

        if ($teacher && $updateUser) {
            // dd('success');
            return redirect()->route('index')->with('success', 'Teacher profile completed successfully, Plz Wait for confirmation');
        } else {

            return back()->with('error', 'Teacher creating showing error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $data = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required', 'birthday' => 'required',
            'current_department' => 'required',
            'profession' => 'required',
            'subject' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(200, 200);
            $img->encode('jpg', 80);
            $img->save(base_path('/uploads/teachers/') . $imageName);
            $data['image'] = $imageName;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_file.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/teachers/'), $fileName);
            $data['file'] = $fileName;
        }

        $teacher = $teacher->update($data);

        if ($teacher) {
            return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
        } else {
            return back()->with('error', 'Teacher update showing error.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}
