<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    public function confirm($user)
    {
        $userData = User::find($user);

        $data['allow'] = '1';

        $confirmed = $userData->update($data);
        if ($confirmed) {
            $userdata = array(
                'name' => $userData->name,
            );
            $email = $userData->email;

            Mail::send(['text' => 'email.account-confirmation'], $userdata, function ($message) use ($email) {
                $message->to($email)->subject('CLekhapora - Account Confirmation');
            });
            return redirect()->back()->with('success', 'User Confirmed Successfully');
        } else {
            return redirect()->back()->with('error', 'User Confirmation Unsuccessfull');
        }
    }
    public function index()
    {
        $users = User::where('role', 1, 2)->get();
        // dd($users);
        return view('admin.pages.users.index', compact('users'));
    }

    public function adminindex()
    {
        return view('admin.pages.dashboard.index');
    }
    public function studentconfirmationlist()
    {
        dd('ok');
        $users = User::where('role', 1)->where('allow', 0)->get();
        return view('admin.pages.users.student-cfl', compact('users'));
    }
    public function studentlist()
    {
        dd('ok');
        $users = User::where('role', 1)->get();
        return view('admin.pages.users.index', compact('users'));
    }
    public function teacherconfirmationlist()
    {
        $users = User::where('allow', 0)->where('role', 2)->get();
        return view('admin.pages.users.teacher-cfl', compact('users'));
    }
    public function teacherlist()
    {
        $users = User::where('role', 2)->get();
        return view('admin.pages.users.index', compact('users'));
    }



    public function adminUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        return redirect()->route('dashboard.index')->with('success', 'User updated successfully!');
    }


    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => ['numeric', 'required'],
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

    public function destroy(User $user)
    {
        // delete the subject's image file, if it exists


        // delete the subject from the database
        $user->delete();

        return redirect()->route('users.index')->with('success', 'user deleted successfully.');
    }
}
