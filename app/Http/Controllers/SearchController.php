<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function search(Request $request)
    {
        $courses = Course::latest()
            ->where('title', 'like', '%' . $request->courses . '%')
            ->orWhere('description', 'like', '%' . $request->courses . '%')
            ->get();
        $products = Product::latest()
            ->where('name', 'like', '%' . $request->courses . '%')->orWhere('description', 'like', '%' . $request->courses . '%')->get();
        return view('web.pages.courses.result', compact('courses', 'products'));
    }


    public function filter(Request $request)
    {

        $subject = $request->input('subject_id');
        $duration = $request->input('duration');

        $courses = Course::query()
            ->where(function ($query) use ($subject, $duration) {
                if ($subject) {
                    $query->where('subject_id', $subject);
                }
                if ($duration) {
                    $query->orWhere('duration', $duration);
                }
            })
            ->get();
        // dd($courses);
        $products = false;
        return view('web.pages.courses.result', compact('courses', 'products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
