<div class="dashboard__sidebar -base scroll-bar-1 border-right-light lg:px-30">

    @if (request()->routeIs('user.*'))
    <div class="sidebar -dashboard">

        <div class="sidebar__item -is-active -dark-bg-dark-2">
            <a href="{{ route('user.dashboard') }}" class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
                <i class="text-20 icon-discovery mr-15"></i>
                Dashboard
            </a>
        </div>

        <div class="sidebar__item ">
            <a href="{{route('user.courses.index')}}" class="d-flex items-center text-17 lh-1 fw-500 ">
                <i class="text-20 icon-play-button mr-15"></i>
                My Courses
            </a>
        </div>

        <div class="sidebar__item ">
            <a href="{{route('user.course.create')}}" class="d-flex items-center text-17 lh-1 fw-500 ">
                <i class="text-20 icon-list mr-15"></i>
                Create Course
            </a>
        </div>

        <div class="sidebar__item ">
            <a href="dshb-settings.html" class="d-flex items-center text-17 lh-1 fw-500 ">
                <i class="text-20 icon-setting mr-15"></i>
                Settings
            </a>
        </div>

        <div class="sidebar__item ">
            <a href="#" class="d-flex items-center text-17 lh-1 fw-500 ">
                <i class="text-20 icon-power mr-15"></i>
                Logout
            </a>
        </div>

    </div>
    @else
    <div class="sidebar -base-sidebar">
        <div class="sidebar__inner">
            <div>
                <div class="text-16 lh-1 fw-500 text-dark-1 mb-30">General</div>
                <div>

                    <div class="sidebar__item ">
                        <a href="{{route('course.all')}}"
                          class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500">
                            <i class="text-20 icon-play-button mr-15"></i>
                            Courses
                        </a>
                    </div>

                    <div class="sidebar__item">
                        <a href="#" class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500">
                            <i class="text-20 icon-book mr-15"></i>
                            Teachers
                        </a>
                    </div>

                    <div class="sidebar__item ">
                        <a href="{{ route('product.all') }}"
                          class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500">
                            <i class="text-20 icon-list mr-15"></i>
                            Shop
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endif

</div>