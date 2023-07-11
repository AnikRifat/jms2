@extends('web.app.app')


@section('main-body')
<div class="main-body">

    @include('web.component.hero')
    @include('web.component.subjects')
    {{-- @include('web.component.categories') --}}

    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row justify-center text-center">
                <div class="col-auto">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">Our Most Popular Courses</h2>

                        <p class="sectionTitle__text ">10,000+ unique online course list designs</p>

                    </div>

                </div>
            </div>
            @include('web.component.courses')

        </div>

    </section>
    {{-- @include('web.component.instructors') --}}

    {{-- @include('web.component.testimonial') --}}



    <section class="layout-pt-lg layout-pb-lg bg-dark-2">
        <div data-anim-wrap class="container">
            <div class="row justify-center text-center">
                <div data-anim-child="slide-up delay-1" class="col-auto">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title text-white">Why learn with our courses?</h2>

                        <p class="sectionTitle__text text-white">Lorem ipsum dolor sit amet, consectetur.</p>

                    </div>

                </div>
            </div>

            <div class="row y-gap-30 pt-50">

                <div data-anim-child="slide-up delay-2" class="col-lg-4 col-md-6">
                    <div class="stepCard -type-1 -stepCard-hover">
                        <div class="stepCard__content">
                            <div class="stepCard__icon">
                                <i class="icon-online-learning-4 text-64 text-green-1"></i>
                            </div>
                            <h4 class="stepCard__title">01. Learn</h4>
                            <p class="stepCard__text"> Lorem ipsum dolor sit amet, consectetur dolorili
                                adipiscing elit. Felis donec massa aliqua.</p>
                        </div>
                    </div>
                </div>

                <div data-anim-child="slide-up delay-3" class="col-lg-4 col-md-6">
                    <div class="stepCard -type-1 -stepCard-hover">
                        <div class="stepCard__content">
                            <div class="stepCard__icon">
                                <i class="icon-graduation-1 text-64 text-green-1"></i>
                            </div>
                            <h4 class="stepCard__title">02. Graduate</h4>
                            <p class="stepCard__text"> Lorem ipsum dolor sit amet, consectetur dolorili
                                adipiscing elit. Felis donec massa aliqua.</p>
                        </div>
                    </div>
                </div>

                <div data-anim-child="slide-up delay-4" class="col-lg-4 col-md-6">
                    <div class="stepCard -type-1 -stepCard-hover">
                        <div class="stepCard__content">
                            <div class="stepCard__icon">
                                <i class="icon-working-at-home-2 text-64 text-green-1"></i>
                            </div>
                            <h4 class="stepCard__title">03. Work</h4>
                            <p class="stepCard__text"> Lorem ipsum dolor sit amet, consectetur dolorili
                                adipiscing elit. Felis donec massa aliqua.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>




</div>
@endsection