@extends('web.app.app')


@section('main-body')
<div class="main-body">

    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1" class="is-in-view">


                            <h1 class="page-header__title lh-14">
                                 {{ $blog->title }}
                            </h1>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="layout-pt-md">
        <div class="container">
            <div class="ratio ratio-16:9 rounded-8 bg-image js-lazy loaded" data-ll-status="loaded"
              style="background-image: url({{ asset('uploads/blogs/'.$blog->image) }});"></div>
        </div>
    </section>
    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="blogSection">
                <div class="blogCard">
                    <div class="row justify-center">
                        <div class="col-xl-8 col-lg-9 col-md-11">
                            <div class="blogCard__content">
                                {!!$blog->description !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection
