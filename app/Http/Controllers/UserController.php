<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        // dd($users);
        return view('admin.pages.users.index', compact('users'));
    }
    public function studentlist()
    {
        $users = User::where('role', 1)->get();
        return view('admin.pages.users.index', compact('users'));
    }
    public function teacherlist()
    {
        $users = User::where('role', 2)->get();
        return view('admin.pages.users.index', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        if ($user->update($data)) {
            return redirect()->back()->with('success', 'Update SuccessFull');
        } else {
            return redirect()->back()->with('error', 'Update Error');
        }
    }



    public function student(Request $request,  $student)
    {
        $studentinfo = Student::find($student);
        // dd($request->all());
        $data = $request->validate([
            'address' => 'required',
            'birthday' => 'required',
            'current_school' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(200, 200);
            $img->encode('jpg', 80);
            $img->save(base_path('/uploads/students/') . $imageName);
            $data['image'] = $imageName;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_file.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/students/'), $fileName);
            $data['file'] = $fileName;
        }

        $studentinfo = $studentinfo->update($data);

        if ($studentinfo) {
            return redirect()->back()->with('success', 'Student updated successfully.');
        } else {
            return back()->with('error', 'Student update showing error.');
        }
    }



    public function teacher(Request $request,  $teacher)
    {
        $teacherinfo = Teacher::find($teacher);
        // dd($teacherinfo);
        // dd($request->all());
        $data = $request->validate([
            'address' => 'required',
            'birthday' => 'required',
            'profession' => 'required',
            'subject' => 'required',
        ]);
        //
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
        // dd($data);
        $teacherinfo = $teacherinfo->update($data);

        if ($teacherinfo) {
            return redirect()->back()->with('success', 'Teacher updated successfully.');
        } else {
            return back()->with('error', 'Teacher update showing error.');
        }
    }
}
