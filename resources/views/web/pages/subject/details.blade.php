@extends('web.app.app')


@section('main-body')
<div class="main-body">
    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row justify-center text-center">
                <div class="col-auto">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">{{ $subjectitem->title }} courses</h2>


                    </div>

                </div>
            </div>
            @if($courses->count() > 0)
            @include('web.component.courses')
            @else
            <h2 class="text-center">No Courses Availble</h2>
            @endif


        </div>
</div>
</section>

</div>

@endsection