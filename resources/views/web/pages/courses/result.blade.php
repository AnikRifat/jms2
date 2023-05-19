@extends('web.app.app')


@section('main-body')
<section class="layout-pt-md layout-pb-lg">
    <div data-anim-wrap class="container">
        <div class="row justify-center text-center">
            <div class="col-auto">

                <div class="sectionTitle ">

                    <h2 class="sectionTitle__title ">Related Courses</h2>


                </div>

            </div>
        </div>
        @if($courses->count() > 0)
        @include('web.component.courses')
        @else
        <div class="d-flex items-center justify-between bg-info-1 pl-30 pr-20 py-30 rounded-8">
            <div class="text-info-2 lh-1 fw-500">No Search Related courses</div>

        </div>
        @endif
    </div>

</section>

<section class="layout-pt-md layout-pb-lg">
    <div data-anim-wrap class="container">
        <div class="row justify-center text-center">
            <div class="col-auto">

                <div class="sectionTitle ">

                    <h2 class="sectionTitle__title ">Related Products</h2>


                </div>

            </div>
        </div>
        @if($products->count() > 0)
        @include('web.component.product')
        @else
        <div class="d-flex items-center justify-between bg-info-1 pl-30 pr-20 py-30 rounded-8">
            <div class="text-info-2 lh-1 fw-500">No Search Related products</div>

        </div>
        @endif


    </div>

</section>

@endsection