<div class="dashboard__sidebar -base scroll-bar-1 border-right-light lg:px-30">

    @if (request()->routeIs('user.*'))
    <div class="sidebar -dashboard mt-5">

        <div class="sidebar__item ">
            <a href="{{ route('user.dashboard') }}" class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
                <i class="text-20 icon-discovery mr-15"></i>
                Dashboard
            </a>
        </div>

        @if(Auth::user()->role == 2)

        <div class="sidebar__item ">
            <a href="{{ route('chat.inbox.teacher') }}"
              class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
                <i class="text-20 icon-discovery mr-15"></i>
                Chat
            </a>
        </div>
        <div class="sidebar__item ">
            <a href="{{route('user.courses.index')}}" class="d-flex items-center text-17 lh-1 fw-500 ">
                <i class="text-20 icon-play-button mr-15"></i>
                My Courses
            </a>
        </div>
        @else
        <div class="sidebar__item">
            <a href="{{ route('teacher.all') }}" class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500">
                <i class="text-20 icon-book mr-15"></i>
                Teachers
            </a>
        </div>
        <div class="sidebar__item ">
            <a href="{{ route('chat.inbox.student') }}"
              class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
                <i class="text-20 icon-discovery mr-15"></i>
                Chat
            </a>
        </div>
        <div class="sidebar__item ">
            <a href="{{route('user.courses.student')}}" class="d-flex items-center text-17 lh-1 fw-500 ">
                <i class="text-20 icon-play-button mr-15"></i>
                My Courses
            </a>
        </div>
        @endif
        @if(Auth::user()->role == 2)
        <div class="sidebar__item ">
            <a href="{{route('user.course.create')}}" class="d-flex items-center text-17 lh-1 fw-500 ">
                <i class="text-20 icon-list mr-15"></i>
                Create Course
            </a>
        </div>
        @endif




        <div class="sidebar__item ">

            <a onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="d-flex items-center text-17 lh-1 fw-500 ">
                <i class="text-20 icon-power mr-15"></i>
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

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