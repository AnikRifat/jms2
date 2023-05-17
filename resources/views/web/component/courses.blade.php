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
        <div class="row y-gap-30 justify-center">
            @foreach ($courses as $item)
            <div class="col-lg-3 col-md-6">
                <div data-anim-child="slide-up delay-1">

                    <a href="{{ route('course.details',$item->id) }}" class="coursesCard -type-1 ">
                        <div class="relative">
                            <div class="coursesCard__image overflow-hidden rounded-8">
                                <img class="w-1/1" src="{{ asset('') }}uploads/courses/{{ $item->image }}" alt="image">
                                <div class="coursesCard__image_overlay rounded-8"></div>
                            </div>
                            <div class="d-flex justify-between py-10 px-10 absolute-full-center z-3">

                            </div>
                        </div>

                        <div class="h-100 pt-15">


                            <div class="text-17 lh-15 fw-500 text-dark-1 mt-10">{{ $item->title }}</div>

                            <div class="d-flex x-gap-10 items-center pt-10">

                                <div class="d-flex items-center">
                                    <div class="mr-8">
                                        <img src="{{ asset('') }}assets/web/img/coursesCards/icons/1.svg" alt="icon">
                                    </div>
                                    <div class="text-14 lh-1">{{ $item->lesson }} lesson</div>
                                </div>

                                <div class="d-flex items-center">
                                    <div class="mr-8">
                                        <img src="{{ asset('') }}assets/web/img/coursesCards/icons/2.svg" alt="icon">
                                    </div>
                                    <div class="text-14 lh-1">{{ $item->duration }}</div>
                                </div>

                                <div class="d-flex items-center">
                                    <div class="mr-8">
                                        <img src="{{ asset('') }}assets/web/img/coursesCards/icons/3.svg" alt="icon">
                                    </div>
                                    <div class="text-14 lh-1">Beginner</div>
                                </div>

                            </div>

                            <div class="coursesCard-footer">
                                <div class="coursesCard-footer__author">
                                    <img src="{{ asset('') }}uploads/teachers/{{ $item->creator->teacher->image }}"
                                      alt="image">
                                    <div>{{ $item->creator->name }}</div>
                                </div>

                                <div class="coursesCard-footer__price">

                                    <div>${{ $item->price }}</div>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
            @endforeach



        </div>
    </div>
</section>