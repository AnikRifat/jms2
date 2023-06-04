@extends('web.app.app')


@section('main-body')
<div class="main-body">
    <div class="dashboard-user">
        <div class="dashboard__content bg-light-4">
            <div class="row pb-50 mb-10">
                <div class="col-auto">

                    <h1 class="text-30 lh-12 fw-700">Create New Course</h1>
                    <div class="mt-10">Lorem ipsum dolor sit amet, consectetur.</div>

                </div>
            </div>


            <div class="row y-gap-60">
                <div class="col-12">
                    <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                        <div class="d-flex items-center py-20 px-30 border-bottom-light">
                            <h2 class="text-17 lh-1 fw-500">Basic Information</h2>
                        </div>

                        <div class="py-30 px-30">
                            <form class="contact-form row y-gap-30" action="{{ route('courses.store') }}" method="POST"
                              enctype="multipart/form-data">
                                @csrf

                                <div class="col-12">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Course Title*</label>
                                    <input type="text" name="title"
                                      placeholder="Learn Figma - UI/UX Design Essential Training">
                                </div>
                                <div class="col-12">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Course Lessons*</label>
                                    <input type="text" name="lesson"
                                      placeholder="Learn Figma - UI/UX Design Essential Training">
                                </div>
                                <div class="col-12">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Course proce*</label>
                                    <input type="text" name="price"
                                      placeholder="Learn Figma - UI/UX Design Essential Training">
                                </div>

                                <div class="col-12">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Course Description*</label>
                                    <textarea name="description" placeholder="Description" rows="7"></textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Class*</label>
                                    <select name="class_id" class="form-control">
                                        <option value="">Select Class</option>
                                        @foreach($categories as $class)
                                        <option value="{{ $class->id }}">{{ $class->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Subject*</label>
                                    <select name="subject_id" class="form-control">
                                        <option value="">Select Subject</option>
                                        @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Duration*</label>
                                    <input type="text" name="duration" placeholder="Duration">
                                </div>
                                <div class="col-md-6">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Class Link*</label>
                                    <input type="text" name="meeting_link" placeholder="Class Link">
                                </div>
                                <input type="text" name="creator_id" value="{{Auth::user()->id}}" hidden>

                                <div class="col-md-6">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Image*</label>
                                    <input type="file" name="image" class="dropify">
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="button -md -outline-purple-1 text-purple-1">Create
                                        Course</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>


</div>
@endsection