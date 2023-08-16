<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::orderBy('id', 'DESC')->get();
        // dd($attendances);
        return view('admin.pages.attandance.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'course_id' => 'required',
            'duration' => 'required',
        ]);
        $user = Auth::user();
        $data['user_id'] = $user->id;
        $data['user_type'] = $user->role;
        $data['date'] = Carbon::now()->today()->toDateString();
        //
        // dd($data);

        $existingAttendance = Attendance::where('course_id', $data['course_id'])
            ->where('date',  $data['date'])
            ->where('user_type', '!=', $user->role)
            ->first();

        if ($existingAttendance) {
            $data['staus'] = 2;
        } else {
            $data['staus'] = 1;
        }

        $result = Attendance::create($data);
        if ($result) {
            return redirect()->back()->with('success', 'Attendace acceped successfully');
        } else {
            return redirect()->back()->with('error', 'Attendace Unsuccessfull');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
