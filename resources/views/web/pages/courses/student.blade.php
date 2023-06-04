@extends('web.app.app')


@section('main-body')
<div class="dashboard-main">
    <div class="dashboard__content bg-light-4">
        <div class="row pb-50 mb-10">
            <div class="col-auto">

                <h1 class="text-30 lh-12 fw-700">My Courses</h1>
                <div class="mt-10">Lorem ipsum dolor sit amet, consectetur.</div>

            </div>
        </div>


        <div class="row y-gap-30">
            <div class="col-12">
                <div class="row y-gap-10 justify-between">
                    <div class="col-auto">
                        <form class="search-field border-light rounded-8 h-50" action="post">
                            <input class="bg-white -dark-bg-dark-2 pr-50" type="text" placeholder="Search Courses">
                            <button class="" type="submit">
                                <i class="icon-search text-light-1 text-20"></i>
                            </button>
                        </form>
                    </div>

                    <div class="col-auto">
                        <div class="d-flex flex-wrap y-gap-10 x-gap-20">
                            <div>

                                <div class="dropdown js-dropdown js-category-active">
                                    <div
                                      class="dropdown__button d-flex items-center text-14 bg-white -dark-bg-dark-2 border-light rounded-8 px-20 py-10 text-14 lh-12"
                                      data-el-toggle=".js-category-toggle" data-el-toggle-active=".js-category-active">
                                        <span class="js-dropdown-title">Categories</span>
                                        <i class="icon text-9 ml-40 icon-chevron-down"></i>
                                    </div>

                                    <div
                                      class="toggle-element -dropdown -dark-bg-dark-2 -dark-border-white-10 js-click-dropdown js-category-toggle">
                                        <div class="text-14 y-gap-15 js-dropdown-list">

                                            <div><a href="#" class="d-block js-dropdown-link">Animation</a></div>

                                            <div><a href="#" class="d-block js-dropdown-link">Design</a>
                                            </div>

                                            <div><a href="#" class="d-block js-dropdown-link">Illustration</a>
                                            </div>

                                            <div><a href="#" class="d-block js-dropdown-link">Business</a></div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div>

                                <div class="dropdown js-dropdown js-review-active">
                                    <div
                                      class="dropdown__button d-flex items-center text-14 bg-white -dark-bg-dark-2 border-light rounded-8 px-20 py-10 text-14 lh-12"
                                      data-el-toggle=".js-review-toggle" data-el-toggle-active=".js-review-active">
                                        <span class="js-dropdown-title">Old Review</span>
                                        <i class="icon text-9 ml-40 icon-chevron-down"></i>
                                    </div>

                                    <div
                                      class="toggle-element -dropdown -dark-bg-dark-2 -dark-border-white-10 js-click-dropdown js-review-toggle">
                                        <div class="text-14 y-gap-15 js-dropdown-list">

                                            <div><a href="#" class="d-block js-dropdown-link">Animation</a></div>

                                            <div><a href="#" class="d-block js-dropdown-link">Design</a>
                                            </div>

                                            <div><a href="#" class="d-block js-dropdown-link">Illustration</a>
                                            </div>

                                            <div><a href="#" class="d-block js-dropdown-link">Business</a></div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row y-gap-30 pt-30">

                    @foreach($orders as $item)
                    <div class="w-1/5 xl:w-1/3 lg:w-1/2 sm:w-1/1">
                        <div class="relative">
                            <img class="rounded-8 w-1/1 " src="{{ asset('/uploads/courses/' . $item->course->image) }}"
                              alt="{{ $item->course->title }}">





                        </div>

                        <div class="pt-15">
                            <div class="d-flex y-gap-10 justify-between items-center">
                                <div class="text-14 lh-1">{{ $item->course->creator->name }}</div>

                                @if($item->status == 2)
                                <div class="d-flex items-center">
                                    <div class="text-14 lh-1 text-red-1 mr-10">pending
                                    </div>

                                </div>
                                @else
                                <div class="d-flex items-center">
                                    <div class="text-14 lh-1 text-green-1 mr-10">Active
                                    </div>
                                </div>
                                @endif

                            </div>

                            <h3 class="text-16 fw-500 lh-15 mt-10">{{ $item->course->title }}</h3>
                        </div>
                    </div>
                    @endforeach



                </div>
            </div>
        </div>

    </div>

    <footer class="footer -dashboard py-30">
        <div class="row items-center justify-between">
            <div class="col-auto">
                <div class="text-13 lh-1">© 2022 Educrat. All Right Reserved.</div>
            </div>

            <div class="col-auto">
                <div class="d-flex items-center">
                    <div class="d-flex items-center flex-wrap x-gap-20">
                        <div>
                            <a href="help-center.html" class="text-13 lh-1">Help</a>
                        </div>
                        <div>
                            <a href="terms.html" class="text-13 lh-1">Privacy Policy</a>
                        </div>
                        <div>
                            <a href="#" class="text-13 lh-1">Cookie Notice</a>
                        </div>
                        <div>
                            <a href="#" class="text-13 lh-1">Security</a>
                        </div>
                        <div>
                            <a href="terms.html" class="text-13 lh-1">Terms of Use</a>
                        </div>
                    </div>

                    <button class="button -md -rounded bg-light-4 text-light-1 ml-30">English</button>
                </div>
            </div>
        </div>
    </footer>
</div>

@endsection